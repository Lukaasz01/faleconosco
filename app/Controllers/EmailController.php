<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class EmailController extends BaseController 
{
    public function enviar_email() {
        helper(['form', 'url', 'regional_helper']);

        $uf = $this->request->getPost('ufFormulario');
        if (empty($uf)) {
            throw PageNotFoundException::forPageNotFound();
        }

        $regionalData = seleciona_regional($uf);
        if (!$regionalData || empty($regionalData['email'])) {
            throw PageNotFoundException::forPageNotFound();
        }

        $recaptchaResposta = $this->request->getPost('g-recaptcha-response');
        if (!$this->validarRecaptcha($recaptchaResposta)) {
            return $this->renderErrorView($uf, $regionalData, 'Por favor, complete a verificação do reCAPTCHA.');
        }

        $postData  = $this->request->getPost() ?? [];
        $sanitized = [];
        foreach ($postData as $key => $value) {
            $sanitized[$key] = $this->sanitizeInput($value);
        }

        $emailRemetente = filter_var($postData['email'] ?? '', FILTER_VALIDATE_EMAIL);
        if (!$emailRemetente) {
            return $this->renderErrorView($uf, $regionalData, 'O e-mail informado não é válido.');
        }

        $arquivo      = $this->request->getFile('anexo');
        $caminhoAnexo = '';
        $nomeOriginal = '';

        if ($arquivo && $arquivo->isValid() && !$arquivo->hasMoved()) {
            $tamanhoMax   = 5 * 1024 * 1024; // 5 MB
            $tiposAceitos = ['pdf', 'png', 'jpeg', 'jpg', 'doc', 'docx', 'zip', 'rar'];
            $extensao     = strtolower($arquivo->getClientExtension());

            if ($arquivo->getSize() > $tamanhoMax) {
                return $this->renderErrorView($uf, $regionalData, 'O arquivo excede o tamanho máximo permitido (5MB).');
            }

            if (!in_array($extensao, $tiposAceitos, true)) {
                return $this->renderErrorView($uf, $regionalData, 'Tipo de arquivo não permitido.');
            }

            $pastaTemp = WRITEPATH . 'uploads/temp/';
            if (!is_dir($pastaTemp)) {
                mkdir($pastaTemp, 0755, true);
            }

            $nomeOriginal = $arquivo->getClientName();
            $novoNome     = uniqid('anexo_', true) . '.' . $extensao;

            if ($arquivo->move($pastaTemp, $novoNome)) {
                $caminhoAnexo = $pastaTemp . $novoNome;
            }
        }
        
        $numeroCrm = $sanitized['numeroCrm'] ?? $sanitized['crm'] ?? '';

        if ($uf !== 'BR' && !empty($numeroCrm)) {
            $ufCrmVal = $uf;
        } else {
            $ufCrmVal = $sanitized['ufCrm'] ?? $sanitized['UfCrm'] ?? '';
        }

        if (in_array(strtolower($ufCrmVal), ['selecionar', 'selecione'], true)) {
            $ufCrmVal = '';
        }

        $dadosEmail = [
            'areaContato'   => $sanitized['areaContato'] ?? '',
            'nome'          => $sanitized['nomeCompleto'] ?? '',
            'uf'            => $uf,
            'ufCrm'         => $ufCrmVal,
            'numeroCrm'     => $numeroCrm,
            'email'         => $sanitized['email'] ?? '',
            'cpf'           => $sanitized['cpf'] ?? '',
            'celular'       => $sanitized['celular'] ?? '',
            'cep'           => $sanitized['cep'] ?? '',
            'logradouro'    => $sanitized['logradouro'] ?? '',
            'numero'        => $sanitized['numero'] ?? '',
            'complemento'   => $sanitized['complemento'] ?? '',
            'bairro'        => $sanitized['bairro'] ?? '',
            'estado'        => $sanitized['estado'] ?? '',
            'cidade'        => $sanitized['cidade'] ?? '',
            'assunto'       => $sanitized['assunto'] ?? '',
            'mensagem'      => $sanitized['mensagem'] ?? '',
            'justificativa' => $sanitized['justificativa'] ?? '',
            'anexo_nome'    => $nomeOriginal,
        ];

        $areaContato = $dadosEmail['areaContato'];
        if (is_array($regionalData['email']) && isset($regionalData['email'][$areaContato])) {
            $emailDestino = $regionalData['email'][$areaContato];
        } else {
            throw PageNotFoundException::forPageNotFound();
        }

        $emailService = \Config\Services::email();
        $emailService->setFrom($emailService->SMTPUser, 'Portal Médico');
        $emailService->setTo($emailDestino);
        $emailService->setSubject('Fale Conosco via Canal Fale Conosco - ' . ($dadosEmail['nome']));
        $emailService->setMessage(view('emails/email', $dadosEmail));

        if (!empty($caminhoAnexo) && file_exists($caminhoAnexo)) {
            $emailService->attach($caminhoAnexo, 'attachment', $nomeOriginal);
        }

        $enviado = $emailService->send();

        $this->limparArquivosTemp($caminhoAnexo);

        if ($enviado) {
            return view('emails/success', [
                'uf'           => $uf,
                'regionalData' => $regionalData,
                'anexo_nome'   => $nomeOriginal,
            ]);
        }

        return $this->renderErrorView(
            $uf, 
            $regionalData, 
            'Falha no envio do e-mail', 
            $emailService->printDebugger(['headers'])
        );
    }

    private function renderErrorView(string $uf, array $regionalData, string $message, $error = null)  {
        return view('emails/error', [
            'uf'           => $uf,
            'regionalData' => $regionalData,
            'message'      => $message,
            'error'        => $error
        ]);
    }

    private function sanitizeInput($data) {
        if (is_array($data)) {
            return array_map([$this, 'sanitizeInput'], $data);
        }
        
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    private function limparArquivosTemp(?string $caminhoArquivo = null)  {
        if (!empty($caminhoArquivo) && file_exists($caminhoArquivo)) {
            @unlink($caminhoArquivo);
        }

        $pastaTemp = WRITEPATH . 'uploads/temp';
        if (is_dir($pastaTemp)) {
            $arquivos  = glob($pastaTemp . '/*');
            $horaAtual = time();

            foreach ($arquivos as $arquivo) {
                if (is_file($arquivo) && ($horaAtual - filemtime($arquivo) >= 3600)) {
                    @unlink($arquivo);
                }
            }
        }
    }

    private function validarRecaptcha(?string $recaptchaResposta) {
        if (empty($recaptchaResposta)) {
            return false;
        }

        $chaveSecreta = '6LftQdsrAAAAAMI8rcEtLOuW2-NAHCGzthtV2JZS';
        $client       = \Config\Services::curlrequest();

        try {
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret'   => $chaveSecreta,
                    'response' => $recaptchaResposta,
                    'remoteip' => $this->request->getIPAddress(),
                ],
                'timeout' => 5,
            ]);

            $resultado = json_decode($response->getBody(), true);
            return isset($resultado['success']) && $resultado['success'] === true;
        } catch (\Exception $e) {
            return false;
        }
    }
}