<?php 

$usuarioRolControlador = new RolUsuarioControlador();
$datosUsuario = $usuarioRolControlador->usuarioControlador->consultarUsuarioControlador();
$datosRol = $usuarioRolControlador->rolControlador->consultarRolControlador();
if(isset($_POST['idUsuario'])){
	$datosRolUsuario = $usuarioRolControlador->consultarRolesUsuarioIdUsuarioControlador($_POST['idUsuario']);
}

$usuarioRolControlador->registrarRolUsuarioControlador();
 
$checked = '';
$disabled = '';
?>
<div  class="bg-image" 
     style="background-image: url('https://media.istockphoto.com/vectors/scientific-molecule-background-for-medicine-science-technology-or-vector-id1127139780');
            height: 100vh"> 
<div class="row">
	<div class="col-3"></div>

	<div class="col-6 mt-5 mb-5">
		<h3>QUIMICA<h3>
		<form class="form" method="post">
			<label for="" class="form-label">correo </label>
			<input type="text" class="form-control" name="usuario" placeholder="correo electronico">
		     <br>
			<label for="" class="form-label">contraseña</label>
			<input type="text" class="form-control" name="usuario" placeholder="completo">
		
			<br>
				<?php 

				foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
					if (isset($_POST['idUsuario']) && $valueUsuario['idUsuario'] == $_POST['idUsuario']) {
						print '<option value="'.$valueUsuario['idUsuario'].'" selected>'.$valueUsuario['usuarioLogin'].'</option>';
					}
					else{
						print '<option value="'.$valueUsuario['idUsuario'].'">'.$valueUsuario['usuarioLogin'].'</option>';
					}					
				}

				?>
			</select>
			<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
				<?php 
				foreach ($datosRol as $keyRol => $valueRol) {
					if (isset($datosRolUsuario)) {
						foreach ($datosRolUsuario as $keyRolUsuario => $valueRolUsuario) {
							if ($valueRol['idRol'] == $valueRolUsuario['idRol'] && $valueRolUsuario['usuarioRolEstado'] == "true") {
								$checked = ' checked';
								break;
							}
							else{
								$checked = '';
								$disabled = '';
							}
						}
					}
					else{
						$checked = '';
						$disabled = '';
					}
					print '<input name="idRoles[]" value="'.$valueRol['idRol'].'" type="checkbox" class="btn-check" id="btncheck'.$valueRol['idRol'].'" autocomplete="off"'.$checked. $disabled.'>';
					print '<label class="btn btn-outline-primary" for="btncheck'.$valueRol['idRol'].'"'.$checked.$disabled.'>'.$valueRol['rolNombre'].'</label>';
				}

				?>
			</div>
			<button type="submit" name="regRolUsuario" class="btn btn-primary mt-5">ingresar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok10'){
				print "Perfil Usuario Registrado Correctamente";
			}
			elseif($_GET['action'] == 'fa10'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}
