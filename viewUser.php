<?php

include_once 'conexaoBanco.php';

if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM user_info WHERE id = '$id'";
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $gender = $row['gender'];
    $phone = $row['phone'];
}

?>


<div class="modal fade" id="updateUserModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-body">
            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="first_name">Nome</label>
                        <input type="text" class="form-control" name="edit_first_name" id="edit_first_name" value="<?=$first_name?>">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="last_name">Sobrenome</label>
                        <input type="text" class="form-control" name="edit_last_name" id="edit_last_name" value="<?=$last_name?>">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="gender">Gênero</label>
                        <select name="edit_gender" id="edit_gender" class="custom-select">
                            <option value="Male" <?= $gender == "Male"? "selected": ''?>>Masculino</option>
                            <option value="Female" <?= $gender == "Female"? "selected": ''?>>Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="phone">Número</label>
                        <input type="number" class="form-control" name="edit_phone" id="edit_phone" value="<?=$phone?>">
                    </div>
                </div>

            </div>
        </div>


        </div>
    </div>
</div>