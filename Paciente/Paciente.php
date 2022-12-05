<?php

include_once('../config/config.php');
include ('../config/database.php');

class Paciente{
    public $conexion;

    function __construct(){
        $db = new Database();
        $this->conexion =$db->connectToDatabase();
    }

    function save ($params){
        $nombres= $params['nombres'];
        $apellidos= $params['apellidos'];
        $email= $params['email'];
        $celular= $params['celular'];
        $enfermedades= $params['enfermedades'];
        $duracionSecion= $params['duracionSecion'];
        $fecha= $params['fecha'];
        $imagen= $params['imagen'];
        

    $insert ="INSERT INTO Pacientes VALUES (NULL, '$nombres','$apellidos','$email','$celular','$enfermedades','$duracionSecion','$imagen','$fecha')";
    return mysqli_query($this->conexion,$insert);   
    }
    function getAll(){
        $sql= "SELECT * FROM Pacientes ORDER BY fecha ASC";
        return mysqli_query ($this->conexion, $sql);
    }

    function getOne($id){
        $sql= "SELECT * FROM Pacientes WHERE id=$id";
        return mysqli_query($this->conexion, $sql);
        
    }




function update($params){
    $nombres= $params['nombres'];
        $apellidos= $params['apellidos'];
        $Correo= $params['Correo'];
        $celular= $params['celular'];
        $enfermedades= $params['enfermedades'];
        $duracionSecion= $params['duracionSecion'];
        $fecha= $params['fecha'];
        $imagen= $params['imagen'];
        $id = $params ['id'];

        $update = " UPDATE Pacientes SET nombre='$nombres', apellidos='$apellidos', Correo='$Correo', celular='$celular', enfermedades='$enfermedades', duracionSecion='$duracionSecion', fecha='$fecha', imagen='$imagen'WHERE id = $id ";
     
        return mysqli_query($this->conexion, $update);

}
    
       function delete($id){
        $delete = " DELETE FROM Pacientes WHERE id = $id ";
        return mysqli_query($this->conexion, $delete);
       }
    }
?>