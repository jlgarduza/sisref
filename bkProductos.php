<?php
	$nombre = 'BDProductos_'.date('d-m-Y').'.sql';
	// $directorio = 'C:\\bases';
	$directorio = '';

	$dir = $directorio.'\\'.$nombre;

	$user = 'jlsistem';
	$password = '4Yzn05gB0a';

	$comando = "C:\\xampp\mysql\bin\mysqldump.exe --opt --user=$user --password=$password jlsistem_sisref > $dir";
	system($comando, $error);

	header("Location: configuracion_inventario.php?si=ok");
?>