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
		$sentencia = "select * from usuarios where tipo_usuario='cliente'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;
	}

	public function buscar($rfc)
	{
		$sentencia = "select * from  usuarios where tipo_usuario='cliente' and rfc like '%$rfc%'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
    	return $lista;
	}

	public function crear($nombre,$correo,$usuario,$pass)
	{
		
		$sentencia = "insert into usuarios values(null,
			'$nombre','cliente','$correo','$usuario','$pass')";
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}

	public function modificar($id,$nombre,$correo,$pass)
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