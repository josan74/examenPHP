<?php
require_once "consultas.php";
session_start();
$fotos = new consultas();
$a_users = $fotos->ejecutar("Select * from tabla");

if (isset($_REQUEST['nombre'])) {
    print_r($_REQUEST);
}
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
        <header id="cabecera">
            &nbsp;&nbsp;&nbsp;DESARROLLO EN ENTORNO SERVIDOR
        </header>
        <section id="seccion">
            <div id="actualizar">
                <div id="foto">
                    <img src="fotos/<?php //echo $row['dni']; ?>"/>
                </div>

                <div id="formulario"> 
                    Nombre: <input type="text" name="nombre" id="nombre" value="<?php //echo $row['nombre']; ?>"/> <br />
                    Apellidos: <input type="text" name="apellidos" id="apellidos" value="<?php //echo $row['apellidos']; ?>" /><br />
                    Dirección: <input type="text" name="direccion" id="direccion" value="<?php //echo $row['direccion']; ?>" /><br />
                    Localidad: <input type="text" name="localidad" id="localidad" value="<?php //echo $row['localidad']; ?>"/><br />
                    <input type="submit" id="submit" value="Actualizar" />


                </div>
            </div>


            <div id="separacion"></div>
            <div id="listar">
                <table class='separa'>
                    <form id="formula" method="post" name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php foreach ($a_users as $row) { ?> 

                            <tr>
                                <td><?php echo $row['dni']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['apellidos']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['localidad']; ?></td>
                                <td><input type="submit" id="submit" value="Cambiar" />  </td>
                            </tr>
                    <?php } ?>
                    </form>
                </table>
            </div>
        </section>
        <footer id="pie">
        </footer>
    </body>
</html>
