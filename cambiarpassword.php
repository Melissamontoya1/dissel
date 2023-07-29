<?php 
    include('includes/connection.php');
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1= password_hash("$p1" , PASSWORD_DEFAULT);
       
        $conn->query("update users set password='$p1' where email='$email' ")or die($conn->error);
        header("Location: index.php?message=ok");
    }else{
        echo "no coinciden";
    }
?>