# Fale Conosco

Formulário de contato institucional em **CodeIgniter 4** que direciona cada mensagem para a regional correta a partir da UF selecionada, com proteção anti-spam, validação de anexos e trilha de erro para o usuário.

## O problema

Uma organização com representação em todos os estados não pode usar um único endereço de contato: a mensagem precisa chegar à regional responsável pela UF de quem escreveu. Além disso, um formulário público aberto vira alvo de robôs de spam e de upload de arquivos maliciosos.

Este projeto resolve os três pontos: **roteamento por UF**, **verificação reCAPTCHA** e **validação estrita do anexo**.

## Funcionalidades

- **Roteamento por regional** — a UF enviada no formulário determina o destinatário; UF inexistente resulta em 404, sem vazar a lista de endereços
- **reCAPTCHA** — bloqueia envio automatizado antes de qualquer processamento
- **Sanitização de entrada** — todos os campos do POST passam por limpeza antes do uso
- **Validação de e-mail** — `FILTER_VALIDATE_EMAIL` no remetente
- **Upload controlado** — máximo de 5 MB, extensões restritas a `pdf`, `png`, `jpg`, `jpeg`, `doc`, `docx`, `zip`, `rar`
- **Nome de arquivo gerado** — o anexo é renomeado com `uniqid()` antes de ser gravado, evitando colisão e nomes maliciosos
- **Validação de CRM** — número de registro profissional conferido quando a UF não é nacional
- **Retorno ao usuário** — views distintas de sucesso e de erro, com mensagem explicando o que houve

## Rotas

| Método | Rota | Controller | Descrição |
|---|---|---|---|
| `GET` | `/formulario/{uf}` | `EmailController::index` | Exibe o formulário da regional |
| `POST` | `/enviar_email` | `EmailController::enviar_email` | Valida, anexa e envia a mensagem |

O *auto-routing* do CodeIgniter está **desligado** (`setAutoRoute(false)`) — só as rotas declaradas existem, o que reduz a superfície de ataque.

## Stack

PHP · CodeIgniter 4 · reCAPTCHA · HTML · CSS · JavaScript

## Estrutura

```
app/
  Controllers/EmailController.php   validação, upload e envio
  Controllers/Home.php              páginas do formulário
  Helpers/regional_helper.php       mapeia a UF para a regional destinatária
  Views/emails/                     corpo do e-mail, tela de sucesso e de erro
  Config/Routes.php                 rotas explícitas, auto-routing desabilitado
public/                             raiz web (único diretório exposto)
writable/uploads/temp/              área temporária dos anexos
README's/                           ADR com o registro das decisões de arquitetura
```

## Como rodar

**Pré-requisitos:** PHP 8.1+ com as extensões `intl` e `mbstring`, e um servidor SMTP para o envio.

```bash
git clone https://github.com/Lukaasz01/faleconosco.git
cd faleconosco

cp env .env
# edite o .env com as credenciais de SMTP e as chaves do reCAPTCHA

php spark serve
```

A aplicação sobe em `http://localhost:8080`. Acesse `/formulario/DF` (ou outra UF) para ver o formulário.

> Em produção, aponte o *DocumentRoot* para `public/`. Os demais diretórios não devem ficar acessíveis pela web.

## Decisões técnicas

- **Anexo gravado em `writable/uploads/temp/`** — fora da raiz pública, então o arquivo enviado nunca pode ser acessado por URL.
- **Extensão validada por lista de permitidos** — uma lista de bloqueio sempre deixa passar algo; a lista de permitidos falha para o lado seguro.
- **Renomear o arquivo com `uniqid()`** — descarta o nome escolhido pelo remetente, que é entrada não confiável.
- **404 para UF desconhecida** — não confirma nem nega a existência de uma regional, evitando enumeração.
- **reCAPTCHA verificado antes do processamento** — trabalho pesado (upload, envio) só acontece depois de comprovar que a requisição é legítima.
- **Decisões registradas em ADR** — o diretório `README's/` mantém o histórico de por que cada escolha foi feita.

## Melhorias mapeadas

- [ ] Instalar o CodeIgniter via Composer em vez de manter o framework no repositório
- [ ] Fila de envio para não bloquear a resposta HTTP
- [ ] Limpeza automática dos anexos temporários
- [ ] Testes automatizados do fluxo de envio
- [ ] Limite de requisições por IP

## Licença

[MIT](LICENSE)
