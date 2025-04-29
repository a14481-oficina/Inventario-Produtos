<?php
require "conn.php";

function registerUser($email, $username, $password, $confirm_password) {
    $mysqli = connect();
    
    $email = trim($email);
    $username = trim($username);
    $password = trim($password);
    $confirm_password = trim($confirm_password);
    
    $args = func_get_args();
    foreach ($args as $value) {
        if (empty($value)) {
            return "Preencha todos os campos!";
        }
        if (preg_match("/([<|>])/", $value)) {
            return "< and > Estes caracteres não podem ser usados!";
        }
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email não é valido!";
    }

    // Verifica se email já existe
    $stmt = $mysqli->prepare("SELECT email FROM contas WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->fetch_assoc() != NULL) {
        return "Email já esta a ser usado!";
    }

    if (strlen($username) > 100) {
        return "Utillizador é muito longo!";
    }

    // Verifica se o utilizador já existe
    $stmt = $mysqli->prepare("SELECT utilizador FROM contas WHERE utilizador = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    if ($stmt->get_result()->fetch_assoc() != NULL) {
        return "Utilizador já esta a ser usado, escolha outro!";
    }

    if (strlen($password) > 255) {
        return "Palavra-passe é muito longa!";
    }

    if ($password !== $confirm_password) {
        return "As palavras-passes estão diferentes!";
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO contas (utilizador, email, palavra_passe) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    $stmt->execute();

    if ($stmt->affected_rows != 1) {
        return "Aconteceu um erro tente de novo!";
    } else {
        return "success";
    }
}

function loginUser($username, $password) {
    $mysqli = connect();

    $username = trim($username);
    $password = trim($password);

    if (empty($username) || empty($password)) {
        return "Preencha todos os campos!";
    }

    $stmt = $mysqli->prepare("SELECT utilizador, palavra_passe FROM contas WHERE utilizador = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data == NULL) {
        return "Utilizador ou palavra-passe incorretos!";
    }

    if (!password_verify($password, $data["palavra_passe"])) {
        return "Utilizador ou palavra-passe incorretos!";
    } else {
        session_start();
        $_SESSION["user"] = $username;
        header("location: loja.php");
        exit();
    }
}
function logoutUser() {
    session_start();
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}

function adicionarProduto($nome, $descricao, $imagem, $preco, $desconto, $categoria) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, imagem, preco, desconto, categoria) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdds", $nome, $descricao, $imagem, $preco, $desconto, $categoria);

    if ($stmt->execute()) {
        return "Produto adicionado com sucesso!";
    } else {
        return "Erro ao adicionar: " . $conn->error;
    }
}
function editarProduto($id, $nome, $descricao, $imagem, $preco, $desconto, $categoria) {
    global $conn;

    $stmt = $conn->prepare("UPDATE produtos SET nome=?, descricao=?, imagem=?, preco=?, desconto=?, categoria=? WHERE id=?");
    $stmt->bind_param("sssddsi", $nome, $descricao, $imagem, $preco, $desconto, $categoria, $id);

    if ($stmt->execute()) {
        return "Produto atualizado com sucesso!";
    } else {
        return "Erro ao atualizar: " . $conn->error;
    }
}
function removerProduto($id) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        return "Produto removido com sucesso!";
    } else {
        return "Erro ao remover: " . $conn->error;
    }
}

?>
