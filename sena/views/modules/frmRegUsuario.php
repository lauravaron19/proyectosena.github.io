<?php 
$usuarioControlador = new UsuarioControlador();
$registrarUsuario = $usuarioControlador->registrarUsuarioControlador();

$listarPersonasControlador = new PersonaControlador();
$listarPersona = $listarPersonasControlador->listarPersonasControlador();
	#var_dump($listarPersona);
?>
<div  class="bg-image" style="height: auto; background-image: url('https://media.istockphoto.com/vectors/scientific-molecule-background-for-medicine-science-technology-or-vector-id1127139780');">      

<div class="row">
	<div class="col-4">
		
	</div>
	<div class="col-4 mt-5">
		<h1>Registrar Usuarios</h1>
		<form method="post" class="form">
			<label>NOMBRE</label>
			<input type="text" class="form-control" name="usuario" placeholder="Nombre completo">
			<br>
			<label>APELLIDO </label>
			<input type="text" class="form-control" name="usuario" placeholder="apellido completo">
			<br>
			<label>EMAIL</label>
			<input type="text" class="form-control" name="usuario" placeholder="EMAIL">
			<br>
			<label>CONTRASEÑA</label>
			<input type="password" class="form-control" name="password" placeholder="Contraseña">
			<br>
			<label>eleccion</label>
			<select name="idPersonas" class="form-control">
				<option value="">profesor</option>
				<option value="">estudiante</option>

				<?php 
				foreach ($listarPersona as $key => $value) {
					print '
					<option value="'.$value['idPersona'].'">'.$value['personaNombres'].' '.$value['personaDocumento'].'</option>';
				}
				?>
			</select>
			
			<button type="submit" name="regUsuario" class="btn btn-primary mt-3">Registrar Usuario</button>	 
		</form>		
				<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok5'){
				print "Usuario Registrada Correctamente";
			}
			elseif($_GET['action'] == 'fa5'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

