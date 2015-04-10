<?php

require_once('Conexion.php');
require_once('Producto.php');

class Compra
{
	protected $conexion;
	protected $con;

	public function __construct()
	{
		$this->con = new Conexion('root','');
		$this->conexion = $this->con->conectar(); 
	}

	public function comprar($proveedor_id,$unidad,$productos_lista,$cantidades_lista)
	{
		$sentencia = "insert into compras values(null,$proveedor_id,now())";

		if(mysql_query($sentencia))
		{
			
			$orden = $this->id_compra($proveedor_id);
			for ($i=0; $i < sizeof($productos_lista) ; $i++) { 
				
				$sent = "insert into detalle_compra values (null,$orden,".$productos_lista[$i].",".
					$cantidades_lista[$i].")";
				
				mysql_query($sent);
				$this->reducir_lista_productos($productos_lista[$i],$cantidades_lista[$i]);
			}
		}

		return true;	
	
	}

	public function reducir_lista_productos($producto_id,$cantidad)
	{
		
		$producto = new Producto();
		$cant = $producto->cantidad_producto($producto_id);
		$c = $cant - $cantidad;

		$sentencia = "update productos set existencia='$c' where id= '$producto_id'";
		echo $sentencia."<br>";
		$x = mysql_query($sentencia);
		return $x;
	}


	public function id_compra($proveedor_id)
	{
		$sentencia = "select * from compras where proveedor_id ='$proveedor_id'";
		$reg = mysql_query($sentencia);
		while ($lista = mysql_fetch_array($reg)) {
			$id = $lista['numero_orden'];
    	}
		return $id;
	}

}