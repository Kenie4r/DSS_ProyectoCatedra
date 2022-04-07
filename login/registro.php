<?php
require_once('../vista/menu_vista.php');
$menu = new HTMLMENU(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
<body class="bg-info">
    <div class="div-menu">
        <?php $menu->createMenu(); ?>
    </div>
    <div class="container" style="margin-top:10%;">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-xs-1-12 col-md-6 col-lg-4 bg-white rounded p-4 shadow">
                <div class="row">
               
                </div>
                <form action="" method="post">
                    <div class="mb-4" >
                     <label for="txtNombre" class="form-label">Ingrese su nombre</label>
                    <input type="text"  class="form-control" name="txtNombre" id="txtNombre">
                    </div>
                   
                    <div class="mb-4" >
                     <label for="txtApellido" class="form-label">Ingrese su Apellido</label>
                    <input type="text"  class="form-control" name="txtApellido" id="txtApellido">
                    </div>
                    <div class="mb-4" >
                     <label for="txtUsuario" class="form-label">Ingrese su nombre de usuario</label>
                    <input type="text"  class="form-control" name="txtUsuario" id="txtUsuario">
                    </div>
                    <div class="mb-4" >
                    <label for="cmbGenero" class="form-label">Ingrese su Genero</label>
                    <select class="form-control" name="cmbGenero" id="cmbGenero">
                            <option value="M" >Masculino</option>
                            <option value="F" >Femenino</option>
                          </select>
                    </div>

                    <div class="mb-4" >
                    <label for="txtContra" class="form-label">Ingrese su Contraseña</label>
                        <input type="password" class="form-control" name="txtContra" id="txtContra">
                    </div>
                    <div class="mb-4" >
                    <label for="txtContraCon" class="form-label">Confirme su Contraseña</label>
                        <input type="password" class="form-control" name="txtContraCon" id="txtContraCon">
                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-success w-100">Registrarse</button>
                    <?php
                        include '../controlador/queryRegister.php';
                        
                        if (isset($_POST['submit'])) {
                            $query=new QueryRegister;
                            $nombre=$_POST['txtNombre'];
                            $user=$_POST['txtUsuario'];
                            $pass=$_POST['txtContraCon'];
                            $genero=$_POST['cmbGenero'];
                            $apellido=$_POST['txtApellido'];

                           $query->InsertUser($user,$pass,$nombre,$apellido,$genero);
                           header("location:login.php");
                        }

                       
                    ?>
                </form>
                
                
            </div>
            
        </div>
    </div>
    
</body>
    
</body>
</html>