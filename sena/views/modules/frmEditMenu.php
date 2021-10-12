<?php 

$menuControlador = new MenuControlador();
$menuControlador->actualizarMenuControlador();
$datosMenu = $menuControlador->consultarMenuIdControlador();
var_dump($datosMenu);

if ($datosMenu[0]['menuEstado'] == "true") {
	$checkedTrue = 'checked';
	$checkedFalse = '';
}
else{
	$checkedTrue = '';
	$checkedFalse = 'checked';
}

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<h3 class="text-center">Editar Menu Principal</h3>
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Perfil</label>
			<input type="text" name="menuNombre" class="form-control" value="<?php print $datosMenu[0]['menuNombre'] ?>">

			<!--ZONA BOTONERIA -->
			<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
				<input type="radio" class="btn-check" name="menuEstado" id="menuEstado1" autocomplete="off" value="true" <?php print $checkedTrue ?>>
				<label class="btn btn-outline-primary" for="menuEstado1">Activo</label>

				<input type="radio" class="btn-check" name="menuEstado" id="menuEstado2" autocomplete="off" value="false" <?php print $checkedFalse ?>>
				<label class="btn btn-outline-primary" for="menuEstado2">Inactivo</label>
			</div>

			<br>
			
			<button type="submit" name="updMenu" class="btn btn-primary mt-5">Actualizar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok13'){
				print "Menu Principal Actualizado Correctamente";
			}
			elseif($_GET['action'] == 'fa13'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConMenu">Consultar Menu Principal</a>
	</div>
	<div class="col-3"></div>
</div>
