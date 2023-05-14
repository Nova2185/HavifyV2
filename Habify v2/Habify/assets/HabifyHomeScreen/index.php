<?php

  session_start();

    //Inicio de función para guardar los datos del hábito creado en la db
    function crearHabito($n, $t, $fi, $cp, $cs){
      $conn = mysqli_connect("localhost", "root", "avoc_ADO18", "habify_final");//En caso de que hagas la conexion a la base de datos tienes que ingresar los mismos valores pero en donde yo puse avoc_ADO18 va la contraseña de tu bd

      if($conn){
        $userId = $_SESSION["id"];
        $stmt = mysqli_prepare($conn, "INSERT INTO Registro_Habitos (IdUsuario, Nom_Habito, Categ_Habito, FechaInicio, ColorPrimario, ColorSecundario) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "isssss", $userId, $n, $t, $fi, $cp, $cs);
        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }

      else{
          echo "no se pudo conectar";
      }
    }//Fin de la función

    //Valores de la función que extrae del html
    if(isset($_POST["header-input"], $_POST["subheader-input"], $_POST["date-input"], $_POST["primary-color-input"], $_POST["secondary-color-input"])){
      // Validar y sanitizar los datos que recibimos del usuario
      $header = filter_var($_POST["header-input"], FILTER_SANITIZE_STRING);
      $subheader = filter_var($_POST["subheader-input"], FILTER_SANITIZE_STRING);
      $date = filter_var($_POST["date-input"], FILTER_SANITIZE_STRING);
      $primaryColor = filter_var($_POST["primary-color-input"], FILTER_SANITIZE_STRING);
      $secondaryColor = filter_var($_POST["secondary-color-input"], FILTER_SANITIZE_STRING);
  
      crearHabito($header, $subheader, $date, $primaryColor, $secondaryColor);
    }//fin del if


    //Inicio de función para mostrar la lista de los hábitos del usuario
    function listaHabitos(){
      $strHTML="";
      $conn = mysqli_connect("localhost", "root", "avoc_ADO18", "habify_final");

      if($conn){
          $userId = $_SESSION["id"];
          $strQ = "SELECT*from Registro_Habitos WHERE IdUsuario='$userId';";
          $r = $conn->query($strQ);

          if($r->num_rows >0){
              //Aqui se crean los span, cada span contiene un atributo de los hábitos (Nombre, Tipo, Fecha de inicio, Color Primario y Color Secundario)
              while ($f = $r->fetch_assoc()) {
                  $strHTML .= "<br/>"."<span id='Nombre_habito'>".$f["Nom_Habito"]."</span>"." ".//span del nombre con id='Nombre_habito'
                              "<span id='Tipo_habito'>".$f["Categ_Habito"]."</span>"." ".//span del tipo con id='Tipo_habito'
                              "<span id='Fecha_Inicio'>".$f["FechaInicio"]."</span>"." ".//span de la fecha inicio con id='Fecha_Inicio'
                              "<span id='Color_Primario'>".$f["ColorPrimario"]."</span>"." ".//span del color primario con id='Color_Primario'
                              "<span id='Color_Secundario'>".$f["ColorSecundario"]."</span>";//span del color secundario con id='Color_Secundario'
              }
          
          }

          else{
              $strHTML = "No hay registros";
          }
      }

      else{
          echo "no se pudo conectar";
      }

      mysqli_close($conn);
      return $strHTML;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/Popup.css">
   <title>Habify</title>
</head>
<body>
  <!-- Este es el contenido de la pagina -->
   <div class="app-container">
      <div class="app-header">
        <div class="app-header-left">
          <span class="app-icon"></span>
          <p class="app-name">Habify</p>
          <div class="search-wrapper">
            <input class="search-input" id="search-input" type="text" placeholder="Buscar Hábito">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
              <defs></defs>
              <circle cx="11" cy="11" r="8"></circle>
              <path d="M21 21l-4.35-4.35"></path>
            </svg>
          </div>
        </div>
        <div class="app-header-right">
          <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
          <button class="add-btn" title="Add New Project">
            <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" /></svg>
          </button>
          <button class="profile-btn">
            <!--<img src="img/Diego.JPG" />-->
            <span><?php echo $_SESSION["nombre"] ?></span>
            <span class="show-id" Style="Display:none;"><?php echo $_SESSION["id"] ?></span>
          </button>
        </div>
      </div>
      <div class="app-content">
        <div class="app-sidebar">
        </div>
        <div class="projects-section">
          <div class="projects-section-header">
            <p>Hábitos</p>
            <p class="time" id="Tiempo">Cargando...</p>
            <script src="js/tiempo.js"></script>
          </div>
          <div class="projects-section-line">
            <div class="projects-status">
              <div class="item-status">
                <span class="status-number" id="element1-count"></span>
                <span class="status-type">Hábitos en progreso</span>
              </div>
              <div class="item-status">
                <span class="status-number" id="element2-count"></span>
                <span class="status-type">Proximos a terminar!</span>
              </div>
              <div class="item-status">
                <span class="status-number" id="element3-count"></span>
                <span class="status-type">Total de hábitos</span>
              </div>
            </div>
            <div class="view-actions">
              <button class="view-btn list-view" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                  <line x1="8" y1="6" x2="21" y2="6" />
                  <line x1="8" y1="12" x2="21" y2="12" />
                  <line x1="8" y1="18" x2="21" y2="18" />
                  <line x1="3" y1="6" x2="3.01" y2="6" />
                  <line x1="3" y1="12" x2="3.01" y2="12" />
                  <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
              </button>
              <button class="view-btn grid-view active" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                  <rect x="3" y="3" width="7" height="7" />
                  <rect x="14" y="3" width="7" height="7" />
                  <rect x="14" y="14" width="7" height="7" />
                  <rect x="3" y="14" width="7" height="7" /></svg>
              </button>
            </div>
          </div>
          <div class="project-boxes jsGridView">
        <!-- Esto es el contenido de la pagina -->

        <!-- Esto es una caja -->    
        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #e9e7fd;">
            <div class="project-box-header">
              <span class="box-content-date">2023-04-30</span>
              <div class="more-wrapper">
                <button class="project-btn-more">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="12" cy="19" r="1" /></svg>
                </button>
              </div>
            </div>
            <div class="project-box-content-header">
              <p class="box-content-header">Comer Saludable</p>
              <p class="box-content-subheader">Estilo de vida</p>
              </div>
             <div class="box-progress-wrapper">
              <p class="box-progress-header">Progreso</p>
              <div class="box-progress-bar">
                <span class="box-progress" style="width: 10%; background-color: #4f3ff0"></span>
              </div>
              <p class="box-progress-percentage">10%</p>
            </div>
            <div class="project-box-footer">
              <div class="days-left" style="color: #4f3ff0;">
                17 Dias Restantes
              </div>
            </div>
          </div>
        </div>
        <!-- Esto es una caja --> 

        <!-- Esto es una segunda caja --> 
        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #e6c1ff;">
            <div class="project-box-header">
              <span class="box-content-date">Abril 30, 2023 </span>
              <div class="more-wrapper">
                <button class="project-btn-more">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="12" cy="19" r="1" /></svg>
                </button>
              </div>
            </div>
            <div class="project-box-content-header">
              <p class="box-content-header">Prueba</p>
              <p class="box-content-subheader">Prueba</p>
              </div>
             <div class="box-progress-wrapper">
              <p class="box-progress-header">Progreso</p>
              <div class="box-progress-bar">
                <span class="box-progress" style="width: 50%; background-color: #b881ff"></span>
              </div>
              <p class="box-progress-percentage">50%</p>
            </div>
            <div class="project-box-footer">
              <div class="days-left" style="color: #570091;">
                10 Dias Restantes
              </div>
            </div>
          </div>
        </div>
        <!-- Esto es una segunda caja -->

        <div id="HabitosNuevos-container"></div>

      </div>
    </div>
    </div>
    </div>
    <!-- Popup editar -->
<div class="overlay" id="popupOverlay" style="display: none;">
  <div class="popup">
    <h3>Editar Datos</h3>
    <input type="text" id="box-content-header-input" placeholder="Nuevo título">
    <input type="text" id="box-content-subheader-input" placeholder="Nuevo subencabezado">
    <input type="text" id="box-content-date-input" placeholder="Nueva fecha">
    <button id="saveBtn">Guardar</button>
  </div>
</div>
  <!-- Popup editar -->

  <!-- Popup Agregar-->
    <div id="popup2-container" class="popup2-container">
      <div class="popup2">
        <form action="index.php" method="post">
          <h3>Añadir Hábito</h3>
          <label for="header-input">Título del hábito:</label>
          <input type="text" id="header-input" name="header-input">
          <label for="subheader-input">Tipo de hábito:</label>
          <input type="text" id="subheader-input" name="subheader-input">
          <label for="date-input">Fecha de inicio:</label>
          <input type="date" id="date-input" name="date-input">
          <label label for="primary-color-input">Color Primario:</label>
          <input type="color" id="primary-color-input" name="primary-color-input">
          <label for="secondary-color-input">Color secundario:</label>
          <input type="color" id="secondary-color-input" name="secondary-color-input">
          <button id="add-project-btn">Añadir Hábito</button>
          <button id="cancel-btn">Cancelar</button>
        </form>
      </div>
    </div>

    <!-- Aqui se llama la funcion para listar los hábitos -->
    <div Style="Display:none;"><?php echo listaHabitos();?></div>

  <!-- Popup Agregar-->
    <script src="js/Buscar.js"></script>
    <script src="js/script.js"></script>
    <script src="js/CuentoDeHabitos.js"></script>
    <script src="js/boton3puntos.js"></script>
    <script src="js/AgregarHábito.js"></script>

    
</body>
</html>