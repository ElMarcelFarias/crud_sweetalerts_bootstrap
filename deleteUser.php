<?php 

include_once 'conexaoBanco.php';


if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM user_info WHERE id = '$id'";
    $query = $con->query($sql) or die($con->error);

}




?>