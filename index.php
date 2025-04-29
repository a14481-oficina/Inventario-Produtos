<!DOCTYPE html>
<?php
if (isset($_POST['logout'])) {
    require_once "functions.php";
    logoutUser();
}
?>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja de Tecnologia</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="logo">
            <h1>Loja Tech</h1>
        </div>

        <nav>
            <ul>
                <li><a href="#home">Início</a></li>
                <li><a href="#produtos">Produtos</a></li>
                
            </ul>
        </nav>
           <form action="logout.php" method="post" class="d-grid gap-2 d-md-flex justify-content-md-end" >
                <button type="submit" class="btn btn-primary btn-sm" ><img src="imagens/logout_icon.png" alt="Logout Icon" width="30" height="30"></button>
            </form>
    </header>

    <!-- Banner Principal -->
    <section id="home">
        <div class="banner">
            <h2>Bem-vindo</h2>
            <p>Encontre os melhores produtos para o seu dia a dia!</p>
        </div>
    </section>

    <!-- Categorias de Produtos -->
    <section id="produtos">
        <h2>Produtos em Destaque</h2>
        <div class="categorias">
            <div class="categoria">
                <h3>Computadores</h3>
                <a href="#">Ver mais</a>
            </div>
            <div class="categoria">
                <h3>Smartphones</h3>
                <a href="#">Ver mais</a>
            </div>
            <div class="categoria">
                <h3>Acessórios</h3>
                <a href="#">Ver mais</a>
            </div>
            <div class="categoria">
                <h3>Periféricos</h3>
                <a href="#">Ver mais</a>
            </div>
        </div>
    </section>

    <!-- Produtos -->
    <section id="produtos-lista">
        <h2>Novidades</h2>
        <div class="produtos">
            <div class="produto">
                <img src="computador.jpg" alt="Computador">
                <h3>Computador Gamer</h3>
                <p>R$ 3.499,00</p>
                <a href="#">Adicionar ao Carrinho</a>
            </div>
            <div class="produto">
                <img src="smartphone.jpg" alt="Smartphone">
                <h3>Smartphone X</h3>
                <p>R$ 1.799,00</p>
                <a href="#">Adicionar ao Carrinho</a>
            </div>
            <div class="produto">
                <img src="headset.jpg" alt="Headset">
                <h3>Headset Gamer</h3>
                <p>R$ 399,00</p>
                <a href="#">Adicionar ao Carrinho</a>
            </div>
            <div class="produto">
                <img src="monitor.jpg" alt="Monitor">
                <h3>Monitor 24"</h3>
                <p>R$ 899,00</p>
                <a href="#">Adicionar ao Carrinho</a>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2025 Loja Tech. Todos os direitos reservados.</p>
    </footer>
    
