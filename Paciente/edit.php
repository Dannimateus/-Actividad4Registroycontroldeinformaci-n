<?php
include ('../config/config.php');
include ('Paciente.php');

$p = new Paciente();
$dp= mysqli_fetch_object($p->getOne($_GET['id']));

$date = new dateTime($dp->fecha);

if (isset($_POST) && !empty($_POST)){
  $_POST['imagen'] = $dp->imagen;
  if ($_FILES['imagen']['name'] !=='' ){
    $_POST['imagen'] = saveImage($_FILES);
  }
  $update =$p->update($_POST);
  if ($update){
    $mensaje = '<div class="alert alert-success" role="alert" > Sesion modificada con exito. ></div>';
  }else{
    $mensaje = '<div class="alert alert-danger" role="alert" > Error! ></div>';

  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Modificar sesión</title>
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
    <h2 class="text-center mb-2"> Modificar sesión </h2>
<form method="POST" enctype="multipart/form-data">
    <div class="row mb-2">
        <div class="col"> 
            <input type="text" name="nombres" id="nombres" placeholder="Nombres del paciente" class="form-control" value="<?= $dp->Nombre ?>" />
        </div>
        <div class="col"> 
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" class="form-control" value="<?=$dp->Apellidos?>"/>
            <input type="hidden" name="id" value="<?=$dp->id ?>" />
        </div>   
    </div>
    <div class="row mb-2">
        <div class="col"> 
            <input type="email" name="Correo" id="Correo" placeholder="Email del paciente" class="form-control" value="<?=$dp->Correo?>"/>
        </div>
        <div class="col"> 
            <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control" value="<?=$dp->Celular?>"/>
        </div>   
    </div>
    <div class="row mb-2">
    <div class="col">
            <textarea id="enfermedades" name="enfermedades" id="enfermedades" placeholder="Email del paciente" class="form-control" ><?=$dp->Enfermedades?> </textarea>
        </div>
        <div class="col"> 
            <input type="text" name="duracionSecion" id="duracionSecion" placeholder="Duración de la sesión" class="form-control" value="<?=$dp->duracionSecion?>"/>
        </div>   
    </div>
    <div class="row mb-2">
    <div class="col">
            <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="<?=$date->format('Y-m-d\TH:i') ?>" />
        </div>
        <div class="col"> 
            <input type="file" name="imagen" id="imagen" class="form-control" />
        </div>   
    </div>
    <button class ="btn btn-success"> Modificar </button>

</form>

</div>    
</body>
</html>