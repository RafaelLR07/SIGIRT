
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
  
      <a class="navbar-brand" href="content.php?p=inicio"><img src="views/includes/images/icon.png" alt="not image" width="45" height="45"></a>

    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="content.php?p=inicio" class="encabezado">Inicio</a></li>
        <li class="dropdown">
          <a class="encabezado"  data-toggle="dropdown" href="#">Pacientes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="content.php?p=activos" class="encabezado">Activos</a></li>
            <li><a href="content.php?p=recha" class="encabezado">Rechazados</a></li>
            <li><a href="content.php?p=pendientes" class="encabezado">Pendientes</a></li>
            

          </ul>
        </li>
      
        <li><a href="content.php?p=profile" class="encabezado">Perfil</a></li>

        <!--<li><a href="content.php?p=navv" class="encabezado">Registrar Fr-02</a></li>-->

        <li><a href="content.php?p=output" class="encabezado">Cerrar sesión</a></li>

   
      </ul>
     
    </div>      
	
  </div>
</nav>