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
		<li class="subfirst"><a href="ordendecompra.php"><img src="MenuGeneral2_files/css3menu1/calendar2.png" alt=""/>Orden de Compra</a></li>
		<li><a href="ordenrecepcion.php"><img src="MenuGeneral2_files/css3menu1/pencil2.png" alt=""/>Orden de Recepción</a></li>
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
	require_once('clases_php/Compra.php');
	require_once('clases_php/Recepcion.php');
	
	if(isset($_POST['compra_id']) and !empty($_POST["compra_id"])
		 and isset($_POST['lugar']) and !empty($_POST["lugar"])
		
	)
	{
		$recepcion = new Recepcion();
		$realizada = $recepcion->realizar_recepcion($_POST['compra_id'],$_POST['lugar']);
		
		if($realizada)
		{

			echo "<table>";
				echo "<tr>";
					echo "<th>numero de orden</th>";
					echo "<th>producto</th>";
					echo "<th>fecha pedido</th>";
					echo "<th>cantidad</th>";
					echo "<th>proveedor</th>";
				echo "</tr>";
				$sentencia ="SELECT detalle_compra.numero_orden, proveedores.nombre_razon_social,
				 productos.nombre, detalle_compra.cantidad, compras.fecha_pedido FROM detalle_compra 
				 join compras on detalle_compra.numero_orden = compras.numero_orden 
				join proveedores on compras.proveedor_id = proveedores.id 
				join productos on productos.id = detalle_compra.producto_id
				where  detalle_compra.numero_orden=".$_POST['compra_id'];
				$reg = mysql_query($sentencia);
				
				while ($lista = mysql_fetch_array($reg)) {

					echo "<tr>";
					echo "<td>".$lista['numero_orden']."</td>";
					echo "<td>".$lista['nombre_razon_social']."</td>";
					echo "<td>".$lista['fecha_pedido']."</td>";
					echo "<td>".$lista['cantidad']."</td>";
					echo "<td>".$lista['nombre']."</td>";
					echo "</tr>";

		    	}
			echo "</table>";
			echo "<script>alert('Recepcion realizada');</script>";
		}
			
	}
	else
	{
		echo "<h1>Ingresa los datos</h1>";
	}
	
?>
<fieldset style="margin:auto">
		 <legend>Recibir compra</legend>
	<form id="form1" name="form1" method="post">
		 <div>
		<label for="Nombre o Razon social">Numero de compra</label>
		<select name="compra_id" id="">
			<?php
				$compra = new Compra();
				$proveedores =$compra->compras_sin_recibir();
				foreach ($proveedores as  $pro) {
				
				echo "<option  value='".$pro['numero_orden']."'>".$pro['numero_orden']."</option>";

							}
			?>
		</select>
		</div>
		  <div>
		 
		 <div>
		<label for="Ciudad">lugar entrega</label>
		<select name="lugar" id="">
			<option value="lugar1">lugar1</option>
			<option value="lugar2">lugar2</option>
			<option value="lugar3">lugar3</option>
			<option value="lugar4">lugar4</option>
		</select>
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