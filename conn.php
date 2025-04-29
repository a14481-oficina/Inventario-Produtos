<?php
function connect() {
    $host = "sql103.alojamento-gratis.com";
    $user = "ljmn_38652497";
    $password = "qwas1234";
    $dbname = "ljmn_38652497_inventario_produtos";

    // Estabelecer conexão
    $conn = new mysqli($host, $user, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}
?>
