<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="inicio">INICIO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="frmRegUsuario">Registrar </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="frmRegRolUsuario">ingresar</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php 
  $navBar = new NavBarControlador();
  $datosmenu = $navBar->menuControlador->consultarMenuControlador();
?>

<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
  
  <ul class="nav nav-pills">
    <?php 
    foreach ($datosmenu as $keyMenu => $valueMenu) {
      print '<li class="nav-item dropdown">';
      print '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">'.$valueMenu['menuNombre'].'</a>';
      
      $datosOpcion = $navBar->opcionMenuControlador->consultarOpcionesMenuIdControlador($valueMenu['idMenu']);

      print '<ul class="dropdown-menu">';
      foreach ($datosOpcion as $keyOpcion => $valueOpcion) {
        print '<li><a class="dropdown-item" href="'.$valueOpcion['opcionMenuEnlace'].'">'.$valueOpcion['opcionMenuNombre'].'</a></li>';
      }
      print '</ul></li>';
    }
    ?>
  </ul>
</nav>