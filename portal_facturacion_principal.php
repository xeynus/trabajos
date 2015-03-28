<?php
        session_destroy();
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<title>Portal de facturación ABC</title>

<?php include 'head.php';?>

<script>
	document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Este campo es obligatorio");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }

    function check(input) {  
    if(input.validity.typeMismatch){  
        input.setCustomValidity("Dude '" + input.value + "' is not a valid email. Enter something nice!!");  
    }  
    else {  
        input.setCustomValidity("");  
    }                 
}
})

</script>
</head>
<body>

<?php include 'header.php';?>

<!--*********************
CONTENIDO
*********************-->
<!-- Título -->
<div class="titulo-principal">
	<h1>Bienvenido al <br><strong>Sistema de Facturación Electrónica de ABC</strong></h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

<!--********** Formulario **********-->
			<section id="formulario">

<!-- Encabezado -->
				<h2 class="col-md-8 col-md-offset-2">Ingresa el <strong>RFC</strong> y la <strong>clave</strong> del boleto</h2>

				<div class="clearfix"></div>

<!-- Campos -->
				<form action="verificacionBoletos.php" method="post">
					<label class="col-md-3 col-md-offset-1"><span>*</span>Ingrese RFC</label>
					<input class="col-md-6" type="text" pattern="^[A-ZÑ]{3,4}[ \-]?[0-9]{2}((0{1}[1-9]{1})|(1{1}[0-2]{1}))((0{1}[1-9]{1})|([1-2]{1}[0-9]{1})|(3{1}[0-1]{1}))[ \-]?[A-Z0-9]{3}" name="rfc" maxlength="13" required placeholder="Ingresa tu RFC"/>
					<br class="clearfix">

					<label class="col-md-3 col-md-offset-1"><span>*</span>Ingrese boleto</label>
					<input class="col-md-6" type="text" name="ticket1" maxlength="8"  required placeholder="Empieza llenando este campo">
					<br class="clearfix">

					<label class="col-md-3 col-md-offset-1">Ingrese boleto</label>
					<input class="col-md-6" type="text" name="ticket2" maxlength="8" placeholder="Favor de no saltarse ningún campo" >
					<br class="clearfix">

					<label class="col-md-3 col-md-offset-1">Ingrese boleto</label>
					<input class="col-md-6" type="text" name="ticket3" maxlength="8" placeholder="Favor de no saltarse ningún campo" >
					<br class="clearfix">

					<label class="col-md-3 col-md-offset-1">Ingrese boleto</label>
					<input class="col-md-6" type="text" name="ticket4" maxlength="8" placeholder="Favor de no saltarse ningún campo" >
					<br class="clearfix">

					<label class="col-md-3 col-md-offset-1">Ingrese boleto</label>
					<input class="col-md-6" type="text" name="ticket5" maxlength="8" placeholder="Favor de no saltarse ningún campo" >

					<br class="clearfix">

<!-- Botón -->
					<p class="aviso">*Estos campos son obligatorios</p>
					<input class="boton azul siguiente" type="submit" value="Enviar para facturar">
				</form>

<!-- Aviso -->
			<br>
			<p>A partir de la compra de su boleto, cuenta con 10 días naturales para obtener su factura electrónica en el portal. Una vez concluido el plazo ya no será posible obtenerla. Verifique que sus datos sean correctos, una vez emitida la factura  no se puede cancelar.</p>
		</section>
	</div>
</div>

</div>
</body>
</html>
