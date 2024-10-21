<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stp.css">
   <title>show_profile</title>
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
            <a href="#" class="nav-link">Messages</a>
        </li>
        <li class= "nav-item active">
            <a href="#" class="nav-link">Log Out</a>
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

session_start();
?>

<div class="wrapper">
    <?php
if(isset($_SESSION['user_id']))
{
     $idp = $_SESSION['user_id'];
}?>

<?php
    $ido= $_GET['varname'];
    $query="select *from user_details where user_id = '$ido'";
    $qu = mysqli_query($conn,$query);
    $check = mysqli_num_rows($qu)>0;
    if($check)
    {
       while($row = mysqli_fetch_array($qu))
       {
            
          $name = $row['full_name'];
          $about = $row['about'];
          $email = $row['email'];
          $phone = $row['phone_number'];
          $edu = $row['education_qualification'];
          $ad = $row['permanent_address'];
          $pic = $row['profile_picture'];
       }
    }
?> 


<div class="left">
    
        <img src="images/<?php echo $pic?>"
        alt="user" width="150">
        <h4><?php echo $name ?> </h4>
         <p><?php echo $about ?> </p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Contact with me</h4>
                    <p><?php echo $email ?> </p>
                    
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p><?php echo $phone ?> </p>
              </div>
            </div>
        </div>
      
      <div class="projects">
            <h3>Details about me</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Address</h4>
                    <p><?php echo $ad ?> </p>
                 </div>
                 <div class="data">
                   <h4>Education Qualification</h4>
                    <p><?php echo $edu?> </p>
              </div>
            </div>
        </div>
      
        <div class="social_media">
           
              <button class='btn btn-primary ' onclick = 'sendAction(1,"<?php echo $id?>")'>Send me a book Request</button>
          
      </div>
    </div>
</div>



    

</body>
<html>