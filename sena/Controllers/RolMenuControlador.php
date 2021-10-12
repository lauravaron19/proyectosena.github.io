<?php 

class RolMenuControlador {
	
	function __construct()	{
		$this->rolControlador = new RolControlador();
		$this->menuControlador = new MenuControlador();
		$this->rolMenuModelo = new RolMenuModelo();
	}


	public function consultarRolMenuControlador() {
		$datosRolMenu = $this->rolMenuModelo->consultarRolMenuModelo();
		return $datosRolMenu;
	}


	public function consultarRolMenuIdControlador()	{
		if (isset($_POST['idRol'])) {
			$datosRolMenu = $this->rolMenuModelo->consultarRolMenuIdModelo($_POST['idRol']);
			return $datosRolMenu;
		}
	}


	public function registrarRolMenuControlador() {
		if (isset($_POST['regRolMenu'])) {
			//$this->rolMenuModelo->cambiarEstadoRolMenuIdRolModelo('Inactivo', $_POST['idRol']);
			$respuesta = $this->rolMenuModelo->registrarRolMenuModelo($_POST['idMenu'],$_POST['idRol']);
			if ($respuesta) {
				header('location:index.php?action=ok14');
			}
			else{
				header('location:index.php?action=fa14');
			}
		}
	}

}