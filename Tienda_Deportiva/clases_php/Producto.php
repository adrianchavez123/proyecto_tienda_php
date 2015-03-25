<?php

require_once('Conexion.php');

class Producto
{
	protected $conexion;
	protected $con;

	public function __construct()
	{
		$this->con = new Conexion('root','');
		$this->conexion = $this->con->conectar(); 
	}

	public function lista()
	{
		$sentencia = "select * from productos where activo ='activo'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;
	}

	public function buscar($codigo)
	{
		/*checar*/
		$sentencia = "select * from productos where activo='activo' and codigo like '%$codigo%'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
    	return $lista;
	}

	

	public function crear($codigo,$nombre,$existencia,$unidad_de_medida,
		$clasificacion,$ubicacion,$imagen,$costo_compra,$porcentaje_ganancia,
		$precio_venta,$demanda_diaria,$tiempo_de_entrega,$cantidad_productos_minimos)
	{
		$reorden =$this->reorden($demanda_diaria,$tiempo_de_entrega,$cantidad_productos_minimos);
		$sentencia = "insert into productos values(null,'$codigo','$nombre','$existencia','$unidad_de_medida',
			'$clasificacion','$ubicacion','$imagen','$costo_compra','$porcentaje_ganancia',
			'$precio_venta','$demanda_diaria','$tiempo_de_entrega','$cantidad_productos_minimos',
			'$reorden','activo')";
	
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}

	public function modificar($id,$codigo,$nombre,$existencia,$unidad_de_medida,
		$clasificacion,$ubicacion,$imagen,$costo_compra,$porcentaje_ganancia,
		$precio_venta,$demanda_diaria,$tiempo_de_entrega,$cantidad_productos_minimos)
	{
		$reorden =$this->reorden($demanda_diaria,$tiempo_de_entrega,$cantidad_productos_minimos);
		
		$sentencia = "update productos set codigo ='$codigo', nombre ='$nombre',existencia= '$existencia',unidad_de_medida='$unidad_de_medida',
		clasificacion= '$clasificacion',ubicacion= '$ubicacion',imagen = '$imagen',costo_compra= '$costo_compra',porcentaje_ganancia= '$porcentaje_ganancia',
		precio_venta='$precio_venta',demanda_diaria='$demanda_diaria',tiempo_de_entrega= '$tiempo_de_entrega',cantidad_productos_minimos='$cantidad_productos_minimos'
		,punto_reorden='$reorden' where id = '$id'";
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}
	public function borrar($id)
	{
		$sentencia = "update productos set activo='desactivo' where id=$id";
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false; 
	}

	public function subir_imagen($nombre)
	{
		$ruta = "imagenes/".$nombre.".jpg";
		$ruta = str_replace(" ","_",$ruta,$count);
			
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		if (in_array($_FILES['imagen']['type'], $permitidos) ){
		
			if ($_FILES['imagen']['size'] <= 2000000) {
			
				copy($_FILES['imagen']['tmp_name'], $ruta);
			
			}
		}
		else
		{
			echo "solo imagenes";
			$ruta = "images/sin_imagen.png";
		}
		
		return $ruta;
	}	


	public function reorden($demanda_diaria,$tiempo_de_entrega,$cantidad_productos_minimos)
	{
		return ($demanda_diaria*$tiempo_de_entrega)/$cantidad_productos_minimos;
	}
}

?>