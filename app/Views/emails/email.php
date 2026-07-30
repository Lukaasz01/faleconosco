<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Dados | Portal Médico</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">

    <!-- CABEÇALHO -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#00815A">
        <tr>
            <td align="center" style="padding: 20px;">
                <span style="color: white; font-size: 20px; font-weight: bold; display: inline-block;">
                    Contato via canal de atendimento Fale Conosco
                </span>
            </td>
        </tr>
    </table>

    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center" style="padding: 30px 10px;">
                <table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff"
                    style="border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="padding: 30px;">
                            <h1 style="color: #00815A; font-size: 24px; margin-top: 0; margin-bottom: 20px;">
                                Foi feito um contato usando o canal de atendimento Fale Conosco. Seguem abaixo as
                                informações do contato:
                            </h1>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="border-collapse: collapse;">

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Nome:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($nome) && !empty($nome) ? $nome : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>UF:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($uf) && !empty($uf) ? $uf : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0;">
                                        <b>UF do CRM:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($ufCrm) && !empty($ufCrm) ? $ufCrm : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0;">
                                        <b>Número do CRM:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($numeroCrm) && !empty($numeroCrm) ? $numeroCrm : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Email:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($email) && !empty($email) ? $email : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>CPF:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($cpf) && !empty($cpf) ? $cpf : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>CEP:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($cep) && !empty($cep) ? $cep : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Logradouro:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($logradouro) && !empty($logradouro) ? $logradouro : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Número:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($numero) && !empty($numero) ? $numero : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Bairro:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($bairro) && !empty($bairro) ? $bairro : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Estado:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($estado) && !empty($estado) ? $estado : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Cidade:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($cidade) && !empty($cidade) ? $cidade : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Assunto:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($assunto) && !empty($assunto) ? $assunto : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Mensagem:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($mensagem) && !empty($mensagem) ? $mensagem : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0;">
                                        <b>Justificativa:</b>
                                    </td>
                                    <td valign="top" halign="center"
                                        style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php echo isset($justificativa) && !empty($justificativa) ? $justificativa : '<span style="color: #999;">Não informado.</span>'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <b>Anexo:</b>
                                    </td>
                                    <td valign="top" style="padding: 8px 0; border-bottom: 1px solid #eeeeee;">
                                        <?php if(isset($anexo_nome) && !empty($anexo_nome)){ ?>
                                        <span style="color: #999;">
                                            Arquivo anexado: <?php echo $anexo_nome; ?>
                                        </span>
                                        <?php } else{ ?>
                                        <span style="color: #999;">
                                            Nenhum arquivo foi anexado a este contato.
                                        </span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>