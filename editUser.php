<?php

include_once 'conexaoBanco.php';

$id = $_POST['user_id'];
$fname = $_POST['edit_first_name'];
$lname = $_POST['edit_last_name'];
$gender = $_POST['edit_gender'];
$phone = $_POST['edit_phone'];

$sql = "UPDATE user_info SET `first_name` = '$fname', `last_name` = '$lname', `gender` = '$gender', `phone` = '$phone'";
$query = $con->query($sql) or die ($con->error);





?>