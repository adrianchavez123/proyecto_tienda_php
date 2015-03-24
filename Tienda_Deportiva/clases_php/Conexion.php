<?php

class Conexion
{
	protected $host = 'localhost';
	protected $base = 'tienda_deportiva';
	protected $usuario ='';
	protected $pass = '';
	var $con;
	public function __construct($usuario,$pass)
	{
		$this->usuario = $usuario;
		$this->pass = $pass;
	}


	public function conectar()
	{
		if($this->con = mysql_connect($this->host,$this->usuario,$this->pass))
		{
			if(mysql_select_db($this->base,$this->con))
			{
					return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}


?>