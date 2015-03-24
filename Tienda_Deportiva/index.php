<html>
		<head>
		<meta charset="utf-8" />	
		<title>Pagina Principal de Tiendas Deportivas Charly  </title>
<link rel="stylesheet" href="css/estilo.css" type="text/css">	
		</head>
		<header>
		
		<p align="center"><img src="img/header_deportivo.jpg"></p>
			

			</header>
<body>
<?php

	require_once("clases_php/Sesion.php");
	$sesion = new Sesion();
	
	if(isset($_POST['usuario']) and !empty($_POST["usuario"])
		 and isset($_POST['pass']) and !empty($_POST["pass"]))
		{
			$id = $sesion->iniciar($_POST['usuario'],$_POST['pass']);
			if($id)
			{
				if($_SESSION['tipo_usuario']== 'admin')
				{
					header("location:MenuGeneral.php");
				}
			}
			else
			{
				echo "<h2 class='error'>Datos invalidos</h2>";
			}
		}
?>
<fieldset style="margin:auto">
		 <legend>Entrar al Sistema de Deportes Charly</legend>
	<form id="form1" name="form1" method="post">
		  <div>
		<label for="Usuario">Usuario</label>
		<input type="text" name="usuario" id="Usuario" /><br>
		</div>
		<div>
		<label for="Contraseña">Contraseña</label>
		<input type="password" name="pass" id="Contraseña" />
		</div>
		<input type="submit" name="enviar"  id="enviar" >
		
	</form>

</fieldset>


<br>
<br>
<br>
<br>			



<footer>

	<div id="footer">
	<p align="center"><img src="img/footer.jpg"></p>
	
	</div>			
</footer>

</body>
</html>