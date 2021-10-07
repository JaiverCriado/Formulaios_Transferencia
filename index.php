<!DOCTYPE html>
<html>

    <head>
        <!-- Jaiver Orlando Criado Arias-->
        <!-- Desarrollo en PHP-->
        <!-- Taller “Uso de formularios para transferencia”-->
        <title>Evidencia 4</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
        </style>
    </head>
<?php

//Se hace un require para las funciones del escenario.php y accion.php

require("escenario.php");
require("accion.php");

//El usuario al enviar la información se ejecuta el condicional IF

if(isset($_REQUEST["Enviar"])){
                
                //Se obtiene la información enviada del formulario
                
                $fila = $_POST['fila'];
                $puesto= $_POST['puesto'];
                $accion= $_POST['accion'];
                $StringEscenario=$_POST['ListEscenario'];
                
                //El String generado en el input oculto se convierte en un Array
                
                $count=0;
                for($i=0;$i<5;$i++){
                    for($j=0;$j<5;$j++){
                        $count=5*$i+$j;
                        //Cada elemento obtenido del array extrayendo dicho elemento del String
                        $ListEscenario[$i][$j]=substr($StringEscenario,$count,1);
                    }
                    $count=0;
                }
        //Retorna el array con la información modificada por el usuario
        $ListEscenario=Accion($fila,$puesto,$accion,$ListEscenario);
        //Se ejecuta la funcion para mostrar el escenario, dado el array
        Escenario($ListEscenario);
}
//Se ejecuta el else if cuando el usario borra la informacion del formulario y cuando se carga la página
else if(isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])){
    $ListEscenario=array(array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),
    array("L","L","L","L","L"),array("L","L","L","L","L"));
    Escenario($ListEscenario);
}
?>
<!-- Acá emppieza la ejecución del HTML-->    
<body>
    <table style="margin:auto;">
        <form method="post">
            <!-- Se separa el array $ListEscenario en un String y de oculta-->
            <input type="text" name="ListEscenario" value="
            <?php foreach ($ListEscenario as $fila) {foreach ($fila as $puesto){echo $puesto;}}?>
            " style="display:none" />
            <!-- Genermos los inputs que obtienen la información que introduce el usuario-->
            <tr>
                <td>Fila: </td>
                <td>
                    <!-- Se muesta la lista con las opciones posibles para la fila-->
                    <select name="fila">
                        <option size="4">1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Puesto: </td>
                <td>
                    <!-- Se muesta la lista con las opciones posibles para la puesto-->
                    <select name="puesto">
                        <option size="4">1</option>
                        <option size="4">2</option>
                        <option size="4">3</option>
                        <option size="4">4</option>
                        <option size="4">5</option>
                    </select>
                </td>
            </tr>
            <!-- Se muestra el radio button con las acciones posibles-->
            <tr>
                <td>Reservar: </td>
                <td>
                    <input type="radio" name="accion" value="R" />
                </td>
            </tr>
            <tr>
                <td>Comprar: </td>
                <td>
                    <input type="radio" name="accion" value="V" />
                </td>
            </tr>
            <tr>
                <td>Liberar: </td>
                <td>
                    <input type="radio" name="accion" value="L" checked="checked" />
                </td>
            </tr>
            <tr>
                <!-- Se muestran los botones con las acciones de enviar la información o borrar toda la 
                informacion ingresada-->
                <td>
                    <input type="submit" value="Enviar" name="Enviar" />
                </td>
                <td>
                    <input type="submit" value="Borrar" name="Reset" />
                </td>
            </tr>
        </form>
    </table>
</body>