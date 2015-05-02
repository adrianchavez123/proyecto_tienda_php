<?php

require_once('Conexion.php');
require_once('Producto.php');

class Reporte
{
	protected $conexion;
	protected $con;

	public function __construct()
	{
		$this->con = new Conexion('root','');
		$this->conexion = $this->con->conectar(); 
	}

	public function balance_de_almacen($fecha)
	{
		
	}

	public function lista_pedidos($fecha)
	{
		$sentencia = "SELECT detalle_compra.numero_orden, proveedores.nombre_razon_social,
				 productos.nombre, detalle_compra.cantidad, compras.fecha_pedido FROM detalle_compra 
				 join compras on detalle_compra.numero_orden = compras.numero_orden 
				join proveedores on compras.proveedor_id = proveedores.id 
				join productos on productos.id = detalle_compra.producto_id
				where  compras.fecha_pedido='$fecha'";

		//echo "$sentencia<br><br>";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;
	}

	public function lista_ordenes()
	{
		$sentencia = "SELECT detalle_compra.numero_orden, proveedores.nombre_razon_social,
				 productos.nombre, detalle_compra.cantidad, compras.fecha_pedido FROM detalle_compra 
				 join compras on detalle_compra.numero_orden = compras.numero_orden 
				join proveedores on compras.proveedor_id = proveedores.id 
				join productos on productos.id = detalle_compra.producto_id
				where  compras.entregado=0 order by detalle_compra.numero_orden";

		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;

	}

	public function productos_reorden()
	{

	}
}