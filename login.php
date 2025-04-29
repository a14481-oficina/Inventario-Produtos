<?php 
require "functions.php";

session_start();

if (isset($_POST['submit'])) {
    $response = loginUser($_POST['utilizador'], $_POST['password']);
    if ($response === 'success') {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>Página de Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>

    <form action="" method="post" class="login-form">
        <div class="input-group">
            <label for="utilizador">Utilizador</label>
            <input type="text" id="utilizador" name="utilizador" required placeholder="Digite o seu utilizador" value="<?php echo htmlspecialchars($_POST['utilizador'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <div class="input-group">
            <label for="password">Palavra-passe</label>
            <input type="password" id="password" name="password" required placeholder="Digite sua palavra-passe">
        </div>

        <button type="submit" name="submit" class="btn">Entrar</button>

        <div class="register-link">
            <p>Não tem uma conta? <a href="criar_conta.php">Cadastre-se aqui</a></p>
        </div>

        <?php if (!empty($response) && $response !== 'success'): ?>
            <p class="error"><?php echo htmlspecialchars($response); ?></p>
        <?php endif; ?>
    </form>
</div>

