<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body{
            background-image: url("14.png");
         
        }
    </style>
   <title>order now</title>
  </head>

  <body>

   <nav class="navbar navbar-expand-lg narbar-dark bg-dark">  
    <img class = "d-inline-block align-top" src="logo.png" width = "50" height= "50">
   <div class="collapse navbar-collapse" id = "navbarNav">
    <ul class="navbar-nav">
        <li class= "nav-item active">
            <a href="timeline.php" class="nav-link active">Home</a>
        </li>
        <li class= "nav-item active">
            <a href="available_books.php" class="nav-link">Available Books</a>
        </li>
        <li class= "nav-item active">
            <a href="edit_prp.php" class="nav-link">Upload Book</a>
        </li>
        <li class= "nav-item active">
            <a href="chatbot.php" class="nav-link">Messages</a>
        </li>
        <li class= "nav-item active">
            <a href="logout.php" class="nav-link">Log Out</a>
        </li>
    </ul>
   </div>
   <form class="d-flex">
    <input type="text" class="form-control me-2">
    <button type="submit" class="btn-primary">Search</button>
   </form>
   </nav>

   
   

<?php
require 'connection.php';

    $ido= $_GET['varname'];
    $query="select *from book where id = '$ido'";
    $qu = mysqli_query($conn,$query);
    $check = mysqli_num_rows($qu)>0;
    if($check)
    {
       while($row = mysqli_fetch_array($qu))
       {
            
          $name = $row['book_name'];
          $about = $row['review'];
          $price = $row['price'];
          $pic = $row['picture'];
       }
    }
?> 

<div class="container">
    <div class="row justify-content-center">
   <div class="col-md-8 mb-5">
        <h2 class ="text-center p-2 text-primary"> Fill the details to complete your order</h2>
        <h3>Product Details : </h3>
        <table class = "table  table-bordered" width = "500px">
            <tr>
                <th>Book Name: </th>
                <td><?php echo $name ?> </td>
                <td rowspan ="4" class="text-center"><img src="images/<?php echo $pic?>" alt = "image" width = "400px" height="600px"></td>
            </tr>
            <tr>
                <th>Product Price:  </th>
                <td><?php echo $price ?> Taka</td>
            </tr>
            <tr>
                <th>Review:  </th>
                <td><?php echo $about ?></td>
            </tr>
        </table>
        <form method = "post" action = "https://www.sandbox.paypal.com/cgi-bin/websrc">
  <input type = "hidden" name = "cmd" value="_xclick">
  <input type = "hidden" name = "business" value="sb-g10a518053886@business.example.com">
  <input type = "hidden" name = "item_name" value="Books">
  <input type = "hidden" name = "item_number" value="1">
  <input type = "hidden" name = "amount" value="200">
  <input type = "hidden" name = "no_shipping" value="0">
  <input type = "hidden" name = "no_note" value="1">
  <input type = "hidden" name = "currency_code" value="USD">
  <input type = "hidden" name = "lc" value="AU">
  <input type = "hidden" name = "rm" value="2">
  <input type = "hidden" name = "notify_url" value="http://localhost/cwh/confirm.php">
  <input type = "hidden" name = "return" value="http://localhost/cwh/confirm.php">

  <button type = "submit" name ="pay">Pay Now</button>

 </form>
        
             
   </div>
    </div>
</div>



    

</body>
<html>