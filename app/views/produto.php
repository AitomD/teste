<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/produto.css">
</head>

<body>

    <div style="height: 50px;"></div>

    <div class="container-fluid text-center border cont-produto">
    <div class="row">
        <!-- Coluna lateral -->
        <div class="col-sm-2 text-start border">
            <br>
            <h5 class="text-light">
                <i class="fa-solid fa-clipboard "></i>
                Categorias
            </h5>
            <p class="text-light link-produto">Computadores Desktop</p>
            <p class="text-light link-produto">Notebooks</p>
            <p class="text-light link-produto">SmartTV</p>
            <p class="text-light link-produto">Smartphones</p>
            <br>
            <h5 class="text-light">
                <i class="fa-solid fa-microchip"></i>
                Computadores
            </h5>
            <p class="text-light link-produto">Acer</p>
            <p class="text-light link-produto">Asus</p>
            <p class="text-light link-produto">Dell</p>
            <p class="text-light link-produto">Lenovo</p>
            <p class="text-light link-produto">HP</p>
            <br>
            <h5 class="text-light">
                <i class="fa-solid fa-laptop"></i>
                Notebooks
            </h5>
            <p class="text-light link-produto">Acer</p>
            <p class="text-light link-produto">Asus</p>
            <p class="text-light link-produto">Dell</p>
            <p class="text-light link-produto">Lenovo</p>
            <p class="text-light link-produto">HP</p>
            <br>
            <h5 class="text-light">
                <i class="fa-solid fa-mobile-screen"></i>
                Smartphones
            </h5>
            <p class="text-light link-produto">Apple</p>
            <p class="text-light link-produto">Motorola</p>
            <p class="text-light link-produto">Oppo</p>
            <p class="text-light link-produto">Samsung</p>
            <p class="text-light link-produto">Xiaomi</p>
            <br>
            <h5 class="text-light">
                <i class="fa-solid fa-tv"></i>
                SmartTV
            </h5>
            <p class="text-light link-produto">AOC</p>
            <p class="text-light link-produto">LG</p>
            <p class="text-light link-produto">Philco</p>
            <p class="text-light link-produto">Samsung</p>
            <p class="text-light link-produto">Sony</p>
        </div>

        <!-- Coluna de produtos -->
        <div class="col-sm-9 ">
            <div class="row row-cols-5 row-cols-md-1 g-3" id="produtos">
                <!-- Produtos aparecem aqui via JS -->
            </div>
        </div>
    </div>
</div>


    <div style="height: 50px;"></div>

    <script src="../public/js/produto.js"></script>
</body>

</html>