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
		id int not null auto_increment,
	nombre  varchar(200) not null,
	tipo_usuario varchar(50) not null,
	correo varchar(200) not null,
	usuario varchar(50) not null,
	pass varchar(200) not null,
	unique key (usuario),
		$sentencia = "insert into usuarios values(null,
			'$nombre','cliente','$rfc','$domicilio','$ciudad','activo')";
		
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