<?php

require_once "Conexion.php";

class Proveedor 
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
		$sentencia = "select * from proveedores where activo='activo'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;
	}

	public function buscar($rfc)
	{
		$sentencia = "select * from proveedores where activo='activo' and rfc like '%$rfc%'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
    	return $lista;
	}

	public function crear($nombre,$rfc,$domicilio,$ciudad)
	{
		$sentencia = "insert into proveedores values(null,
			'$nombre','$rfc','$domicilio','$ciudad','activo')";
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}

	public function modificar($id,$nombre,$rfc,$domicilio,$ciudad)
	{
		$sentencia = "update proveedores set nombre_razon_social ='$nombre',
		rfc ='$rfc', domicilio ='$domicilio', ciudad ='$ciudad'
		where id = '$id'";
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}
	public function borrar($id)
	{
		$sentencia = "update proveedores set activo='desactivo' where id=$id";
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false; 
	}

}

?>