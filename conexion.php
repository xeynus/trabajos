<?php
	
	
	//Inicia Conexión a base de datos 
	define('DATABASE_NAME', 'ABCPRUEBAS.IDB');
	function connection()
	{
		//Ingresa configuración usuario y base de datos
		//$usuario    = "WWW";
		//$pass       = "Wants59!looT";
		$usuario    = "SYSDBA";
		$pass       = "show3)deemed";
		$host		="192.168.1.193:/bases/ABC.IDB";
		$charset 	= "WIN1252";
		
		//Indicador Status Conexión
		$conexion = ibase_connect($host,$usuario, $pass,$charset) or die("No se ha podido conectar al servidor");
		error_log("Conexion a base de datos");

		//Verificación
		//echo "Conexion Satisfactoria- Se pueden inciar etapas de prueba ";
	
		return $conexion;
	}
	
	//crear la Conexión	y la transaccion
	$conectar = connection();
    //generar una nueva transaccion con los parametros correctos
	$transaction= ibase_trans($conectar, IBASE_WRITE|IBASE_COMMITTED|IBASE_WAIT);
	
	//Desconexión
	function cerrar()
		{
			//global $conexion;
			//ibase_close($conexion);
		}
?>
