<?php include_once 'conexaoBanco.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Crud | Sweetalert2 | Bootstrap4</title>
</head>
<body>
    
    <div class="container-fluid bg-primary py-2 text-center">
        <h2>CRUD BOOTSTRAP 4</h2>
    </div>


    <div class="container mt-5">
        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#newUserModal">ADD USER</button>
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
                                    <input type="text" class="form-control" name="phone" id="phone">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-success">ADD NEW USER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script>
    
</script>
</body>
</html>