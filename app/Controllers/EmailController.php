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
            return view('emails/error', [
                'uf'           => $uf,
                'regionalData' => $regionalData,
                'message'      => 'Por favor, complete a verificação do reCAPTCHA.',
            ]);
        }

        $postData  = $this->request->getPost() ?? [];
        $sanitized = [];
        foreach ($postData as $key => $value) {
            $sanitized[$key] = $this->sanitize_input($value);
        }

        $emailRemetente = filter_var($postData['email'] ?? '', FILTER_VALIDATE_EMAIL);
        if (!$emailRemetente) {
            return view('emails/error', [
                'uf'           => $uf,
                'regionalData' => $regionalData,
                'message'      => 'O e-mail informado não é válido.',
            ]);
        }

        $arquivo      = $this->request->getFile('anexo');
        $caminhoAnexo = '';
        $nomeOriginal = '';

        if ($arquivo && $arquivo->isValid() && !$arquivo->hasMoved()) {
            $tamanhoMax   = 5 * 1024 * 1024; // 5 MB
            $tiposAceitos = ['pdf', 'png', 'jpeg', 'jpg', 'doc', 'docx', 'zip', 'rar'];
            $extensao     = strtolower($arquivo->getClientExtension());

            if ($arquivo->getSize() > $tamanhoMax) {
                return view('emails/error', [
                    'uf'           => $uf,
                    'regionalData' => $regionalData,
                    'message'      => 'O arquivo excede o tamanho máximo permitido (5MB).',
                ]);
            }

            if (!in_array($extensao, $tiposAceitos, true)) {
                return view('emails/error', [
                    'uf'           => $uf,
                    'regionalData' => $regionalData,
                    'message'      => 'Tipo de arquivo não permitido.',
                ]);
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

        $htmlContent  = view('emails/email', $dadosEmail);
        $emailService = \Config\Services::email();

        $emailService->setFrom($emailService->SMTPUser, 'Portal Médico');
        $emailService->setTo($emailDestino);
        $emailService->setSubject('Fale Conosco via Canal Fale Conosco - ' . ($sanitized['nomeCompleto'] ?? ''));
        $emailService->setMessage($htmlContent);

        if (!empty($caminhoAnexo) && file_exists($caminhoAnexo)) {
            $emailService->attach($caminhoAnexo, 'attachment', $nomeOriginal);
        }

        $enviado = $emailService->send();

        if (!empty($caminhoAnexo) && file_exists($caminhoAnexo)) {
            $this->limparArquivosTemp($caminhoAnexo);
        }

        if ($enviado) {
            return view('emails/success', [
                'uf'           => $uf,
                'regionalData' => $regionalData,
                'anexo_nome'   => $nomeOriginal,
            ]);
        }

        return view('emails/error', [
            'uf'           => $uf,
            'regionalData' => $regionalData,
            'message'      => 'Falha no envio do e-mail',
            'error'        => $emailService->printDebugger(['headers']),
        ]);
    }

    private function sanitize_input($data) {
        if (is_array($data)) {
            return array_map(array($this, 'sanitize_input'), $data);
        }
        
        return nl2br(htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8'));
    }
    
    private function limparArquivosTemp($caminhoArquivo = null) {
        if (!empty($caminhoArquivo)) {
            unlink($caminhoArquivo);
        }

        $pastaTemp = WRITEPATH . 'uploads/temp';
        if (is_dir($pastaTemp)) {
            $arquivos = glob($pastaTemp . '/*');
            $horaAtual = time();
            $horaDepois = 3600;

            foreach ($arquivos as $arquivo) {
                if (is_file($arquivo)) {
                    if ($horaAtual - filemtime($arquivo) >= $horaDepois) {
                            unlink($arquivo); 
                    } 
                } 
            } 
        }
    }

    private function validarRecaptcha($recaptchaResposta) {
        $chaveSecreta = '6LftQdsrAAAAAMI8rcEtLOuW2-NAHCGzthtV2JZS';

        if (empty($recaptchaResposta)) {
            return false;
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $data = array(
            'secret' => $chaveSecreta,
            'response' => $recaptchaResposta,
            'remoteip' => $this->request->getIPAddress(),
        );

        $opcoes = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
                'timeout' => 5
            )
        );

        $context = stream_context_create($opcoes);
            $resposta = file_get_contents($url, false, $context);
            
            if ($resposta === FALSE) {
                return false;
            }
            $resultado = json_decode($resposta, true);
            return isset($resultado['success']) && $resultado['success'] === true;
            
    }
    
}