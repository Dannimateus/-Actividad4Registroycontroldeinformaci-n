<?php
include ('../config/config.php');
include ('Paciente.php');

    if( isset($_POST) && !empty($_POST) ){
        $p= new Paciente();

        if($_FILES['imagen']['name'] !==''){
          $_POST['imagen'] = saveImage($_FILES);
        }

        $save = $p->save($_POST);
        if ($save){
            $mensaje ='<div class="alert alert-success"> Sesión registrada </div>';
        }else{
            $mensaje ='<div class="alert alert-danger"> Error al registrar! </div>';
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   <?php include('../menu.php') ?> 
<div class="container">

<?php
    if(isset($mensaje)){
        echo $mensaje;
    }
?>
    <h2 class="text-center mb-2"> Registrar sesión</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="row mb-2">
        <div class="col"> 
            <input type="text" name="nombres" id="nombres" placeholder="Nombres del paciente" class="form-control" />
        </div>
        <div class="col"> 
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" class="form-control" />
        </div>   
    </div>
    <div class="row mb-2">
        <div class="col"> 
            <input type="text" name="email" id="email" placeholder="Email del paciente" class="form-control" />
        </div>
        <div class="col"> 
            <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control" />
        </div>   
    </div>
    <div class="row mb-2">
    <div class="col">
            <textarea id="enfermedades" name="enfermedades" id="enfermedades" placeholder="Email del paciente" class="form-control"> </textarea>
        </div>
        <div class="col"> 
            <input type="text" name="duracionSecion" id="duracionSecion" placeholder="Duración de la sesión" class="form-control" />
        </div>   
    </div>
    <div class="row mb-2">
    <div class="col">
            <input type="datetime-local" name="fecha" id="fecha" class="form-control"/>
        </div>
        <div class="col"> 
            <input type="file" name="imagen" id="imagen" class="form-control" />
        </div>   
    </div>
    <button class ="btn btn-success"> Registrar</button>

</form>

</div>    
</body>
</html>