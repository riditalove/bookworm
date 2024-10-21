<?php
 
 $cok = mysqli_connect('localhost','ridita','1234','shop_db');

 if(isset($_POST['register_delete_btn']))
 {
    $delete_id = $_POST['delete_id'];
    $ro = "delete from user_details where user_id = '$delete_id' ";
    $qu_reg_run = mysqli_query($cok,$ro);

    if($qu_reg_run)
    {
        header("location:admin_page.php");
    }
    else{
        header("location:admin_page.php");
    }
 }

?>