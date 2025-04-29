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
    <title>Loja de Tecnologia</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header, footer { background: #222; color: white; padding: 1rem; text-align: center; }
        nav ul { list-style: none; display: flex; justify-content: center; gap: 20px; padding: 0; }
        nav a { color: white; text-decoration: none; }
        .container { display: flex; justify-content: center; padding: 20px; }
        form { display: flex; gap: 10px; }
        input[type="text"], button {
            padding: 8px; font-size: 16px;
        }
        button { background-color: #007BFF; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .produtos { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px; }
        .produto { border: 1px solid #ccc; padding: 10px; width: 220px; text-align: center; }
        .produto img { max-width: 100%; height: auto; }
    </style>
</head>
<body>

    <header>
        <h1>Loja Tech</h1>
        <nav>
            <ul>
                <li><a href="#home">Início</a></li>
                <li><a href="#produtos">Produtos</a></li>
            </ul>
            <form action="logout.php" method="post" class="d-grid gap-2 d-md-flex justify-content-md-end" >
                <button type="submit" class="btn btn-primary btn-sm" ><img src="imagens/logout_icon.png" alt="Logout Icon" width="30" height="30"></button>
            </form>
        </nav>
    </header>

    <div class="container">
        <form action="pesquisa.php" method="GET">
            <input type="text" name="query" placeholder="Digite sua pesquisa" required>
            <button type="submit">Procurar</button>
        </form>
    </div>

    <section id="home">
        <h2 style="text-align:center;">Bem-vindo à Loja de Tecnologia</h2>
    </section>

    <section id="produtos">
        <h2 style="text-align:center;">Novidades</h2>
        <div class="produtos">
            <div class="produto">
                <img src="imagens/computador.jpg" alt="Computador">
                <h3>Computador Gaming</h3>
                <p>899,00 €</p>
                <a href="carrinho.php?acao=adicionar&id=1&nome=Computador%20Gaming&preco=899.00">Adicionar ao Carrinho</a>
            </div>
            <div class="produto">
                <img src="imagens/smartphone.jpg" alt="Smartphone">
                <h3>iPhone 16</h3>
                <p>869,99 €</p>
                <a href="carrinho.php?acao=adicionar&id=2&nome=iPhone%2016&preco=869.99">Adicionar ao Carrinho</a>
            </div>
            <div class="produto">
                <img src="imagens/headset.jpg" alt="Headset">
                <h3>Headset HyperX</h3>
                <p>119,90 €</p>
                <a href="carrinho.php?acao=adicionar&id=3&nome=Headset%20HyperX&preco=119.90">Adicionar ao Carrinho</a>
            </div>
            <div class="produto">
                <img src="imagens/monitor.jpg" alt="Monitor">
                <h3>Monitor AOC 24</h3>
                <p>159,90 €</p>
                <a href="carrinho.php?acao=adicionar&id=4&nome=Monitor%20AOC%2024&preco=159.90">Adicionar ao Carrinho</a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Loja Tech. Todos os direitos reservados.</p>
    </footer>

</body>
</html>