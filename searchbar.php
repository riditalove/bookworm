<?php
     
    $conn = mysqli_connect("localhost","ridita","1234","shop_db");
    if(isset($_POST['submit']))
    {
         $str=mysqli_real_escape_string($conn,$_POST['str']);
        $sql = "select *from user_details where email like '%$str%' or full_name like '%$str%'";
        $res = mysqli_query($conn,$sql);
       if(mysqli_num_rows($res)>0)
       {
        echo "YES";
       }
       else{
        echo "NO";
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
   
   <title>Welcome to Timeline</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg narbar-dark bg-dark">  
    <img class = "d-inline-block align-top" src="logo.png" width = "50" height= "50">
    <div class="collapse navbar-collapse" id = "navbarNav">
    <ul class="navbar-nav">


        <li class= "nav-item active">
            <a href="edit_profile.php" class="nav-link">Edit Profle</a>
        </li>
        <li class= "nav-item active">
            <a href="available_books.php" class="nav-link">Available Books</a>
        </li>
        <li class= "nav-item active">
            <a href="#" class="nav-link">Notifications</a>
        </li>
        <li class= "nav-item active">
            <a href="#" class="nav-link">Messages</a>
        </li>
        <li class= "nav-item active">
            <a href="#" class="nav-link">Log Out</a>
        </li>
        <li class= "nav-item active">
            <a href="#" class="nav-link"></a>
        </li>
    </ul>
   </div>
<form method = "post">
    <input type = "textbox" name = "str" required/>
    <input type = "submit" name = "submit" value = "search"/>
</form>
</nav>
</body>
</html>
