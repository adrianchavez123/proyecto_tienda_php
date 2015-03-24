<?php
	session_start();
	if($_SESSION['tipo_usuario'] != 'admin')
	{
		header("location:index.php");
	}
?>
<html>
		<head>
		<meta charset="utf-8" />	
		<title>Pagina Principal de Tiendas Deportivas Charly  </title>
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="MenuGeneral2_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
		
		</head>
		<header>
		
		<p align="center"><img src="img/header_deportivo.jpg"></p>
			

			</header>
<body ontouchstart="" style="background-color:#EBEBEB">
<div  style="float: center;">
<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="#" style="height:16px;line-height:16px;"><span>Inventarios</span></a>
	<ul>
		<li class="subfirst"><a href="#"><img src="MenuGeneral2_files/css3menu1/calendar2.png" alt=""/>Orden de Compra</a></li>
		<li><a href="#"><img src="MenuGeneral2_files/css3menu1/pencil2.png" alt=""/>Orden de Recepción</a></li>
		<li><a href="#"><img src="MenuGeneral2_files/css3menu1/file4.png" alt=""/>Reportes</a></li>
		<li><a href="#"><span><img src="MenuGeneral2_files/css3menu1/users.png" alt=""/>Proveedores</span></a>
		<ul>
			<li class="subfirst"><a href="Dardebajaproveedores.php">Baja</a></li>
			<li><a href="Busquedaproveedor.php">Busqueda</a></li>
			<li><a href="Modificarproveedor.php">Modificación</a></li> 
			<li class="sublast"><a href="Altaproveedores.php">Alta</a></li>
		</ul></li>
		<li class="sublast"><a href="#"><span><img src="MenuGeneral2_files/css3menu1/hammer.png" alt=""/>Productos</span></a>
		<ul>
			<li class="subfirst"><a href="Dardebajaproductos.php">Baja</a></li>
			<li><a href="BuscarProducto.php">Busqueda</a></li>
			<li><a href="Modificarpro.php"><span>Modificación</span></a>
			</li>
			<li class="sublast"><a href="Productos.php">Alta</a></li>
		</ul></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:16px;line-height:16px;"><span>Ventas</span></a>
	<ul>
		<li class="subfirst"><a href="#"><span>Reportes</span></a>
		<ul>
			<li class="subfirst"><a href="#">Listado de Facturas</a></li>
			<li class="sublast"><a href="#">Listado de Clientes</a></li>
		</ul></li>
		<li><a href="#"><img src="MenuGeneral2_files/css3menu1/tags.png" alt=""/>Ventas </a></li>
		<li class="sublast"><a href="#"><span><img src="MenuGeneral2_files/css3menu1/users1.png" alt=""/>Clientes</span></a>
		<ul>
			<li class="subfirst"><a href="dardeBajaClientes.php">Baja</a></li>
			<li><a href="BusquedaCliente.php">Busqueda</a></li>
			<li><a href="ModificarCliente.php">Modificación</a></li>
			<li class="sublast"><a href="AltaClientes.php">Alta</a></li>
		</ul></li>
	</ul></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">drop down menu html</a> by Css3Menu.com</p>
<!-- End css3menu.com BODY section -->
</div>
<?php
	require_once('clases_php/Proveedor.php');
	$proveedor = new Proveedor();
	
	if(isset($_POST['Nombre']) and !empty($_POST["Nombre"])
		 and isset($_POST['Rfc']) and !empty($_POST["Rfc"])
		 and isset($_POST['Domiciliop']) and !empty($_POST["Domiciliop"])
		 and isset($_POST['Ciudad']) and !empty($_POST["Ciudad"])

	)
	{
		if($proveedor->crear($_POST['Nombre'],$_POST['Rfc'],$_POST['Domiciliop'],$_POST['Ciudad']))
		{
			echo "<h2 class='error'>Guardado</h2>";
			echo "<script>alert('proveedor guardado');</script>";
			
		}
		else
		{
			echo "<h2 class='error'>Datos invalidos</h2>";
		}		
			
	}
	else
	{
		echo "<h1>Ingresa los datos</h1>";
	}
	
?>
<fieldset style="margin:auto">
		 <legend>Alta proveedores</legend>
	<form id="form1" name="form1" method="post">
		 <div>
		<label for="Nombre o Razon social">Nombre o Razon social</label>
		<input type="text" name="Nombre" id="Nombrer" /><br>
		</div>
		  <div>
		  <div>
		<label for="Rfc">Rfc</label>
		<input type="text" name="Rfc" id="Rfc" /><br>
		</div>
		  
		  <div>
		<label for="Domicilio">Domicilio</label>
		<input type="text" name="Domiciliop" id="Domiciliop" /><br>
		</div>
		 <div>
		<label for="Ciudad">Ciudad</label>
		<input type="text" name="Ciudad" id="Ciudad" /><br>
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