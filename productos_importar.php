<?php
include('conexion.php');
require_once('excel/php-excel-reader/excel_reader2.php');
require_once('excel/SpreadsheetReader.php');
if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){
 
        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $codigo = "";
                if(isset($Row[0])) {
                    $codigo = mysqli_real_escape_string($cnx,$Row[0]);
                }
                
                $fabricante = "";
                if(isset($Row[1])) {
                    $fabricante = mysqli_real_escape_string($cnx,$Row[1]);
                }
 
                $descripcion = "";
                if(isset($Row[2])) {
                    $descripcion = mysqli_real_escape_string($cnx,$Row[2]);
                }
 
                $precio_compra = "";
                if(isset($Row[3])) {
                    $precio_compra = mysqli_real_escape_string($cnx,$Row[3]);
                }
                $precio_venta = "";
                if(isset($Row[4])) {
                    $precio_venta = mysqli_real_escape_string($cnx,$Row[4]);
                }
                $existencia = "";
                if(isset($Row[5])) {
                    $existencia = mysqli_real_escape_string($cnx,$Row[5]);
                }
                $creado = date('Y-m-d H:i:s');
                if (!empty($codigo) || !empty($fabricante) || !empty($descripcion) || !empty($precio_compra) || !empty($precio_venta) || !empty($existencia)) {
                    $query = "INSERT INTO productos(codigo,fabricante,descripcion,precio_compra,precio_venta,existencia,creado) values('".$codigo."','".$fabricante."','".$descripcion."','".$precio_compra."','".$precio_venta."','".$existencia."','".$creado."')";
                    $resultados = mysqli_query($cnx, $query);
                
                    if (!empty($resultados)) {
                        $type = "success";
                        //$message = "Excel importado correctamente";
                        header("Location: productos.php?ok=guardado");
                    } else {
                        $type = "error";
                        //$message = "Hubo un problema al importar registros";
                        header("Location: productos.php?error=no_guardado");
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
?>