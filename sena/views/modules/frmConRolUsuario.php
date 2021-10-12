<?php 
	$usuarioRolControlador = new RolusuarioControlador();
	$datosUsuario = $usuarioRolControlador->usuarioControlador->consultarUsuarioControlador();
?>

<div class="row">
	<div class="col">
		<h1>Consultar Perfiles de Usuarios</h1>
	</div>	
</div>

<div class="row">
	<div class="col">
		<form method="post" class="form">
			<div class="row">
			<div class="col-2">
			<input type="text" name="datoBusqueda" class="form-control" style="width: auto;">
			</div>
			<div class="col-6">
			<input type="submit" name="btnBuscar" value="🔍" class="btn btn-primary">
			</div>
			</div>
		</form>
	</div>	
</div>

<div class="row">
	<div class="col">
		<?php 
				///var_dump($datosUsuario);
		print '<table class="table table-striped mt-10">';
		print '<thead>';
		print '<th>Nombre del Usuario</th>';
		print '<th>Estado del Usuario</th>';
		print '<th>Opciones</th>';
		print '</thead>';
		print '<tbody>';
		foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
			$datosRolUsuario = $usuarioRolControlador->consultarRolesUsuarioIdUsuarioControlador($valueUsuario['idUsuario']);
			print '<tr>';
			print '<td>'.$valueUsuario['usuarioLogin'].'</td>';
			print '<td>'.$valueUsuario['usuarioEstado'].'</td>';
			print '<td><a href=index.php?action=frmEditRolUsuario&id='.$valueUsuario['idUsuario'].'>Editar</td>';
			print '</tr>';
		}
		print '</tbody>';
		print '</table>';
		?>
	</div>
</div>
<div class="row">
	<div class="col">
		<?php 
		if(isset($_GET['action'])){
			if($_GET['action'] == 'ok6'){
				print "<p>Usuario Eliminado Correctamente</p>";
			}
			elseif ($_GET['action'] == 'fa6') {
				print "<p>Ocurrio un Error Intentelo mas Tarde</p>";
			}
		}
		?>
	</div>
</div>