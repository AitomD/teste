<?php
// Lista de páginas permitidas
$paginasPermitidas = [
    'home',
    'login',
    'cadastro',
    'ofertas',
    'produto',
    'cupons',
    '404'
];

// Página padrão
$pagina = $_GET['url'] ?? 'home';

// Sanitiza a URL para evitar path traversal (ex: ../)
$pagina = basename($pagina);

// Caminho base das views (corrigido para sair da pasta public)
$viewFile = __DIR__ . "/../app/views/{$pagina}.php";

// Configura classes do body e CSS condicional para páginas de autenticação
$isAuthPage = in_array($pagina, ['login', 'cadastro']);
$bodyClass = '';
if ($isAuthPage) {
    $bodyClass = 'auth-page ' . ($pagina === 'login' ? 'login-page' : 'register-page');
}

// Verifica se o arquivo existe e é permitido
if (!in_array($pagina, $paginasPermitidas) || !file_exists($viewFile)) {
    $viewFile = __DIR__ . "/../app/views/404.php";
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAFTECH</title>
    <link rel="shortcut icon" href="img/logoMain.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <?php if ($isAuthPage): ?>
    <link rel="stylesheet" href="css/logincadastro.css">
    <?php endif; ?>
    <link rel="stylesheet" href="css/foot.css">
    <link rel="stylesheet" href="css/ofertas.css">
    <link rel="stylesheet" href="css/produto.css">
    <link rel="stylesheet" href="css/cuponcss.css">
</head>

<body<?= $bodyClass ? ' class="' . htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8') . '"' : '' ?>>

    <?php if (!$isAuthPage): ?>
    <nav class="navbar navbar-expand-lg position-relative z-3" style="background-color: #09090A;">
        <div class="container-fluid">

            <!-- LOGO À ESQUERDA -->
            <a class="navbar-brand" href="index.php?url=home">
                <img src="img/logoMain.png" alt="logo" style="width: 150px;">
            </a>

            <!-- BOTÃO TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- DIV CENTRALIZADA -->
            <div class="central-nav-content text-center">
                <div>
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <span class="input-group-text" id="search-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                                id="searchbar">
                        </div>
                    </form>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link p-btn mx-1" aria-current="page" href="index.php?url=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-btn mx-1" href="index.php?url=ofertas">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-btn mx-1" href="index.php?url=cupons">Cupons</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-btn mx-1" href="#">Categorias</a>

                            <ul class="dropdown-menu" style="background-color: #09090A;">
                                <li><a class="dropdown-item p-btn" href="index.php?url=produto">Computadores</a></li>
                                <li><a class="dropdown-item p-btn" href="index.php?url=produto">Notebooks</a></li>
                                <li><a class="dropdown-item p-btn" href="index.php?url=produto">Smartphones</a></li>
                                <li><a class="dropdown-item p-btn" href="index.php?url=produto">SmartTV</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="">
                <ul class="navbar-nav mb-2 mx-5 mb-lg-0 ">
                    <li><a href="index.php?url=login" class="p-btn mx-3">Entrar</a></li>
                    <li><a href="index.php?url=cadastro" class="p-btn mx-3">Cadastrar</a></li>
                    <li><a href="#" class="text-light fs-4 m-4"><i class="bi bi-cart2"></i></a></li>
                </ul>

            </div>
        </div>
    </nav>
    <?php endif; ?>
    <main>

        <?php require $viewFile; ?>


    </main>
    <?php if (!$isAuthPage): ?>
    <footer class="z-3 mt-3" data-aos="fade-up">
        <div class="footer-container d-flex mx-4">
            <div class="footer-column mx-5">
                <h4 class="text-light">Sobre Nós</h4>
                <ul class="dev-list">
                    <li>
                        <span class="text-light text-dimmed">Fernando Consolin Rosa</span>
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-github"></i></a>
                    </li>
                    <li>
                        <span class="text-light text-dimmed">Aitom Henrique Donatoni</span>
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-github"></i></a>
                    </li>
                    <li>
                        <span class="text-light text-dimmed">Hiago Nascimento</span>
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-github"></i></a>
                    </li>
                </ul>
            </div>
            <div class="footer-column mx-3">
                <h4 class="text-light">Novidades e Promoções</h4>
                <div class="d-flex">
                    <ul class="dev-list">
                        <li>Dia Das Crianças</li>
                        <li>Black Friday</li>
                    </ul>
                    <ul class="dev-list mx-3">
                        <li>Oferta Tech</li>
                        <li>Gift Card HAFTECH!</li>
                    </ul>
                </div>
            </div>
            <div class="footer-column mx-5">
                <h4 class="text-light">Atendimento</h4>
                <ul class="dev-list">
                    <li><a href="#">Entre em Contato</a></li>
                </ul>
            </div>
            <div class="footer-column mx-5">
                <h4 class="text-light">Outros</h4>
                <ul class="dev-list">
                    <li><a href="#">Termos e Condições</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init(); // Inicializa as animações
</script>
    <script src="../public/js/dropinteracao.js"></script>
    <script src="../public/js/activebtn.js"></script>
    <script src="../public/js/produto.js"></script>
</body>

</html>