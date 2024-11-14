<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '\..\..\..\..\persistence\DAO\CampeonDAO.php');
require_once(dirname(__FILE__) . '\..\..\..\models\Campeon.php');

// Analize session
require_once(dirname(__FILE__) . '\..\..\..\..\utils\SessionUtils.php');
//Compruebo que me llega por GET el parámetro
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $campeonDAO = new CampeonDAO();
    $campeon = $campeonDAO->selectById($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detalles Criatura</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>
<body>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="../../../../assets/img/logo.png" alt="Logo Heroes" height="40" class="me-2">
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="user/CrearCriatura.php">Editar una criatura</a>
            </li>';
        </ul>
      </div>
    </div>
  </nav>

<div class="col-md-4 mb-4">
    <div class="card p-2">
        <div class="d-flex align-items-start">
            <img src="<?php echo $campeon->getAvatar() ?>" class="w-25" alt="Criatura">
            <div class="card-body">
                <h5 class="card-title"><?php echo $campeon->getName() ?></h5>
                <p class="card-text"><?php echo $campeon->getDescription()?></p>
                <p class="card-text"><?php echo $campeon->getAttackPower() ?> de potencia ataque</p>
                <p class="card-text"><?php echo $campeon->getLifeLevel() ?> puntos de vida</p>
                <p class="card-text">Utiliza <?php echo $campeon->getWeapon() ?></p>
            </div>
        </div> 
    </div>
</div>

    <footer class="">
        Cuatrovientos  - Desarrollo de Interfaces
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>

