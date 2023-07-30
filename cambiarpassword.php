<?php 
    include('admin/includes/connection.php');
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1= password_hash("$p1" , PASSWORD_DEFAULT);
       
        $sqlconnection->query("UPDATE users SET password='$p1' WHERE email='$email' ")or die($sqlconnection->error);
        header("Location: index.php?message=ok");
    }else{
        echo "no coinciden";
    }
?>