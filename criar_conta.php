<?php 
require "functions.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $response = registerUser($_POST['email'], $_POST['utilizador'], $_POST['password'], $_POST['confirm-password']);
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>Página para Criar Conta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Criar Conta</h2>

    <form action="" method="post" class="login-form">
        <div class="input-group">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" required placeholder="Digite o seu E-mail" value="<?php echo @$_POST['email'] ?>">
        </div>

        <div class="input-group">
            <label for="utilizador">Utilizador</label>
            <input type="text" id="utilizador" name="utilizador" required placeholder="Digite o seu utilizador" value="<?php echo @$_POST['utilizador'] ?>">
        </div>

        <div class="input-group">
            <label for="password">Palavra-passe</label>
            <input type="password" id="password" name="password" required placeholder="Digite sua palavra-passe">
        </div>

        <div class="input-group">
            <label for="confirm-password">Confirmar Palavra-passe</label>
            <input type="password" id="confirm-password" name="confirm-password" required placeholder="Digite sua palavra-passe">
        </div>

        <button type="submit" class="btn" name="submit">Criar</button>

        <div class="register-link">
            <p>Já tem uma conta? <a href="login.php">Login aqui</a></p>
        </div>

        <?php if (isset($response)): ?>
            <?php if ($response == "success"): ?>
                <p class="success">A sua conta foi criada com sucesso!</p>
            <?php else: ?>
                <p class="error"><?php echo $response; ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </form>
</div>
</body>
</html>