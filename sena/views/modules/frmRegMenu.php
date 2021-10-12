<?php 

$menuControlador = new MenuControlador();
$menuControlador->registrarMenuControlador();

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<h3 class="text-center">Registar Menu Prinicipal</h3>
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Menu</label>
			<input type="text" name="nombreMenu" class="form-control">
			
			<button type="submit" name="regMenu" class="btn btn-primary mt-5">Registrar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok12'){
				print "Menu Registrado Correctamente";
			}
			elseif($_GET['action'] == 'fa12'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConMenu">Consultar Menu Principal</a>
	</div>
	<div class="col-3"></div>
</div>
