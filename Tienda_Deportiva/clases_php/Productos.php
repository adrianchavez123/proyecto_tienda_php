<?php

require_once('Conexion.php');

class Productos
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
		$sentencia = "select * from productos";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
		return $lista;
	}

	public function buscar($codigo)
	{
		/*checar*/
		$sentencia = "select * from productos where activo='activo' and rfc like '%$rfc%'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
    	return $lista;
	}

	public function buscarCategoria($categoria_id)
	{
		$sentencia = "select * from productos where categoria_id='$categoria_id'";
		$reg = mysql_query($sentencia);
		$lista = array();
		while ($lista[] = mysql_fetch_array($reg)) {
    	}
    	return $lista;
	}

	public function crear()
	{
		/*checar*/
		$sentencia = "insert into productos values(null,'$nombre')";
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}

	public function crearCategoria($nombre)
	{
		$sentencia = "insert into categorias values(null,'$nombre')";
		
		if(mysql_query($sentencia))
		{
			return true;
		}
		return false;
	}
}

?>