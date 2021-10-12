<?php 
	$usuarioControlador = new UsuarioControlador();
	$datosUsuario = $usuarioControlador->consultarUsuarioControlador();

 ?>

 <div class="row">
 	<div class="col"></div>
 		<h1>Consultar Usuario</h1>
 </div>

 <div class="row"></div>
 	<div class="col"></div> 
 		<form method="post" class="form">
 			<input type="text" name="datoBusqueda" class="form-control">
 			<input type="submit" name="btnBuscarUsuario" value="Buscar" class="btn btn-primary">
 		</form>

<div class="row">
	<div class="col">
		<table class="table"table table-striped>
			<thead>
				<th>Correo Electronico</th>
				<th>Contraseña</th>
				<th>Estado</th>
				<th colspan="2">opciones</th>
			</thead>
			<tbody>
				<?php 

					foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
						print '<tr>';
						print '<td>'.$valueUsuario['usuarioLogin'].'</td>';
						print '<td>'.$valueUsuario['usuarioPassword'].'</td>';
						print '<td>'.$valueUsuario['usuarioEstado'].'</td>';

						print '<td><a href="index.php?action=frmEditUsuario&id='.$valueUsuario['idUsuario'].'">Editar</a></td>';

						print '<td><a href="index.php?action=frmDelUsuario&id='.$valueUsuario['idUsuario'].'">Eliminar</a></td>';

						print "</tr>";

					}	
					
				 ?>
			</tbody>
		</table>
	</div>
</div>