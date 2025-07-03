<?php 
    include 'conexion.php';
    session_start();
    if(!isset($_SESSION['Usuario'])){
        header("Location: conteo_inventario.php");
    }
    
    date_default_timezone_set('America/Mexico_city');
    $date = strtotime(date("d-m-Y"));
    $first = strtotime('last Sunday -2 days');
    $last = strtotime('next Saturday -2 days');
    $lun = date('d-m-Y', $first);
    $vie = date('d-m-Y', $last);

    $first1 = strtotime('last Sunday -2 days');
    $last1 = strtotime('next Saturday -1 days');
    $lun1 = date('Y-m-d', $first1);
    $vie1 = date('Y-m-d', $last1);

    $usuario = $cnx->query("SELECT * FROM usuarios WHERE usuario = '$_SESSION[Usuario]'");
    $verusuario = mysqli_fetch_array($usuario);
    
	$actividades = "SELECT * FROM productos ORDER BY idProducto ASC";
    $veractividades = $cnx->query($actividades);
    
    


if(isset($_POST)){
    define ('K_PATH_IMAGES', dirname(__FILE__).'/images');
	require_once('tcpdf/tcpdf.php');

    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetAuthor('JL SISTEMAS Y SOLUCIONES WEB');
    $pdf->SetTitle('Reporte de Inventario');

	$pdf->setPrintHeader(false); 
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';

    $content .= '
    <div align="left"><h1>JL SISTEMAS Y SOLUCIONES WEB</h1></div>
    <div align="right">
        <label style="font-size:10px;"><b>Reporte de Conteo de Inventario</b></label> <br/>
        <label> Fecha: '.date('d-m-Y').'</label>
    </div>
    <div class="table-responsive">
            <table border="1" cellpadding="6">
                    <thead>
                    <tr style="background-color:#069; text-align:center; color:#fff; font-size:12px;">
                        <th width="10%">Código</th>
                        <th width="30%">Descripción</th>
                        <th width="10%">Existencia</th>
                        <th width="15%">Conteo #1</th>
                        <th width="15%">Conteo #2</th>
                        <th width="15%">Conteo #3</th>
                    </tr>
                    </thead>';

                    while ($ver=$veractividades->fetch_assoc()) { 
                            if($user['activo']=='A'){  $color= '#f5f5f5'; }else{ $color= '#fbb2b2'; }
                    $content .= '
                    <tr style="font-size:8px;">
                        <td width="10%">'.$ver['codigo'].'</td>
                        <td width="30%">'.$ver['descripcion'].'</td>
                        <td width="10%" style="text-align:center">'.$ver['existencia'].'</td>
                        <td width="15%"></td>
                        <td width="15%"></td>
                        <td width="15%"></td>
                    </tr>';
	}

	$content .= '</table></div>';

	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>