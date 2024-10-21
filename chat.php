<?php


session_start();
$conn = mysqli_connect("localhost","ridita","1234","shop_db");
if(isset($_SESSION['user_id']))
{
    $idl = $_SESSION['user_id'];
}
$user = mysqli_query($conn,"select *from user where id = '$idl'") or die("FSILED TO QUERY");
$use = mysqli_fetch_assoc($user);



?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edgw" />
<meta name="viewport" content="width=sdevice-width, initial-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resourses/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<title>WELCOME TO CHAT</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
               <p>Hi <?php echo $use['name']; ?></p> 
               <input type ="text" id = "fromUser" value = <?php echo $use['id']?> hidden />
               <P>Send Message to: </p>
            

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</body>
</html>