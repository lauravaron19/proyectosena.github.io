<?php 

class RolUsuarioControlador {
	
	function __construct() {
		$this->rolUsuarioModelo = new RolUsuarioModelo();
		$this->usuarioControlador = new UsuarioControlador();
		$this->rolControlador = new RolControlador();
	}

	public function registrarRolUsuarioControlador() {
		if (isset($_POST['regRolUsuario'])) {
			if (isset($_POST['idRoles']) && isset($_POST['idUsuario'])) {
				for ($i = 0; $i < count($_POST['idRoles']) ; $i++) { 
					$datoRolUsuario = $this->consultarRolUsuarioIdRolControlador($_POST['idRoles'][$i], $_POST['idUsuario']);
					if($datoRolUsuario != null){
						if ($datoRolUsuario[0]['usuarioRolEstado'] == 'false') {
							$respuesta = $this->actualizarEstadoRolUsuarioIdControlador($datoRolUsuario[0]['idUsuarioRol'], 'true');
						}
					}
					else{
						$idRolUsuarioInsertar[] = $_POST['idRoles'][$i];
					}
				}
				if (isset($idRolUsuarioInsertar)) {
					$respuesta = $this->rolUsuarioModelo->registrarRolUsuarioModelo($_POST['idUsuario'],$idRolUsuarioInsertar);
					if ($respuesta) {
						header('location:index.php?action=ok10');
					}
					else{
						header('location:index.php?action=fa10');
					}
				}
			}
			else{
				header('location:index.php?action=fa10');
			}
		}
	}

	public function consultarRolesUsuarioIdUsuarioControlador($idUsuario){

		$datosRoles = $this->rolUsuarioModelo->consultarRolesUsuarioIdUsuarioModelo($idUsuario);
		return $datosRoles;
		
	}

	public function consultarRolUsuarioIdRolControlador($idRol, $idUsuario)	{
		$datosRolUsuario = $this->rolUsuarioModelo->consultarRolUsuarioIdRolModelo($idRol,$idUsuario);
		return $datosRolUsuario;
	}


	public function actualizarEstadoRolUsuarioIdControlador($idUsuarioRol, $estado){
		$respuesta = $this->rolUsuarioModelo->actualizarEstadoRolUsuarioIdModelo($idUsuarioRol,$estado);
		return $respuesta;
	}

	public function cambiarEstadoRolUsuarioControlador($idUsuario, $estado){
		$respuesta = $this->rolUsuarioModelo->cambiarEstadoRolUsuarioModelo($idUsuario, $estado);
		return $respuesta;
	}

	public function actualizarRolUsuarioControlador(){
		if(isset($_POST['updRolUsuario'])){
			if(isset($_POST['idRolUsuario'])){
				$respuesta = $this->cambiarEstadoRolUsuarioControlador($_GET['id'], 'false');
				if(count($_POST['idRolUsuario']) > 0){
					for ($i = 0; $i < count($_POST['idRolUsuario']); $i++) {
						$respuesta = $this->actualizarEstadoRolUsuarioIdControlador($_POST['idRolUsuario'][$i], 'true');
					}
				}
				if ($respuesta) {
					header('location:index.php?action=ok11&id'.$_GET['id']);
				}
				else{
					header('location:index.php?action=fa11&id'.$_GET['id']);
				}
			}
		}
	}

}