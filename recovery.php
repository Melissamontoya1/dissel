<?php 
   include('admin/includes/connection.php');

    $email =$_POST['email'];
    $query = "SELECT * FROM users where email = '$email' ";
$result = $sqlconnection->query($query);
$row = $result->fetch_assoc();

if($result->num_rows > 0){
    
 $bytes = random_bytes(5);
    $token =bin2hex($bytes);
$codigo= rand(1000,9999);
    
    include "mail_reset.php";
    if($enviado){
        $sqlconnection->query(" insert into tokens(email, token, codigo) 
         values('$email','$token','$codigo') ") or die($sqlconnection->error);
         echo '<p>Verifica tu email para restablecer tu cuenta</p>';
    
   }
}else{
    header("Location:index.php?message=not_found");
}

?>