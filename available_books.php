

<?php
require 'connection.php';

session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
   <title>show_profile</title>
   <style> 
  body {
  background-image: url("10.png");
  background-color: #cccccc;
}
   
</style>  
  </head>

  <body>
  <nav class="navbar navbar-expand-lg narbar-dark bg-dark">  
    <img class = "d-inline-block align-top" src="logo.png" width = "50" height= "50">
    <div class="collapse navbar-collapse" id = "navbarNav">
    <ul class="navbar-nav">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src=" " id= "blah" alt ="Image" ><br><br>
                <form method = "post" action = "<?php echo $_SERVER['PHP_SELF']?>" enctype = "multipart/form-data">
                    <div class="my-3">
                        <input class="form-control" name = "post_img" type="file" onchange="readUrl(this)">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Say Something</label>
                        <textarea name ="post_text"class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Post" class="btn">
                </form>
            </div>
           
        </div>
   </div>
  </div>
        <li class="nav-item">
                    
                    <button type="submit" class="btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Add post
                    </button>
        </li> 
        <li class= "nav-item active">
            <a href="timeline.php" class="nav-link">Home</a>
        </li>
        <li class= "nav-item active">
            <a href="edit_prp.php" class="nav-link">Upload Books</a>
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


 


<div class="wrapper">
    <?php
if(isset($_SESSION['user_id']))
{
     $idp = $_SESSION['user_id'];
}?>
 


<div class="container py-5">
    <div class="row">
    <?php
   
   $query= "select *from book
   JOIN user_details
   ON book.id = user_details.user_id";;
   $qu = mysqli_query($conn,$query);
   $check = mysqli_num_rows($qu)>0;
   if($check)
   {
      while($row = mysqli_fetch_array($qu))
      {
        ?>

     <div class="col-md-5 mt-3">
            <div class="card">
            <img src= " images/<?php echo $row['picture']?>" height ="600px" width= "200px"class = "card-img-top" alt = "Book Image ">
                <div class="card-body">
                    
                    <h2 class = "card-title"><?php echo $row['book_name'] ?></h2>
                    <p class ="card-text ">
                     <h6>User Details: </h6><?php echo $row['full_name']?><br>
                     <?php echo $row['email']?>
                     <?php echo $row['user_id'] ;
                     $id_borrow = $row['user_id']?><br>
                     <a href="lend.php? varname=<?php echo $id_borrow ?>">Click here to contact me</a><br>
                     <a href="buyme.php? varname=<?php echo $id_borrow ?>">Click here to borrow</a>
                     
                     
                    </p>
                    <p class ="card-text ">
                     <h6>Address: </h6><?php echo $row['permanent_address']?><br>
                     <h7>Phone number: </h7><?php echo $row['phone_number']?>
                     <p class ="card-text ">
                     <h6>Price: </h6><?php echo $row['price']?>
                     
                     
                    </p>
                     
                    </p>
                </div>
            </div>
        </div>
      </div>
         <?php


      }
   }
?>
        

</div>


<script src = "nice.js"></script>
    <script src="assets/js/custom.js?v=<?=time()?>"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   

</body>
<html>