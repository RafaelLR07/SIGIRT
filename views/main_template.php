<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Riesgo de trabajo</title>
	<link rel="stylesheet" type="text/css" href="views/includes/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="views/includes/css/styles.css">
	<link rel="icon" type="image/png" href="views/includes/images/icon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<style type="text/css">
		.encabezado:hover{
   			 font-size: 18px;

  		}
  		.logo-header{
  			width: 390px;
  			height: 150px;
  			margin: 4px;
  			padding:4px;

  		}
	</style>
</head>
<body>
	<header>
		<img class="logo-header" src="views/includes/images/logo.jpg" alt="">	
	</header>
	
	<?php 
    session_start();
    $tipoUsuario = "";
    $name = "";

      if(!$_SESSION["validar"]){

         header("Location: index.php");

      }else{
        $name = $_SESSION['nom_usuario'];
        $tipoUsuario = $_SESSION['tipoUsuario'];
      }

    
    switch ($tipoUsuario) {
          case 'Admin':
            include "modules/Pagle/nav_bar_root.php";
          
            break;

          case 'Usuario':
              include "modules/Pagle/nav_bar_user.php";
            break;

          case 'Paciente':
            include "modules/Pagle/nav_bar_pac.php";
            break;

          case 'Medico':
            include "modules/Pagle/nav_bar_doc.php";
            break;
          
          default:
            # code...
            break;
          }
	
	 ?>
	
	<div class="container">
		<?php 
			$main_controller = new main_controller();  
			echo $main_controller->urlsController();
		 ?>
	</div>



  <!-- Bootstrap's JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  <script type="text/javascript" src="views/includes/js/basics.js"></script>
  <script type="text/javascript" src="views/includes/js/jquery.knob.js"></script>

	<script>
    $(document).ready(function() {
      //$(".dial").knob();
      $('.dial').knob({
        'min':0,
        'max':100,
        'width':210,
        'height':210,
        'displayInput':true,
        'fgColor':"#d24e4c",
        'release':function(v) {$("p").text(v);},
        'readOnly':true,
        'change': function (v) { console.log(v); },
		 draw: function () {
  				 $(this.i).val(this.cv + '%');
  				}
      });

     
    });
  </script>

</body>

</html>