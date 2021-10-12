<?php 
///////CONTROLADORES /////////////////////
require_once("Controllers/TemplateControlador.php");
require_once("Controllers/personaControlador.php");
require_once("Controllers/usuarioControlador.php");
require_once("Controllers/rolControlador.php");
require_once("Controllers/rolUsuarioControlador.php");
require_once("Controllers/MenuControlador.php");
require_once("Controllers/RolMenuControlador.php");
require_once("Controllers/OpcionesMenuControlador.php");
require_once("Controllers/NavBarControlador.php");




///////////MODELOS ///////////////////////
require_once("Models/TemplateModelo.php");
require_once("Models/PersonaModelo.php");
require_once("Models/usuarioModelo.php");
require_once("Models/RolModelo.php");
require_once("Models/RolUsuarioModelo.php");
require_once("Models/MenuModelo.php");
require_once("Models/RolMenuModelo.php");
require_once("Models/OpcionesMenuModelo.php");
require_once("Models/NavBarModelo.php");


$templateControlador = new templateControlador();
$templateControlador->cargarTemplate();

