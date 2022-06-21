<?php

include_once 'conexaoBanco.php'; 


$first_name = $row['first_name'];
echo $first_name;
$last_name = $row['last_name'];
$gender = $row['gender'];
$phone = $row['phone'];



//$sql = "UPDATE user_info SET `first_name` = '$first_name', `last_name` = '$last_name', `gender` = '$gender', `phone` = '$phone' WHERE `id` = '$id'";
//$query = $con->query($sql) or die($con->error);









?>