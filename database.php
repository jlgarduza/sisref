<?php
	/*-------------------------
	Autor: Jorge Garduza
	Web: jlsistemas.com.mx
	Mail: info@jlsistemas.com.mx
	---------------------------*/
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="sisowebc_sa";
		private $dbpass="S1st3m@s011108*#";
		private $dbname="sisowebc_sisref";

		// private $dbhost="db5012736443.hosting-data.io";
		// private $dbuser="dbu142938";
		// private $dbpass="S1st3m@s011108*#";
		// private $dbname="dbs10698956";
		
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
    	
    	//Clientes
        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
        }

		public function create($codCliente,$nombre,$direccion,$numInt,$numExt,$pais,$estado,$municipio,$colonia,$codigopostal,$telefono,$correo_electronico,$rfc,$razonsocial,$usocfdi){
            $sql = "INSERT INTO clientes (codCliente,nombre_cliente,calle_cliente,no_interior,no_exterior,pais_cliente,estado_cliente,municipio_cliente,colonia_cliente,codigo_postal,telefono,correo_electronico,rfc,razon_social,uso_cfdi) VALUES ('$codCliente','$nombre','$direccion','$numInt','$numExt','$pais','$estado','$municipio','$colonia','$codigopostal','$telefono','$correo_electronico','$rfc','$razonsocial','$usocfdi')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}
		
		public function read(){
			$sql = "SELECT * FROM clientes";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function single_recordc($id){
			$sql = "SELECT * FROM clientes where idCliente = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function updatec($nombre,$direccion,$numInt,$numExt,$pais,$estado,$municipio,$colonia,$codigopostal,$telefono,$correo_electronico,$rfc,$razonsocial,$usocfdi,$id){
			$sql = "UPDATE clientes SET nombre_cliente='$nombre', calle_cliente='$direccion', no_interior='$numInt', no_exterior='$numExt', pais_cliente='$pais', estado_cliente='$estado', municipio_cliente='$municipio', colonia_cliente='$colonia', codigo_postal='$codigopostal', telefono='$telefono', correo_electronico='$correo_electronico', rfc='$rfc', razon_social='$razonsocial', uso_cfdi='$usocfdi' WHERE idCliente = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function deletec($id){
			$sql = "DELETE FROM clientes WHERE idCliente = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//Productos
		public function readpro(){
			$sql = "SELECT * FROM productos ORDER BY descripcion ASC";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function createp($codigo,$fabricante,$descripcion,$precio_compra,$precio_venta,$existencia,$creacion){
            $sql = "INSERT INTO productos (codigo,fabricante,descripcion,precio_compra,precio_venta,entrada,salida,existencia,creado) VALUES ('$codigo','$fabricante','$descripcion','$precio_compra','$precio_venta','0','0','$existencia','$creacion')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function single_recordp($id){
			$sql = "SELECT * FROM productos WHERE idProducto = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function updatep($descripcion,$p1,$p2,$id){
			$sql = "UPDATE productos SET descripcion='$descripcion', precio_compra='$p1', precio_venta='$p2' WHERE idProducto = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function deletep($id){
			$sql = "DELETE FROM productos WHERE idProducto = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin productos

		//Categorías
		public function readcat(){
			$sql = "SELECT * FROM categoria";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function createc($descripcion){
            $sql = "INSERT INTO categoria (nomCategoria) VALUES ('$descripcion')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function single_record_cat($id){
			$sql = "SELECT * FROM categoria WHERE id = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function update_cat($nombre,$id){
			$sql = "UPDATE categoria SET nomCategoria = '$nombre' WHERE id = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function delete_cat($id){
			$sql = "DELETE FROM categoria WHERE id = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin categorias

		//Menú
		public function readmenu(){
			$sql = "SELECT * FROM menu ORDER BY Menu ASC";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function createm($nombre,$enlace,$img){
            $sql = "INSERT INTO menu (Menu,Enlace,Imagen) VALUES ('$nombre','$enlace','$img')";
			$res = mysqli_query($this->con, $sql);
			
			$archivo = './'.$enlace.'.php';
			if(file_exists($archivo)){
				echo "El fichero esta creado";
			}else{
				$nuevoarchivo = fopen($enlace.'.php', "w+");
				fwrite($nuevoarchivo,"<?php include_once \"encabezado.php\"; ?>\n\n");
				fwrite($nuevoarchivo,"<?php include_once \"pie.php\"; ?>");
				fclose($nuevoarchivo);
			}
			
			if($res){
                return true;
            }else{
                return false;
            }
		}

		public function single_recordm($id){
			$sql = "SELECT * FROM menu WHERE idMenu = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function updatem($nombre,$enlace,$img,$id){
			$sql = "UPDATE menu SET Menu = '$nombre',Enlace = '$enlace', Imagen = '$img' WHERE idMenu = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function deletem($id){
			$sql = "DELETE FROM menu WHERE idMenu = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin menú

		//Usuarios
		public function readusr(){
			$sql = "SELECT * FROM usuarios";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function single_recordu($id){
			$sql = "SELECT * FROM usuarios WHERE idUsuario = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function deleteUsr($id){
			$sql = "DELETE FROM usuarios WHERE idUsuario = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function createUsr($nombre,$usuario,$correo,$grupo,$estado,$contrasena,$fecha){
            $sql = "INSERT INTO usuarios (nombre,usuario,correo,contrasena,grupo,agregado) VALUES ('$nombre','$usuario','$correo','$contrasena','$grupo','$fecha')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function updateusr($nombre,$usuario,$email,$grupo,$estado,$contrasena,$idUsuario){
			$sql = "UPDATE usuarios SET nombre='$nombre', usuario='$usuario', correo='$email', contrasena='$contrasena', grupo='$grupo', estado='$estado' WHERE idUsuario=$idUsuario";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin Usuarios

		//Empleados
		public function reademp(){
			$sql = "SELECT * FROM usuarios";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function create_emp($usr,$pass,$nom,$cor,$per,$id){
            $sql = "INSERT INTO usuarios (usuario,contrasena,nombre,correo,perfil) VALUES ('$usr','$pass','$nom','$cor','$per')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function single_record_emp($id){
			$sql = "SELECT * FROM usuarios WHERE idUsuario = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function update_emp($usr,$pass,$nom,$cor,$per,$id){
			$sql = "UPDATE usuarios SET usuario = '$usr', contrasena = '$pass', nombre = '$nom', correo = '$cor', perfil = '$per' WHERE idUsuario = '$id'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function delete_emp($id){
			$sql = "DELETE FROM usuarios WHERE idUsuario = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin empleados


		//Cotizaciones
		public function readcot(){
			//$sql = "SELECT * FROM cotizaciones";
			$sql = "SELECT c.id_cotizacion, c.numero_cotizacion, c.fecha_cotizacion, c.atencion, SUM(d.precio_venta) AS precio_venta FROM cotizaciones c, detalle_cotizacion d
			WHERE c.numero_cotizacion = d.numero_cotizacion
			GROUP BY c.numero_cotizacion";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function deletecot($id){
			$sql = "DELETE FROM a1, a2 USING cotizaciones AS a1 INNER JOIN detalle_cotizacion AS a2
			WHERE a1.numero_cotizacion=a2.numero_cotizacion AND a1.numero_cotizacion = $id;";
			//$sql = "DELETE FROM cotizaciones, detalle_cotizacion WHERE numero_cotizacion = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//Fin cotizaciones


		//Fabricantes
		public function readfab(){
			$sql = "SELECT * FROM fabricante";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function createf($descripcion){
            $sql = "INSERT INTO fabricante (fabricante) VALUES ('$descripcion')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function single_record_fab($id){
			$sql = "SELECT * FROM fabricante WHERE idFabricante = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function update_fab($nombre,$id){
			$sql = "UPDATE fabricante SET fabricante = '$nombre' WHERE idFabricante = '$id'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function deletef($id){
			$sql = "DELETE FROM fabricante WHERE idFabricante = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin fabricantes

		//Existencias
		public function readext(){
			$sql = "SELECT idProducto, codigo, descripcion, existencia, entrada, precio_compra
			FROM productos
			ORDER BY descripcion ASC";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function deleteext($id){
			$sql = "DELETE FROM producto WHERE idFabricante = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//Fin de existencias

		//Proveedores
		public function readprov(){
			$sql = "SELECT * FROM proveedores ORDER BY nombre_empresa ASC";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function createprov($codProveedor,$nombre_empresa,$calle_empresa,$colonia_empresa,$municipio_empresa,$ciudad_empresa,$pais_empresa,$cp_emprea,$telefono_empresa,$sitioweb_empresa,$nombre_contacto,$apellido_contacto,$correo_contacto,$telefono_contacto,$agregado){
            $sql = "INSERT INTO proveedores (codProveedor,nombre_empresa,calle_empresa,colonia_empresa,municipio_empresa,ciudad_empresa,pais_empresa,cp_empresa,telefono_empresa,sitioweb_empresa,nombre_contacto,apellido_contacto,correo_contacto,telefono_contacto,agregado) VALUES ('$codProveedor','$nombre_empresa','$calle_empresa','$colonia_empresa','$municipio_empresa','$ciudad_empresa','$pais_empresa','$cp_emprea','$telefono_empresa','$sitioweb_empresa','$nombre_contacto','$apellido_contacto','$correo_contacto','$telefono_contacto','$agregado')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function single_recordprov($id){
			$sql = "SELECT * FROM proveedores WHERE idProveedor = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function updateprov($codProveedor,$nombre_empresa,$calle_empresa,$colonia_empresa,$municipio_empresa,$ciudad_empresa,$pais_empresa,$cp_emprea,$telefono_empresa,$sitioweb_empresa,$nombre_contacto,$apellido_contacto,$correo_contacto,$telefono_contacto,$agregado,$idProveedor){
			$sql = "UPDATE proveedores SET nombre_empresa = '$nombre_empresa', calle_empresa = '$calle_empresa', colonia_empresa = '$colonia_empresa', municipio_empresa = '$municipio_empresa', ciudad_empresa = '$ciudad_empresa', pais_empresa = '$pais_empresa', cp_empresa = '$cp_emprea', telefono_empresa = '$telefono_empresa', sitioweb_empresa = '$sitioweb_empresa', nombre_contacto = '$nombre_contacto', apellido_contacto = '$apellido_contacto', correo_contacto = '$correo_contacto', telefono_contacto = '$telefono_contacto' WHERE idProveedor = $idProveedor";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function deleteprov($id){
			$sql = "DELETE FROM productos WHERE idProducto = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		//Fin proveedores

		//Compras
		public function readcompras($id){
			$sql = "SELECT * FROM detalle_compras";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function single_recordcomp($id){
			$sql = "SELECT productos.codigo, productos.descripcion, detalle_compras.num_orden, detalle_compras.cantidad, detalle_compras.precio_venta, detalle_compras.precio_venta as total
			FROM detalle_compras, productos
			WHERE detalle_compras.num_orden = '$id' AND detalle_compras.id_producto = productos.idProducto";
			//$sql = "SELECT * FROM detalle_compras WHERE num_orden = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return;
		}

		//Perfil de la empresa
		public function readperfil($id){
			$sql = "SELECT * FROM perfil";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function single_recordprofile($id){
			$sql = "SELECT * FROM perfil WHERE id_perfil = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return;
		}

		public function updateperfil($nombre,$email,$telefono,$moneda,$logo,$calle,$ciudad,$estado,$cp,$id_perfil){
			$sql = "UPDATE perfil SET nombre_empresa = '$nombre_empresa', direccion = '$calle', ciudad = '$ciudad', codigo_postal = '$cp', estado = '$estado', telefono = '$telefono', email = '$email', moneda = '$moneda', logo_url = '$logo' WHERE id_perfil = $id_perfil";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//----- DEPARTAMENTOS -----//
		public function leerDep(){
			$sql = "SELECT * FROM departamentos";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function crearDep($NombreDepartamento){
            $sql = "INSERT INTO departamentos (NombreDepartamento) VALUES ('$NombreDepartamento')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

		public function seleccionarDep($id){
			$sql = "SELECT * FROM categoria WHERE id = '$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function actualizarDep($nombre,$id){
			$sql = "UPDATE categoria SET nomCategoria = '$nombre' WHERE id = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//----- PUESTOS -----//
		public function crearPuesto($idDepartamento,$NombrePuesto){
            $sql = "INSERT INTO puesto (idDepartamento,NombrePuesto) VALUES ('$idDepartamento','$NombrePuesto')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
		}

    }
?>