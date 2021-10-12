<?php 
	$opcionMenuControlador = new OpcionesMenuControlador();
	$datosMenu = $opcionMenuControlador->menuControlador->consultarMenuControlador();
	$opcionMenuControlador->registrarOpcionMenuControlador();
?>
<div class="row">
	<div class="col-4">
		
	</div>
	<div class="col-4 mt-5">
		<h1>Registrar Opciones Menu</h1>
		<form method="post" class="form">
			<label>Menu Principal</label>
			<select name="idMenu" id="" class="form-control">
				<option value="0">Seleccione un Menu</option>
				<?php 
					foreach ($datosMenu as $keyMenu => $valueMenu) {
						print '<option value="'.$valueMenu['idMenu'].'">'.$valueMenu['menuNombre'].'</option>';
					}
				?>

			</select>
			<br>
			<label>Nombre Opcion Menu</label>
			<input type="text" class="form-control" name="opcionMenuNombre" placeholder="Nombre Opcion Menu">
			<br>
			<label>Enlace</label>
			<input type="text" class="form-control" name="opcionMenuEnlace" placeholder="Enlace Menu">
			<br>
			
			<button type="submit" name="regOpcionMenu" class="btn btn-primary mt-3">Registrar Menu</button>	 
		</form>		
				<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok16'){
				print "Opcion de Menu Registrada Correctamente";
			}
			elseif($_GET['action'] == 'fa16'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>

		<a href="frmConMenus">Consultar Menus</a>
	</div>
</div>
