<?php

require_once('Conexion.php');
require_once('Compra.php');
class Recepcion
{
	protected $conexion;
	protected $con;

	public function __construct()
	{
		$this->con = new Conexion('root','');
		$this->conexion = $this->con->conectar(); 
	}

	public function realizar_recepcion($compra_id,$lugar)
	{
		$proveedor_id = 0;
		$sentencia = "select * from compras where numero_orden ='$compra_id'";
		$reg = mysql_query($sentencia);
		while ($lista = mysql_fetch_array($reg)) {
			$proveedor_id = $lista['proveedor_id'];
    	}

		$sentencia = "insert into recepcion values(null,$proveedor_id,$compra_id,now(),'$lugar')";

		mysql_query($sentencia);

		$sentencia2 = "update compras set entregado = 1 where numero_orden=$compra_id";

		mysql_query($sentencia2);


		$sentencia2 = "select * from detalle_compra where numero_orden=$compra_id";
		$producto_id = array();
		$cantidad = array();
		$reg = mysql_query($sentencia2);
		while ($lista = mysql_fetch_array($reg)) {
			$producto_id[] = $lista['producto_id'];
			$cantidad[] = $lista['cantidad'];
    	}

		$compra = new Compra();
		$compra->aumentar_lista_productos($producto_id,$cantidad);
		return true;
	}
}
?>