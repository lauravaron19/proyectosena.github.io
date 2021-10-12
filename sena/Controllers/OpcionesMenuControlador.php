<?php 

class OpcionesMenuControlador {
	
	function __construct()	{
		$this->menuControlador = new MenuControlador();
		$this->opcionMenuModelo = new OpcionesMenuModelo();
	}


	public function registrarOpcionMenuControlador() {
		if (isset($_POST['regOpcionMenu'])) {
			$datoOpcionMenu = array('idMenu' => $_POST['idMenu'],
				'opcionMenuNombre' => $_POST['opcionMenuNombre'], 
				'opcionMenuEnlace' => $_POST['opcionMenuEnlace']);
			$respuesta = $this->opcionMenuModelo->registrarOpcionMenuModelo($datoOpcionMenu);
			if ($respuesta){
				header('location:index.php?action=ok16');
			}
			else{
				header('location:index.php?action=fa16');
			}
		}
	}

	public function consultarOpcionesMenuIdControlador($idMenu){
		return $this->opcionMenuModelo->consultarOpcionesMenuIdModelo($idMenu);
	}
}