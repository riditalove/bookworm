<?php
 
 $conn = mysqli_connect("localhost","ridita","1234","shop_db");

 
 session_start();
 
 if(isset($_POST['submit']) && isset($_SESSION['user_id']))
 { 
     $user_id = $_SESSION['user_id'];
     $email = $_SESSION['user_email'];
     $fname = $_POST['full_name'];
     $paddress = $_POST['permanent_address'];
     $ph_number = $_POST['phone_number'];
     $country = $_POST['country'];
     $edu = $_POST['education_qualification'];
     $about = $_POST['about'];
     $gender = $_POST['gender'];
    
    $imagename = $_FILES['profile_picture']['name'];
    $tmpname = $_FILES['profile_picture']['tmp_name'];
    $uploc = 'images/'.$imagename;
 
    $q = "insert into user_details(user_id,full_name,permanent_address,phone_number,email,country,education_qualification,about,gender,profile_picture) values ('$user_id','$fname','$paddress','$ph_number','$email','$country','$edu','$about','$gender','$imagename')";
     
 
 if(mysqli_query($conn,$q))
   {
    header("Location: show_pro.php");
    move_uploaded_file($tmpname,$uploc);
   }
   else{
    
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
    <link rel="stylesheet" href="css/st.css">
   <title>edit_profile</title>
  </head>
  <body class="okay">

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
  <div class="wrapper">
    <h2>Edit Profile</h2>
    <form class = "profile-page" action="<?php echo $_SERVER['PHP_SELF'] ?>" method= "post" enctype = "multipart/form-data">
    <div class="inputbox">
      <label for="full_name">Full Name</label>
      <input type = "text" id = "full_name" name="full_name" required>
    </div>
    <div class="inputbox">
      <label for="permanent address">Parmanent Address</label>
      <input type = "text" id = "permanent_address" name="permanent_address" required>
    </div>
    <div class="inputbox">
      <label for="phone_number">Phone Number</label>
      <input type = "text" id = "phone_number" name="phone_number" required>
    </div>
    <div class="inputbox">
      <label for="email">Email</label>
      <input type = "email" id = "email" name="email" disabled required>
    </div>
    <div class="inputbox">
      <label for="country">Country</label>
      <input type = "text" id = "country" name="country" required>
    </div>
    <div class="inputbox">
      <label for="education_qualification">Education Qualification</label>
      <input type = "text" id = "education_qualification" name="education_qualification" required>
    </div>
    <div class="inputbox">
      <label for="about">About</label>
      <input type = "text" id = "about" name="about" required>
    </div>
    <div class="inputbox">
      <label for="gender">Gender</label>
      <input type = "text" id = "gender" name="gender" required>
    </div>
    <div class="inputbox">
      <label for="profile_picture">Post a picture</label>
      <input type = "file" id = "profile_picture" name="profile_picture" required>
    </div>
    <input type="submit" name="submit" value="Insert" class='btn'>
    <a href="show_pro.php">
      Click Me 
    </a>
    </form>


    
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>