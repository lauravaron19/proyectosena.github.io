<?php 

$usuarioRolControlador = new RolUsuarioControlador();
$datosUsuario = $usuarioRolControlador->usuarioControlador->consultarUsuarioControlador();
if(isset($_GET['id'])){
	$datosRolUsuario = $usuarioRolControlador->consultarRolesUsuarioIdUsuarioControlador($_GET['id']);
	var_dump($datosRolUsuario);
}

$usuarioRolControlador->actualizarRolUsuarioControlador();
 
$checked = '';
?>

<div class="row">
	<div class="col-3"></div>

	<div class="col-6 mt-5 mb-5">
		<h3>Actualizar Perfiles a Usuarios</h3>
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Perfil</label>
			<select name="idUsuario" onchange="this.form.submit()" id="" class="form-select" disabled>
				<option value="">Seleccione un Usuario</option>
				<?php 
				foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
					if (isset($_GET['id']) && $valueUsuario['idUsuario'] == $_GET['id']) {
						print '<option value="'.$valueUsuario['idUsuario'].'" selected>'.$valueUsuario['usuarioLogin'].'</option>';
					}
					else{
						print '<option value="'.$valueUsuario['idUsuario'].'">'.$valueUsuario['usuarioLogin'].'</option>';
					}					
				}

				?>
			</select>
<!--- /// ZONA DE BOTONES CHECKBOX ////-->
			<div class="btn-group mt-5" role="group" aria-label="Basic checkbox toggle button group">
				<?php 
				if (isset($datosRolUsuario)) {
					foreach ($datosRolUsuario as $keyRolUsuario => $valueRolUsuario) {
						if($valueRolUsuario['usuarioRolEstado'] == "true"){
							$checked = 'checked';
						}
						else{
							$checked = '';
						}
						print '<input name="idRolUsuario[]" value="'.$valueRolUsuario['idUsuarioRol'].'" type="checkbox" class="btn-check" id="btncheck'.$valueRolUsuario['idUsuarioRol'].'" autocomplete="off" '.$checked.'>';
						print '<label class="btn btn-outline-primary" for="btncheck'.$valueRolUsuario['idUsuarioRol'].'" checked>'.$valueRolUsuario['rolNombre'].'</label>';
					}
				}
				?>
			</div>
			<br>
			<button type="submit" name="updRolUsuario" class="btn btn-primary mt-5">Actualizar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok11'){
				print "Perfil Usuario Actualizado Correctamente";
			}
			elseif($_GET['action'] == 'fa11'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConRolUsuario">Consultar Perfiles Por Usuario</a>
	</div>
	<div class="col-3"></div>
</div>
