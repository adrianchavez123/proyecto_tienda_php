<?php
	session_start();
	if($_SESSION['tipo_usuario'] != 'admin')
	{
		header("location:index.php");
	}
?><html>
		<head>
		<meta charset="utf-8" />	
		<title>Pagina Principal de Tiendas Deportivas Charly  </title>
<link rel="stylesheet" href="css/estilo.css" type="text/css">	
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
	<title>css3menu.com</title>
		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="MenuGeneral2_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
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

		
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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