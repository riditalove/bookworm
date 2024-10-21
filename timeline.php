<?php
$conn = mysqli_connect("localhost","ridita","1234","shop_db");
if(isset($_POST['submit']))
{
     $str=mysqli_real_escape_string($conn,$_POST['str']);
    $sql = "select *from user_details where email like '%$str%' or full_name like '%$str%'";
    $res = mysqli_query($conn,$sql);
   if(mysqli_num_rows($res)>0)
   {
      while($row=mysqli_fetch_assoc($res))
      {
         $id_borrow = $row['user_id'];
      }
      
   }
   else{
    
   }
}

session_start();

if(isset($_SESSION['user_id']))
{
    $iu =$_SESSION['user_id'];

    $rol = "select *from user_details where user_id = '$iu'";
    $rt = mysqli_query($conn,$rol);

    while($ro = mysqli_fetch_assoc($rt)){
    $ipic = $ro['profile_picture'];
    $tnmae = $ro['full_name'];
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
    <link rel="stylesheet" href="time.css">
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
<form method = "post">
    <input type = "textbox" name = "str" required/>
    <input type = "submit" name = "submit" value = "search"/> 
    <a href="lend.php? varname=<?php echo $id_borrow ?>">Click here</a><br>


    
    
</form>
</nav>

<div class="container">
        <div class="left-panel">
            <ul>
                <li>
                    <span class="profile"></span>
                    <p><?php echo $tnmae?></p>
                </li>
                <li>
                    <i class="fa fa-user-friends"></i>
                    <p>Friends</p>
                </li>
                <li>
                    <i class="fa fa-play-circle"></i>
                    <p>Videos</p>
                </li>
                <li>
                    <i class="fa fa-flag"></i>
                    <p>Pages</p>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <p>Groups</p>
                </li>
                <li>
                    <i class="fa fa-bookmark"></i>
                    <p>Bookmark</p>
                </li>
                <li>
                    <i class="fab fa-facebook-messenger"></i>
                    <p>Inbox</p>
                </li>
                <li>
                    <i class="fas fa-calendar-week"></i>
                    <p>Events</p>
                </li>
                <li>
                    <i class="fa fa-bullhorn"></i>
                    <p>Ads</p>
                </li>
                <li>
                    <i class="fas fa-hands-helping"></i>
                    <p>Offers</p>
                </li>
                <li>
                    <i class="fas fa-briefcase"></i>
                    <p>Jobs</p>
                </li>
                <li>
                    <i class="fa fa-star"></i>
                    <p>Favourites</p>
                </li>
            </ul>

            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Advance</a>
                <a href="#">More</a>
            </div>
        </div>


        <div class="middle-panel">

            <div class="story-section">

                <div class="story create">
                    <div class="dp-image">
                        <img src="images/<?php echo $ipic?>" alt="Profile pic">
                    </div>
                    <span class="dp-container">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="name">Create Story</span>
                </div>

                <div class="story">
                    <img src="./image/ron.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./image/dp.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Ronald Weasley</span>
                </div>

                <div class="story">
                    <img src="./image/harry.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./image/lun.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Harry Potter</span>
                </div>

                <div class="story">
                    <img src="./image/mountains.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./image/boy.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Luna LoveGood</span>
                </div>

                <div class="story">
                    <img src="./image/herm.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./image/model.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Hermione Granger</span>
                </div>
            </div>




            <div class="post create">
                <div class="post-top">
                    <div class="dp">
                        <img src="images/<?php echo $imo ?>" alt="">
                    </div>
                    <input type="text" placeholder="What's on your mind?" />                    
                </div>
                
                <div class="post-bottom">
                    <div class="action">
                        <i class="fa fa-video"></i>
                        <span>Live video</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-image"></i>
                        <span>Photo/Video</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-smile"></i>
                        <span>Feeling/Activity</span>
                    </div>
                </div>
            </div>
    <?php  
    $op = "select *from posts order by id desc" ;
    $reso = mysqli_query($conn,$op);
    while($rp = mysqli_fetch_assoc($reso))
    {?>


    <div class="post">
                <div class="post-top">
                    <div class="dp">
                        <img src="./images/<?php 
                        
                        $rs = $rp['user_id'] ;
                        $xql = "select *from user_details where user_id = '$rs'";
                        $t = mysqli_query($conn,$xql);
                        $toe = mysqli_fetch_assoc($t);
                        echo $toe['profile_picture']
                        
                        ?>" alt="">
                    </div>
                    <div class="post-info">
                        <p class="name"><?php 
                        
                        $rs = $rp['user_id'] ;
                        $xql = "select *from user_details where user_id = '$rs'";
                        $t = mysqli_query($conn,$xql);
                        $toe = mysqli_fetch_assoc($t);
                        echo $toe['full_name']
                        
                        ?>
                        
                    </p>
                        <span class="time"><?php echo $rp['created_at'] ?></span>
                    </div>
                    <i class="fas fa-ellipsis-h"></i>
                </div>

                <div class="post-content">
                    <?php echo $rp['post_txt'] ?>
                    <img src="images/<?php echo $rp['post_img']?>" />
                </div>
                
                <div class="post-bottom">
                    <div class="action">
                        <i class="far fa-thumbs-up"></i>
                        <span>Like</span>
                    </div>
                    <div class="action">
                        <i class="far fa-comment"></i>
                        <span>Comment</span>
                    </div>
                    <div class="action">
                        <i class="far fa-share"></i>
                        <span>Share</span>
                    </div>
                </div>
            </div>


      <?php    
         
    }


?>


       

   <div class="post">
   <div class="post-top">
                    <div class="dp">
                        <img src="./image/model.jpg" alt="">
                    </div>
                    <div class="post-info">
                        <p class="name">Pragati Adhikari</p>
                        <span class="time">5 mins ago</span>
                    </div>
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="post-content">
                    Hey, everybody! My new shoes are here
                    <img src="./image/shoes.jpg" alt="Shoes">
                </div>
                <div class="post-bottom">
                    <div class="action">
                        <i class="far fa-thumbs-up"></i>
                        <span>Like</span>
                    </div>
                    <div class="action">
                        <i class="far fa-comment"></i>
                        <span>Comment</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-share"></i>
                        <span>Share</span>
                    </div>
                </div>
            </div> 
            
        </div>

            

            
        <div class="right-panel">
            <div class="pages-section">
                <h4>Your pages</h4>
                <a class='page' href="ind.php">
                    <div class="dp">
                        <img src="./image/logo.png" alt="">
                    </div>
                    <p class="name">Home</p>
                </a>

                <a class='page' href="#">
                    <div class="dp">
                        <img src="./image/dp.jpg" alt="">
                    </div>
                    <p class="name">Youtube Tutorials</p>
                </a>
            </div>

            <div class="friends-section">
                <h4>Friends</h4>
                <a class='friend' href="#">
                    <div class="dp">
                        <img src="./image/harry.jpg" alt="">
                    </div>
                    <p class="name">Harry Potter</p>
                </a>

                <a class='friend' href="#">
                    <div class="dp">
                        <img src="./image/herm.jpg" alt="">
                    </div>
                    <p class="name">Hermione Granger</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./image/ron.jpg" alt="">
                    </div>
                    <p class="name">Ronald Weasley</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./image/lun.jpg" alt="">
                    </div>
                    <p class="name">Luna LoveGood</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./image/boy.jpg" alt="">
                    </div>
                    <p class="name">Malfoy</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./image/dp.jpg" alt="">
                    </div>
                    <p class="name">Ramesh GC</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./image/model.jpg" alt="">
                    </div>
                    <p class="name">Sajita Gurung</p>
                </a>
                
            </div>
        </div>
</div>
</body>
</html>

