<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada</title>
	
    <link href="https://portal.cfm.org.br/wp-content/themes/portalcfm/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('css/error_404.css') ?>">
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center p-3">

    <main class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card error-card border-0 shadow-lg mx-auto overflow-hidden position-relative">
                    
                    <div class="position-absolute top-0 start-0 p-3 p-md-4">
                        <img src="<?= base_url('img/logo/bola.png') ?>" alt="Logo CFM" class="img-fluid" style="max-height: 45px; width: auto;">
                    </div>

                    <div class="card-body p-4 p-md-5 text-center mt-3 mt-md-0">

                        <div class="icon-box-wrapper mb-3">
                            <div class="icon-badge">
                                <i class="bi bi-file-earmark-medical fs-1"></i>
                            </div>
                        </div>

                        <h1 class="error-code mb-0">404</h1>
                        <h2 class="h4 fw-bold mb-3" id="errorTitle">Página ou recurso não localizado</h2>

                        <p class="text-secondary mb-4 mx-auto" style="max-width: 500px;" id="errorMessage">
                            O endereço solicitado não existe neste sistema, mudou de local ou requer permissões específicas de acesso.
                        </p>

                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="http://cau.cfm.org.br/cau/" class="btn btn-cfm-primary px-4 py-2 rounded-3 fw-medium">
                                <i class="bi bi-flag me-1"></i>Reportar Problema
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>