<?php 
	$menuControlador = new MenuControlador();
	$datosMenu = $menuControlador->consultarMenuControlador();
	///var_dump($datosMenu);
?>

<div class="col-3"></div>
<div class="col-6">
<div class="row">
	<div class="col">
		<h1>Consultar Menu Principal</h1>
	</div>	
</div>

<div class="row">
	<div class="col">
		<form method="post" class="form">
			<div class="row">
			<div class="col-4">
			<input type="text" name="datoBusqueda" class="form-control" style="width: auto;">
			</div>
			<div class="col">
			<input type="submit" name="btnBuscarMenu" value="🔍" class="btn btn-primary">
			</div>
			</div>
		</form>
	</div>	
</div>

<div class="row">
	<div class="col">
		<table class="table table-striped">
			<thead>
				<th>Nombre del Perfil</th>
				<th>Estado del Perfil</th>
				<th colspan="2">Opciones</th>
			</thead>
			<tbody>
				<?php 
					foreach ($datosMenu as $keyRol => $valueRol) {
						if ($valueRol['menuEstado'] == 'true') {
							$estadoMenu = "Activo";
						}
						else{
							$estadoMenu = "Inactivo";
						}
						print '<tr>';
						print '<td>'.$valueRol['menuNombre'].'</td>';
						print '<td>'.$estadoMenu.'</td>';
						print '<td><a href="index.php?action=frmEditMenu&id='.$valueRol['idMenu'].'">Editar</a></td>';
						print '<td><a href="index.php?action=frmDelMenu&id='.$valueRol['idMenu'].'">Eliminar</a></td>';
						print "</tr>";
					}
				?>				
			</tbody>
		</table>
	</div>
</div>
</div>
<div class="col-3"></div>