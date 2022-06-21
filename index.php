<?php include_once 'conexaoBanco.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Crud | Sweetalert2 | Bootstrap4</title>
</head>
<body>
    
    <div class="container-fluid bg-info py-2 text-center">
        <h2>CRUD BOOTSTRAP 4</h2>
    </div>


    <div class="container mt-5">
        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#newUserModal"><span class="material-icons align-text-bottom">add</span></button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Gênero</th>
                    <th>Número</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 

            $sql = "SELECT * FROM user_info";
            $query = $con->query($sql) or die($con->error);
            while($row = $query->fetch_assoc()){
                ?>

                <tr>
                    <td><?= $row['first_name']?></td>
                    <td><?= $row['last_name']?></td>
                    <td><?= $row['gender']?></td>
                    <td><?= $row['phone']?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm updateUser" id="<?=$row['id']?>"><span class="material-icons align-text-bottom">edit</span></button>
                        <button type="button" class="btn btn-danger btn-sm deleteUser" id="<?=$row['id']?>"><span class="material-icons align-text-bottom">close</span></button>
                    </td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="newUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="newUserForm" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Nome</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="last_name">Sobrenome</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="gender">Gênero</label>
                                    <select name="gender" id="gender" class="custom-select">
                                        <option value="Male">Masculino</option>
                                        <option value="Female">Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="phone">Número</label>
                                    <input type="number" class="form-control" name="phone" id="phone">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="material-icons align-text-bottom">close</span></button>
                        <button type="submit" class="btn btn-success"><span class="material-icons align-text-bottom">done</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal_edit"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>

<script>

$(document).on('click', '.updateUser', function(){
    var id = $(this).attr('id');

    $("#modal_edit").html('');
    $.ajax({
        url: 'viewUser.php',
        type: 'POST',
        cache: false,
        data: {id:id},
        success:function(data){
            $("#modal_edit").html(data);
            $("#updateUserModal").modal('show');
        }
    })
    

})













//deletar usuário
$(document).on('click', '.deleteUser', function(){
    var id = $(this).attr('id');

    Swal.fire({
        title: 'Realmente quer fazer isto?',
        text: "O usuário será deletado permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'deleteUser.php',
                type: 'POST',
                data: {id:id},
                success:function(data){
                    Swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: 'Usuário deletado com sucesso!'
                    }).then(()=>{
                        window.location.reload();
                    })
                }

            })
        }
        })
})




// Adicionar um campo, via AJAX SweetAlerts2
    $(document).ready(function(){
        $("#newUserForm").submit(function(e){
            e.preventDefault();

            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var phone = $("#phone").val();

            if(first_name == '' || last_name == '' || phone == '') {
                Swal.fire(
                    'Erro',
                    'Por favor, preencha os campos corretamente!',
                    'error'
                    )
            } else {
                $.ajax({
                    url: 'newUser.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    cache: false,
                    success:function(data){
                        $('#newUserModal').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Usuário adicionado com sucesso!',
                            icon: 'success'
                        }).then(()=>{
                            window.location.reload();
                        })
                        
                    }
                })
            }
        })
    })
    
</script>
</body>
</html>