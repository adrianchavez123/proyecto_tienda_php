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
		$producto = new  Producto();
		//$realizarCompra =$producto->comprobarExistencia($productos_lista,$cantidades_lista);
		$realizarCompra = true;
		if($realizarCompra)
		{

		$sentencia = "insert into compras values(null,$proveedor_id,now(),0)";
		echo "$sentencia<br><br>";
			if(mysql_query($sentencia))
			{
				
				$orden = $this->id_compra($proveedor_id);
				for ($i=0; $i < sizeof($productos_lista) ; $i++) { 
					
					$sent = "insert into detalle_compra values (null,$orden,".$productos_lista[$i].",".
						$cantidades_lista[$i].")";
					echo "$sent<br><br>";
					mysql_query($sent);
					//$this->reducir_lista_productos($productos_lista[$i],$cantidades_lista[$i]);
				}
				return true;
			}else
			{
				return false;
			}
			
		}

		return false;	
	
	}

	public function aumentar_lista_productos($producto_id,$cantidad)
	{
		
		for($i = 0; $i< sizeof($producto_id); $i++) {
			
			$producto = new Producto();
			$cant = $producto->cantidad_producto($producto_id[$i]);
			//echo "$cant   +  $cantidad[$i]";
			$c = $cant + $cantidad[$i];

			$sentencia = "update productos set existencia='$c' where id= '$producto_id[$i]'";
			//echo $sentencia."<br>";
			$x = mysql_query($sentencia);
		}
		
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


	public function compras_sin_recibir()
	{
		$sentencia = "select * from compras where entregado = 0";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;
	}

}