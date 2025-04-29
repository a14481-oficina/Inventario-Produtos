<?php

include('conn.php');

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_descricao = $_POST['product_descricao'];
   $product_desconto = $_POST['product_desconto'];
   $product_categoria = $_POST['product_categoria'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $extensao = pathinfo($product_image, PATHINFO_EXTENSION);
   $nome_unico = uniqid("produto_", true) . '.' . $extensao;
   $product_image_folder = 'imagens_produtos/'.$nome_unico;

   $missing_fields = [];

    if(empty($product_name)) $missing_fields[] = "Nome";
    if($product_price === '' || !isset($product_price)) $missing_fields[] = "Preço";
    if(empty($product_image)) $missing_fields[] = "Imagem";
    if(empty($product_descricao)) $missing_fields[] = "Descrição";
    if($product_desconto === '' || !isset($product_desconto)) $missing_fields[] = "Desconto";
    if(empty($product_categoria)) $missing_fields[] = "Categoria";

    if (!empty($missing_fields)) {
        $message[] = 'Por favor preencha: ' . implode(', ', $missing_fields);
    }else{
      $insert = "INSERT INTO produtos(imagem, nome, descricao, preco, desconto, categoria) VALUES('$nome_unico', '$product_name', '$product_descricao', '$product_price', '$product_desconto', '$product_categoria')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'Produto adicionado com sucesso!';
      }else{
         $message[] = 'Não foi possivel adicionar o produto!';
      }
   }



};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM produtos WHERE id = $id");
   header('location:adicionar_produtos.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Adicionar Produtos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style_adicionar_produtos.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Adicionar Produto</h3>
         <input type="text" placeholder="Ensira o nome do produto" name="product_name" class="box">
         <input type="number" placeholder="Ensira o preço do produto" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="text" placeholder="Ensira a descrição do produto" name="product_descricao" class="box">
         <input type="number" placeholder="Ensira o desconto" name="product_desconto" class="box">
         <input type="text" placeholder="Ensira a categoria do produto" name="product_categoria" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM produtos");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Desconto</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="imagens_produtos/<?php echo $row['imagem']; ?>" height="100" alt=""></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['preco']; ?></td>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['desconto']; ?></td>
            <td>
               <a href="adicionar_produtos_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Editar </a>
               <a href="adicionar_produtos.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Eliminar </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

</body>
</html>