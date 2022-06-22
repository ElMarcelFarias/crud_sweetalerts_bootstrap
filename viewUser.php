<?php

include_once 'conexaoBanco.php';

if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM user_info WHERE id = '$id'";
    $query = $con->query($sql) or die($con->error);
    $row = $query->fetch_assoc();

    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $gender = $row['gender'];
    $phone = $row['phone'];
}


?>


<div class="modal fade" id="updateUserModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <form id="editUserForm" method="POST">
            <div class="modal-body">
                <div class="row">

                    <input type="hidden" value="<?= $id?>" name="user_id" id="user_id">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="edit_first_name">Nome</label>
                            <input type="text" class="form-control" name="edit_first_name" id="edit_first_name" value="<?=$fname?>">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="edit_last_name">Sobrenome</label>
                            <input type="text" class="form-control" name="edit_last_name" id="edit_last_name" value="<?=$lname?>">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="edit_gender">Gênero</label>
                            <select name="edit_gender" id="edit_gender" class="custom-select">
                                <option value="Male" <?= $gender == "Male"? "selected": ''?>>Masculino</option>
                                <option value="Female" <?= $gender == "Female"? "selected": ''?>>Feminino</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="edit_phone">Número</label>
                            <input type="number" class="form-control" name="edit_phone" id="edit_phone" value="<?=$phone?>">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                <button type="submit" class="btn btn-success"><span class="material-icons align-text-bottom">done</span></button>
            </div>

            </div>
        </form>
    </div>
</div>


<script>
    
    $(document).ready(function(){
        $("#editUserForm").submit(function(e){
            e.preventDefault();

            var first_name = $("#edit_first_name").val();
            var last_name = $("#edit_last_name").val();
            var gender = $("#edit_gender").val();
            var phone = $("#edit_phone").val();

            alert(first_name);
            alert(last_name);
            alert(gender);
            alert(phone);

            if(first_name == '' || last_name == '' || phone == '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, preencha os campos corretamente!',
                    icon: 'warning'
                })
            } else {

                Swal.fire({
                    title: 'Realmente quer fazer isto?',
                    text: "Você irá editar um registro de usuário!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'editUser.php',
                            type: 'POST',
                            cache: false, 
                            data: $(this).serialize(),
                            success:function(){
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Usuário editado com sucesso!'
                                }).then(()=>{
                                    window.location.reload();
                                })
                            }
                        })
                    }
                })




                
            }

        })
    })
    
</script>