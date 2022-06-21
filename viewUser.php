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

        <form id="editUserForm" method="POST" action="editUser.php">
            <div class="modal-body">
                <div class="row">

                    <input type="hidden" value="<?= $id?>" name="user_id" id="user_id">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="first_name">Nome</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?=$first_name?>">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="last_name">Sobrenome</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?=$last_name?>">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="gender">Gênero</label>
                            <select name="gender" id="gender" class="custom-select">
                                <option value="Male" <?= $gender == "Male"? "selected": ''?>>Masculino</option>
                                <option value="Female" <?= $gender == "Female"? "selected": ''?>>Feminino</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="phone">Número</label>
                            <input type="number" class="form-control" name="phone" id="phone" value="<?=$phone?>">
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
    /*
    $(document).ready(function(){
        $("#editUserForm").submit(function(e){
            e.preventDefault();

            var first_name = $("#edit_fname").val();
            var last_name = $("#edit_sname").val();
            var gender = $("#edit_gder").val();
            var phone = $("#edit_ph").val();

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
    */
</script>