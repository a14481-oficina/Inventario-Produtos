<?php
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


//$sql = "SELECT id, nome, email FROM alunos";
$sql = "SELECT * FROM produtos" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar os dados em tabela HTML
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Desconto</th>
                <th>Preço</th>
                <th>Categoria</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["imagem"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["descricao"] . "</td>
                <td>" . $row["preco"] . "</td>
                <td>" . $row["desconto"] . "</td>
                <td>" . $row["categoria"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registo encontrado.";
}

// Fechar conexão
$conn->close();