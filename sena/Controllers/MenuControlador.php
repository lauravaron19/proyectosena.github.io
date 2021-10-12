<?php 

class MenuControlador {
	
	function __construct() {
		$this->MenuModelo = new MenuModelo();
	}


	public function registrarMenuControlador(){
		if (isset($_POST['regMenu'])) {
			$respuesta = $this->MenuModelo->registrarMenuModelo($_POST['nombreMenu']);
			if($respuesta){
				header('location:index.php?action=ok7');
			}
			else{
				header('location:index.php?action=fa7');
			}
		}
	}


	public function consultarMenuControlador(){
		if (isset($_POST['btnBuscarMenu'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		}
		else{
			$rolBuscado = '';
		}

		$datosMenu = $this->MenuModelo->consultarMenuModelo($rolBuscado);
		return $datosMenu;
	}


	public function consultarMenuIdControlador(){
		if (isset($_GET['id'])) {
			$datosMenu = $this->MenuModelo->consultarMenuIdModelo($_GET['id']);
			return $datosMenu;
		}
	}


	public function actualizarMenuControlador(){
		if(isset($_POST['updMenu'])){

			$datosMenu = array('menuNombre' => $_POST['menuNombre'], 
				'menuEstado' => $_POST['menuEstado'],
				'id' => $_GET['id']);

			$respuesta = $this->MenuModelo->actualizarMenuModelo($datosMenu);
			if ($respuesta) {
				header('location:index.php?action=ok13&id='.$_GET['id']);
			}
			else{
				header('location:index.php?action=fa13&id='.$_GET['id']);
			}
		}
	}


	public function eliminarMenuControlador(){
		if (isset($_GET['id'])) {
			$respuesta = $this->MenuModelo->eliminarMenuModelo($_GET['id']);
			if($respuesta){
				header('location:index.php?action=ok9');
			}
			else{
				header('location:index.php?action=fa9');
			}
		}
	}
}