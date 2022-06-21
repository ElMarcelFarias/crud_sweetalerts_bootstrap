<?php

include_once 'conexaoBanco.php'; 
 
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];


$sql = "INSERT INTO user_info (`first_name`, `last_name`, `gender`, `phone`) VALUES ('$first_name', '$last_name', '$gender', '$phone')";
                
$query = $con->query($sql) or die ($con->error);


?>