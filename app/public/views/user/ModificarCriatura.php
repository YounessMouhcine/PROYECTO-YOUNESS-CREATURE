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
    <title>Modificar Criatura</title>

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

<!-- FORMULARIO DE INSERCIÓN -->
  <form action="../../../controllers/offer/CampeonController.php" class="container" method="POST">
    <input type="hidden" class="form-control" id="id" name="idC" placeholder="id" value="<?php echo $campeon->getId() ?>">
    <div class="row p-3">
      <label for="name" class="col-2 col-form-label">
        Nombre
      </label>
      <div class="col-10">
        <input type="text" class="form-control" name="name" value= "<?php echo $campeon->getName() ?>" id="name" placeholder="Nombre" required>
      </div>
    </div>
    <div class="row p-3">
      <label for="description" class="col-2 col-form-label">Descripcion</label>
      <div class="col-10">
        <input type="text" class="form-control" id="descripcion" value= "<?php echo $campeon->getDescription() ?>" name="descripcion" placeholder="descripcion" required>
      </div>
    </div>
    <div class="row p-3">
      <label for="avatar" class="col-2 col-form-label">avatar</label>
      <div class="col-10">
        <textarea class="form-control" id="avatar" value= "<?php echo $campeon->getAvatar() ?>" name="avatar" style="height: 100px"
          placeholder="avatar" required></textarea>
      </div>
    </div>
    <div class="row p-3">
      <label for="attackP" class="col-2 col-form-label">attackPower</label>
      <div class="col-10">
        <input type="number" class="form-control" id="attackPower" value= "<?php echo $campeon->getAttackPower() ?>" name="attackPower" placeholder="attackPower" required>
      </div>
    </div>
    <div class="row p-3">
      <label for="lifeL" class="col-2 col-form-label">Life Level</label>
      <div class="col-10">
        <input type="number" class="form-control" id="LifeLevel" value= "<?php echo $campeon->getLifeLevel() ?>" name="LifeLevel" placeholder="Life Level" required>
      </div>
    </div>
    <div class="row p-3">
      <label for="weapon" class="col-2 col-form-label">Arma</label>
      <div class="col-10">
        <input type="text" class="form-control" id="weapon" value= "<?php echo $campeon->getWeapon() ?>" name="weapon" placeholder="weapon" required>
      </div>
    </div>
    

    <input type="hidden" name="tipo" value="editar">
    <div class="row p-3">
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-success" id="boton_crear">Editar</button>
      </div>
    </div>
  </form>
    <!-- FIN DEL FORMULARIO  -->

    <footer class="">
        Cuatrovientos  - Desarrollo de Interfaces
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>
