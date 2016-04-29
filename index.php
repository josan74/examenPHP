<?php
require_once "consultas.php";
session_start();
$fotos = new consultas();
$a_users = $fotos->ejecutar("Select * from tabla");
$a_user = [[
    "nombre" => "",
    "apellidos" => "",
    "direccion" => "",
    "localidad" => "",   
]];


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>exm2015</title>
        <link rel="stylesheet" href="css/css.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php 
        if (isset($_REQUEST['dni'])) {   
            // Realizamos una consulta con el dni pulsado
            $dni=$_POST['dni'];          
            $a_user = $fotos->ejecutar("Select * from tabla where dni='$dni'");
            
            //print_r($_REQUEST);
        }
        ?>
        <header id="cabecera">
            &nbsp;&nbsp;&nbsp;DESARROLLO EN ENTORNO SERVIDOR
        </header>
        <?php
        
        if(isset($_POST['submit'])){
            
        }

?>
        <section id="seccion">
            <div id="actualizar">
                <div id="foto">
                    <img src="fotos/<?php //echo $row['dni']; ?>"/>
                </div>
                <?php 
                // foreach ($a_user as $row) {          
               
                
                ?>
                <div id="formulario">                   
                    Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $a_user[0]['nombre']; ?>"/> <br />
                    Apellidos: <input type="text" name="apellidos" id="apellidos" value="<?php echo $a_user[0]['apellidos']; ?>" /><br />
                    Dirección: <input type="text" name="direccion" id="direccion" value="<?php echo $a_user[0]['direccion']; ?>" /><br />
                    Localidad: <input type="text" name="localidad" id="localidad" value="<?php echo $a_user[0]['localidad']; ?>"/><br />
                    <input type="submit" id="submit" value="Actualizar" />
             
                </div>
            </div>


            <div id="separacion"></div>
            <div id="listar">
                <table class='separa'>
                    <?php 
                        $i=0;
                        foreach ($a_users as $row) { ?> 
                           <!--Creamos un formulario por cada registro-->
                           <form id="formula" method="post" name="form<?php echo $i; ?>" action="index.php">

                            <tr>
                                <td><?php echo $row['dni']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['apellidos']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['localidad']; ?></td>
                                <!--guardamos el valor del dni que vamos a pulsar-->
                                <input type="hidden" name="dni" id="<?php echo $i; ?>" value="<?php echo $row['dni']; ?>" />                            
                                <td><input type="submit" id="<?php echo $i; ?>" value="Cambiar" />  </td>
                            </tr>
                           </form>
                    <?php 
                    $i++;
                        } ?>
                  
                </table>
            </div>
        </section>
        <footer id="pie">
        </footer>
    </body>
</html>
