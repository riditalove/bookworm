<?php
session_start();
require 'connection.php';
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


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>edit_profile</title>
  </head>
  <body>
    
   <nav class="navbar navbar-expand-lg narbar-dark bg-dark">  
    <img class = "d-inline-block align-top" src="logo.png" width = "50" height= "50">
   
   <div class="collapse navbar-collapse" id = "navbarNav">
    <ul class="navbar-nav">
    <?php 

    if(isset($_SESSION['user_id'])){

?>
<!-- Button trigger modal -->




<li class="nav-item">
                    
<li class="nav-item">
      <a class="nav-link" href="timeline.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="available_books.php">Available Books</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="edit_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="chatbot.php">Message</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>

    <?php } else {?>

        <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
        <?php }  ?>


    <!-- Dropdown -->
    <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li> -->
    </ul>
 
   </div>
  
   <form class="d-flex">
    <input type="text" class="form-control me-2" id="searchbar" name ="searchbar">
    <button type="submit" class="btn-primary">Search</button>
   </form>
   

   </nav>


   <div class="form-container">

   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype = "multipart/form-data">
      <h3>Upload your book information</h3>

      
      <input type="text" name="address" placeholder="Enter your address" required class="box">
      <input type="text" name="book_name" placeholder="Enter your book name" required class="box">
      <input type="text" name="review" placeholder="Enter your review" required class="box">
      <input type="text" name="price" placeholder="How much price you want to keep" required class="box"> 
      <input type="text" name="days" placeholder="Days want to lend" required class="box">
      <input type="file" name="picture">
    
      <input type="submit" name="submit" value="Insert" class='btn'>
     
      
   </form>

</div>

   
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src = "nice.js"></script>
    <script src="assets/js/custom.js?v=<?=time()?>"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>