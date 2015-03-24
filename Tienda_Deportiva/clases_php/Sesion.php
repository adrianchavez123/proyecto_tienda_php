<?php
session_start();

require_once('Conexion.php');
class Sesion
{
	protected $conexion;
	protected $con;

	public function __construct()
	{
		$this->con = new Conexion('root','');
		$this->conexion = $this->con->conectar(); 
	}

	public function iniciar($usuario,$pass)
	{
		$p= md5($pass);
		$sentencia = "select * from usuarios where usuario='$usuario' and pass='$p' ";
		$reg = mysql_query($sentencia);
		if($reg)
		{
			$num = mysql_num_rows($reg);

			if($num > 0)
			{
				while($res = mysql_fetch_assoc($reg))
				{
					$id = $res['id'];
					$_SESSION['tipo_usuario'] = $res['tipo_usuario'];
					$_SESSION['id'] = $id;
					
				}
				return $id;
			}
			return false;
		}
		return false;
	}

	public function cerrar()
	{	
		session_destroy();
		header("location:../index.php");
		exit;

	}
}



?>
