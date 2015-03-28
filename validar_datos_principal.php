<?php
        session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<title>Portal de facturación ABC</title>

<?php include 'head.php';?>

</head>
<body>

<?php include 'header.php';?>

<!--*********************
CONTENIDO
*********************-->
<!-- Título -->
<div class="titulo-principal">
	<h1>Comprobación de datos <strong>de facturación</strong></h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">

<!--********** Datos **********-->
			<section id="formulario" class="datos">

				<?php
				        $rfc=$_SESSION['rfc'];
				        $empresa=$_SESSION['emp'];

					require_once("conexion.php");
					require_once("consulta.php");
					
					while($row=ibase_fetch_object($result))
				        {
				            $comparacion=$row->CLAVE;
				        }
					if($comparacion==NULL)
				        {
				         echo"<script language='javascript'>window.location='registro.php'</script>";
						}

//IMPRESIÓN DE CONSULTA

// Encabezado				
					echo "<h2 class='col-md-6 col-md-offset-3'>¿Tus datos son correctos?</h2> <br class='clearfix'>";	

					$result2 = ibase_query($conectar, $sent) or die(ibase_errmsg());
					while($row2=ibase_fetch_object($result2)){
				        $clave = $row2->CLAVE;

// Columna izquierda
			        echo "<div class='col-md-6'><table><tbody>";

					echo "<tr><td>RFC:</td><td>". utf8_encode($row2->RFC). "</td></tr>";
					echo "<tr><td>Nombre:</td><td>".utf8_encode($row2->NOMBRE). "</td></tr>";
					echo "<tr><td>Calle:</td><td>". utf8_encode($row2->CALLE). "</td></tr>";
					echo "<tr><td>Colonia:</td><td>". utf8_encode($row2->COLONIA). "</td></tr>";
					echo "<tr><td>Población:</td><td>". utf8_encode($row2->POBLACION). "</td></tr>";
					echo "<tr><td>Municipio:</td><td>". utf8_encode($row2->MUNICIPIO). "</td></tr>";
					echo "</tbody></table></div>";

// Columna derecha
					echo "<div class='col-md-6'><table><tbody>";
					echo "<tr><td>Estado:</td><td>". utf8_encode($row2->ESTADO). "</td></tr>";
					echo "<tr><td>Código Postal:</td><td>". utf8_encode($row2->CODIGOPOSTAL). "</td></tr>";
					echo "<tr><td>Teléfono:</td><td>". utf8_encode($row2->TELEFONOS). "</td></tr>";
					echo "<tr><td>Pais:</td><td>". utf8_encode($row2->PAIS). "</td></tr>";
					echo "<tr><td>eMail:</td><td>". utf8_encode($row2->EMAIL). "</td></tr>";
				    $mail= $row2->EMAIL;
				    echo "</tbody></table></div>";
					
					ibase_free_result($result);
				 
				        $_SESSION['clave']=$clave;
				        $_SESSION['mail']=$mail;
				        $_SESSION['emp']=$empresa;
					}
				?>

<!-- Botones -->
				<br class="clearfix">
					<form class="botones-validacion" action="validar_botones.php" method="POST">

						<div class="col-sm-6 col-md-3 col-md-offset-3">
							<input class="boton azul aceptar"type="submit" name="aceptar" value="Aceptar y facturar">
						</div>

						<br>
						<div class="col-sm-6 col-md-3">
							<input class="boton magenta editar" type="submit" name="editar" value="Modificar datos">
						</div>

					</form>

			</section>
		</div>
	</div>
</div>

</body>
</html>
