<?php

include('conn.php');

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_descricao = $_POST['product_descricao'];
   $product_desconto = $_POST['product_desconto'];
   $product_categoria = $_POST['product_categoria'];
   $product_price = $_POST['product_price'];

   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $image_update_sql = "";

   $missing_fields = [];

   if(empty($product_name)) $missing_fields[] = "Nome";
   if($product_price === '' || !isset($product_price)) $missing_fields[] = "Preço";
   if($product_descricao === '') $missing_fields[] = "Descrição";
   if($product_desconto === '' || !isset($product_desconto)) $missing_fields[] = "Desconto";
   if(empty($product_categoria)) $missing_fields[] = "Categoria";

   if (!empty($missing_fields)) {
      $message[] = "Preencha: " . implode(', ', $missing_fields);
   } else {
      // Verifica se a imagem foi alterada
      $select = mysqli_query($conn, "SELECT imagem FROM produtos WHERE id = '$id'");
      $row = mysqli_fetch_assoc($select);
      $old_image = $row['imagem'];  // Nome da imagem antiga

      // Se uma nova imagem foi enviada, processa a atualização
      if (!empty($product_image)) {
         // Exclui a imagem anterior, se existir
         $old_image_path = 'imagens_produtos/' . $old_image;
         if (file_exists($old_image_path)) {
            unlink($old_image_path);  // Exclui o arquivo antigo
         }

         // Gera um nome único para a nova imagem
         $extensao = pathinfo($product_image, PATHINFO_EXTENSION);
         $nome_unico = uniqid("produto_", true) . '.' . $extensao;
         $product_image_folder = 'imagens_produtos/' . $nome_unico;
         $image_update_sql = ", imagem='$nome_unico'";
      }

      // Atualiza os dados no banco
      $update_data = "UPDATE produtos SET 
         nome='$product_name', 
         descricao='$product_descricao',  
         preco='$product_price', 
         desconto='$product_desconto', 
         categoria='$product_categoria'
         $image_update_sql 
         WHERE id = '$id'";

      $upload = mysqli_query($conn, $update_data);

      if($upload){
         // Se uma nova imagem foi enviada, move o arquivo para o diretório
         if (!empty($product_image)) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
         }
         header('location:adicionar_produtos.php');
      } else {
         $message[] = 'Não foi possível atualizar o produto';
      }
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM produtos WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="Ensira o nome do produto">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="Ensira o preço do produto">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="text" class="box" name="product_descricao" value="<?php echo $row['descricao']; ?>" placeholder="Ensira o descricao do produto">
      <input type="number" class="box" name="product_desconto" value="<?php echo $row['desconto']; ?>" placeholder="Ensira o desconto do produto">
      <input type="text" class="box" name="product_categoria" value="<?php echo $row['categoria']; ?>" placeholder="Ensira a categoria do produto">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="adicionar_produtos.php" class="btn">go back!</a>
   </form>
   <?php }; ?>
</div>

</div>

</body>
</html>