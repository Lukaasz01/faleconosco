<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erro!</title>
  <link rel="shortcut icon" href="https://portal.cfm.org.br/wp-content/themes/portalcfm/assets/images/favicon.ico"
    type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>

<body>

  <div class="container-fluid bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="row">
      <div class="col-12">

        <div class="card border-top-green shadow-lg text-center mx-550 px-5 py-2 gap-4">
          <img src="https://portal.cfm.org.br/wp-content/themes/portalcfm/assets/images/favicon.ico" alt="Logo CFM"
            class="img-fluid mx-auto mb-2 mt-3">

          <h1 class="bg-medium-green text-white shadow rounded fw-bold px-3 py-2 fs-2">Não foi possível enviar seu contato.</h1>
          <p class="text-bluish-green fw-bold px-3 py-1 fs-5"> 
            Caso o erro persista, tente mais tarde, ou contate-nos pelo email.
          </p>

          <div class="text-bluish-green fw-bold">
            <?php echo date("Y") ?> -
            <?php 
            if (is_array($regionalData) && isset($regionalData['nome'])) {
                echo $regionalData['nome'];
            } else {
                echo $regionalData;
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>