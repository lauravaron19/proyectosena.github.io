<?php 
$rolMenuControlador = new RolMenuControlador();
$datosRoles = $rolMenuControlador->rolControlador->consultarRolControlador();
$datosMenu = $rolMenuControlador->menuControlador->consultarMenuControlador();
$rolMenuControlador->registrarRolMenuControlador();

if (isset($_POST['idRol'])) {
	$datosRolMenu = $rolMenuControlador->consultarRolMenuIdControlador();
}
$checked = '';
$disabled = '';
?>
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<h3>Asignar Menu Principal a Perfiles</h3>
		<form class="form" method="post">
			<!--ZONA DE PERFILES O ROLES -->
			<label for="" class="form-label">Nombres del Perfil</label>
			<select name="idRol" onchange="this.form.submit()" id="" class="form-select">
				<option value="">Seleccione un Perfil</option>
				<?php 
				foreach ($datosRoles as $keyRol => $valueRol) {
					if (isset($_POST['idRol']) && $valueRol['idRol'] == $_POST['idRol']) {
						print '<option value="'.$valueRol['idRol'].'" selected>'.$valueRol['rolNombre'].'</option>';
					}
					else{
						print '<option value="'.$valueRol['idRol'].'">'.$valueRol['rolNombre'].'</option>';
					}					
				}

				?>
			</select>
			<!-- ZONA BOTONERIA DE MENUS PRINCIPALES -->
			<div class="btn-group mt-5" role="group" aria-label="Basic checkbox toggle button group">
				<?php 
				foreach ($datosMenu as $keyMenu => $valueMenu) {
					if (isset($datosRolMenu)) {
						foreach ($datosRolMenu as $keyRolMenu => $valueRolMenu) {
							
							if ($valueMenu['idMenu'] == $valueRolMenu['idMenu'] && $valueRolMenu['rolMenuEstado'] == "activo") {
								$checked = ' checked';
								$disabled = ' disabled';
								break;
							}
							else{
								$checked = '';
								$disabled = '';
							}
						}
					}
					print '<input name="idMenu[]" value="'.$valueMenu['idMenu'].'" type="checkbox" class="btn-check" id="btncheck'.$valueMenu['idMenu'].'" autocomplete="off"'.$checked. $disabled.'>';
					print '<label class="btn btn-outline-primary" for="btncheck'.$valueMenu['idMenu'].'"'.$checked.$disabled.'>'.$valueMenu['menuNombre'].'</label>';
				}

				?>
			</div>

			<br>
			
			<button type="submit" name="regRolMenu" class="btn btn-primary mt-5">Registrar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok14'){
				print "Menu Perfil Registrado Correctamente";
			}
			elseif($_GET['action'] == 'fa14'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConRolUsuario">Consultar Perfiles Por Usuario</a>
	</div>
	<div class="col-3"></div>
</div>
