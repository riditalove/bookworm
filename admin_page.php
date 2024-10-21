<!doctype html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
    <title>admin page</title>
  </head>

  <body>
    
   <nav class="navbar navbar-expand-lg narbar-dark bg-dark">  
    <img class = "d-inline-block align-top" src="logo.png" width = "50" height= "50">
   
   <div class="collapse navbar-collapse" id = "navbarNav">
    <ul class="navbar-nav">
    <?php 

    session_start();

    if(isset($_SESSION['admin_id'])){

?>
<!-- Button trigger modal -->




<li class="nav-item">
                    
<li class="nav-item">
      <a class="nav-link" href="admin_page.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="available_books.php">Available Books</a>
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
     <!--<li class="nav-item dropdown">
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

   <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-info">
            <h4 class ="text-white">Details about the users</h4>
          </div>
          <div class="card-body">
          <?php
             $fon = mysqli_connect('localhost','ridita','1234','shop_db');
             $toto = "select *from user_details order by user_id asc";
            $query_run = mysqli_query($fon,$toto);
          ?>
         <table class="table">
          <thead>
             <tr>
            
              <th>Full Name</th>
              <th>Parmanent Address</th>
              <th>Phone NUmber</th>
              <th>Email</th>
              <th>About</th>
              <th>Picture</th>
              <th>Restrict</th>
             </tr>
          </thead>
          <tbody>
            <?php
                if(mysqli_num_rows($query_run)>0)
                {
                  while($row = mysqli_fetch_assoc($query_run))
                  {
                     ?>
                     <tr>
                   
                     <td><?php echo $row['full_name'] ?></td>
                     <td><?php echo $row['permanent_address'] ?></td>
                     <td><?php echo $row['phone_number'] ?></td>
                     <td><?php echo $row['email'] ?></td>
                     <td><?php echo $row['about'] ?></td>
                     <td><img src="images/<?php echo $row['profile_picture']?>"
        alt="user" width="150"></td>
                     <td>
                        <form action="code.php" method = "post">
                          <input type="hidden" name = "delete_id" value = "<?php echo $row['user_id']?>">
                           <button type ="submit" name ="register_delete_btn" class = "btn btn-danger">Block</button>
                        </form>
                       
                     </td>
                     
                    </tr>


                     <?php
                  }
                }
                else{
                  ?>
                     <tr>
                      <td>
                        NO record found!
                      </td>
                     </tr>
                  <?php
                  
                }
            ?>
          <tr>
            <td>

            </td>
          </tr>
          </tbody>

         </table>
          </div>
        </div>
      </div>
    </div>
   </div>

  
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

   
    </body>
    </html>