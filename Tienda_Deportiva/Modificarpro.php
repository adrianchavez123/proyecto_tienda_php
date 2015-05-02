<?php
	session_start();
	if($_SESSION['tipo_usuario'] != 'admin')
	{
		header("location:index.php");
	}

	require_once('clases_php/Producto.php');
	$producto = new Producto();
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
		
		<li class="sublast"><a href="#"><span><img src="MenuGeneral2_files/css3menu1/hammer.png" alt=""/>Reportes</span></a>
		<ul>
			<li class="subfirst"><a href="reporteListaOrdenes.php">Reporte lista ordenes</a></li>
			<li><a href="reporteListaPedidos.php">Reporte lista pedidos</a></li>
			<li><a href="reporteProductos.php">Reporte productos</a></li> 
			<li class="sublast"><a href="reporteProveedor.php">Reporte Proveedores</a></li>
		</ul>
		</li>
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
	
	if(isset($_POST['Nombre']) and !empty($_POST["Nombre"])
		 and !empty($_POST["codigo"])
		 and !empty($_POST["Existencia"])
		 and !empty($_POST["unidad"])
		 and !empty($_POST["ubicacion"])
		 and !empty($_POST["clasificacion"])
		 and !empty($_POST["costo"])
		 and !empty($_POST["PorcentajeG"])
		  and !empty($_POST["pventa"])
		and !empty($_POST["DemandaD"])
		 and !empty($_POST["Tmaximo"])
		
		 and !empty($_POST["Inventario"])
		and isset($_POST['enviar'])
		and !empty($_POST['id'])
			
	)
	{
		$imagen = $producto->subir_imagen($_POST['Nombre']);
		if($producto->modificar($_POST['id'],$_POST['codigo'],$_POST['Nombre'],$_POST['Existencia'],$_POST['unidad'],
			$_POST['clasificacion'],$_POST['ubicacion'],"$imagen",$_POST['costo'],$_POST['PorcentajeG'],
			$_POST['pventa'],$_POST['DemandaD'],$_POST['Tmaximo'],$_POST['Inventario']))
		{
			echo "<h2 class='error'>Modificado</h2>";
			echo "<script>alert('producto modificado');</script>";
			
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
		 <legend>Altas Productos </legend>
	<form id="form1" name="form1" method="post" enctype="multipart/form-data">
	<div>
	
		<label for="idProducto">Nombre producto</label>
		<select name='id'>
  		<?php
  			$productos = $producto->lista();

  			foreach ($productos as $pro) {
  				echo "<option  value='".$pro['id']."'>".$pro['nombre']."</option>";

  			}
  		?>
	</select>	

	</div>
				  <div>
		<label for="Nombre de producto">Nuevo Nombre de productos</label>
		<input type="text" name="Nombre" id="Nombrep" /><br>
		</div>
		  <div>
		<label for="Nombre de producto">codig del producto</label>
		<input type="text" name="codigo" id="Nombrep" /><br>
		</div>
		  <div>
		<label for="Existencia">Existencias</label>
		<input type="Number" name="Existencia" id="Existencias" /><br>
		</div>
		<div>
		<label for="Unidad de Medida">Unidad de Medida</label>
		<select name="unidad">
  <option value="valor1">valor 1</option>
  <option value="valor2">valor 2</option>
  <option value="valor3">valor 3</option>
  <option value="valor4">valor 4</option>
</select>

</div>
<div>
<label for="Clasificacion">Clasificación</label>
		<select name="clasificacion">
  <option value="clasificacion 1">clasificacion 1</option>
  <option value="clasificacion 2">clasificacion 2</option>
  <option value="clasificacion 3">clasificacion 3</option>
  <option value="clasificacion 4">clasificacion 4</option>
</select>	


</div>
	<div>
<label for="Ubicacion">Ubicación</label>
		<select name="ubicacion">
  <option value="ubicacion 1">ubicacion 1</option>
  <option value="ubicacion 2">ubicacion 2</option>
  <option value="ubicacion 3">ubicacion 3</option>
  <option value="ubicacion 4">ubicacion 4</option>
</select>	


</div>
<div>
<label for="Imagen">Imagen</label>
<input type="file" name="imagen" id="imagen">
</div>	
<div>
<label for="Costo de compra">Costo</label>
<input type="text" name="costo" id="costo">
</div>
<div>
<label for="PorcentajeG">Porcentaje Ganancia</label>
<input type="text" name="PorcentajeG" id="PorcentajeG">
</div>
<div><label for="Precio de Venta">Precio de Venta</label>
<input type="text" name="pventa" id="venta">
</div>
<div>
<label for="Demanda Diaria Aproximada">Demanda Diaria</label>
<input type="text" name="DemandaD" id="DemandaD">
</div>
<div>
<label for="Tiempo de Entrega Maximo">Tiempo de entrega Maximo</label>
<input type="text" name="Tmaximo" id="Tmaximo">
</div>
<div>
<label for="Inventario de seguridad">Inventario de Seguridad</label>
<input type="text" name="Inventario" id="Inventario">
</div>

<div>
	<input type="submit" name="enviar" id="enviar" >
</div>
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