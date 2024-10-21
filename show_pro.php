<?php

include 'config.php';

session_start();

if(isset($_POST['submit']) && isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];
    $text = $_POST['post_text'];

    $imagename = $_FILES['post_img']['name'];
    $tmpname = $_FILES['post_img']['tmp_name'];
    $uploc = 'images/'.$imagename;

    $qu = "insert into posts(user_id,post_img,post_txt) values ('$user_id','$imagename','$text')";
    
    if(mysqli_query($conn,$qu))
   {
    header('location:timeline.php');
      
    move_uploaded_file($tmpname,$uploc);
   }
   else{
    echo "NOT DOE";
    
  }
}
else
{
    
}

?>






<!doctype html>
<html lang="en">
  <head>

  <style>
    a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}
  </style>
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
            <a href="available_books.php" class="nav-link">Available Books</a>
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

<?php
   
    $query="select *from user_details where user_id = '$idp'";
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
      
        
       <div class="popo">    
        <a href="chat.php" class="button">Send me message!</a>
     </div>
</div>


<script src = "nice.js"></script>
    <script src="assets/js/custom.js?v=<?=time()?>"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

</body>
<html>