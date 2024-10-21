<?php

require 'connection.php';

session_start();

if(isset($_POST['submit']) && isset($_SESSION['user_id']))
{ 
    $yname = $_SESSION['user_name'];
    $address = $_POST['address'];
    $bname = $_POST['book_name'];
    $review = $_POST['review'];
    $price = $_POST['price'];
    $id = $_SESSION['user_id'];
   
   $imagename = $_FILES['picture']['name'];
   $tmpname = $_FILES['picture']['tmp_name'];
   $uploc = 'images/'.$imagename;

   $q = "insert into book(book_name,review,price,picture,your_name,address,id) values ('$bname','$review','$price','$imagename','$yname','$address','$id')";

   if(mysqli_query($conn,$q))
   {
    echo "Data inserted!";
    move_uploaded_file($tmpname,$uploc);
   }
   else{
    echo "DATA NOZT INSERT";
   }

    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploading</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>



<div class="form-container">

   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype = "multipart/form-data">
      <h3>Upload your book information</h3>

      
      <input type="text" name="address" placeholder="Enter your address" required class="box">
      <input type="text" name="book_name" placeholder="Enter your book name" required class="box">
      <input type="text" name="review" placeholder="Enter your review" required class="box">
      <input type="text" name="price" placeholder="How much price you want to keep" required class="box"> 
      <input type="file" name="picture">
    
      <input type="submit" name="submit" value="Insert" class='btn'>
     
      
   </form>

</div>
    
</body>
</html>