<?php
session_start();
include ("includes/autenticado.php");
?>
<HTML>
    <HEAD>
        <title>Matrícula de asignaturas</title>
        <meta charset="UTF-8">
    </HEAD>
    <body>
    <CENTER>
        <?php
        if (isset($_GET['Envio'])) {
            if (isset($_GET['IWVG'])) {
                $_SESSION['permisos'][0] = 'S';
            }
            if (isset($_GET['APAW'])) {
                $_SESSION['permisos'][1] = 'S';
            }
            if (isset($_GET['FEM'])) {
                $_SESSION['permisos'][2] = 'S';
            }
            if (isset($_GET['FENW'])) {
                $_SESSION['permisos'][3] = 'S';
            }
            if (isset($_GET['PHP'])) {
                $_SESSION['permisos'][4] = 'S';
            }
            if (isset($_GET['SAW'])) {
                $_SESSION['permisos'][5] = 'S';
            }
            include ("includes/abrirbd.php");
            $permisos = implode($_SESSION['permisos']);
            $sql = "UPDATE usuarios SET permisos = '{$permisos}' WHERE user ='{$_SESSION['user']}'";
            $resultado = mysqli_query($link, $sql);

            echo ("<h3><b>Matrícula realizada correctamente:</h3></b>");
            if (isset($_GET['IWVG'])) {
                echo ("Ingeniería Web: Visión General <br>");
            }
            if (isset($_GET['APAW'])) {
                echo ("Arquitectura y Patrones para Aplicaciones Web <br>");
            }
            if (isset($_GET['FEM'])) {
                echo ("Front-end para Móviles <br>");
            }
            if (isset($_GET['FENW'])) {
                echo ("Front-end para Navegadores Web <br>");
            }
            if (isset($_GET['PHP'])) {
                echo ("Back-end con Tecnologías de Libre Distribución <br>");
            }
            if (isset($_GET['SAW'])) {
                echo ("Seguridad en Aplicaciones Web <br>");
            }
            ?>
            <br><br><A href= 'MasterWeb.php'> Volver a inicio </A>

            <?php
        } else {
            ?>
            <img src="logo.png" width= 120 height= 60>
            <br><br><br>

            <H2> Selecciona las asignaturas en que quieres matricularte </H2><BR><BR>
            <FORM name="matricula" method=get action= '<?php "{$_SERVER['PHP_SELF']}" ?>'>
                <TABLE>
                    <TR>
                        <TD align=right><INPUT type="checkbox" name="IWVG" value="Si"></TD>
                        <TD align=left> Ingeniería Web: Visión General (IWVG)</TD>
                    </TR>
                    <TR>
                        <TD align=right><INPUT type="checkbox" name="APAW" value="Si"></TD>
                        <TD align=left> Arquitectura y Patrones para Aplicaciones Web (APAW)</TD>
                    </TR>
                    <TR>
                        <TD align=right><INPUT type="checkbox" name="FEM" value="Si"></TD>
                        <TD align=left> Front-end para Móviles (FEM)</TD>
                    </TR>
                    <TR>
                        <TD align=right><INPUT type="checkbox" name="FENW" value="Si"></TD>
                        <TD align=left> Front-end para Navegadores Web (FENW)</TD>
                    </TR><TR>
                        <TD align=right><INPUT type="checkbox" name="PHP" value="Si"></TD>
                        <TD align=left> Back-end con Tecnologías de Libre Distribución (PHP)</TD>
                    </TR><TR>
                        <TD align=right><INPUT type="checkbox" name="SAW" value="Si"></TD>
                        <TD align=left> Seguridad en Aplicaciones Web (SAW)</TD>
                    </TR>
                </TABLE><BR>
                <INPUT type="submit" name="Envio" value="Enviar">
            </FORM>
        </CENTER>
        <?php
    }
    ?>
</BODY>
</HTML>

