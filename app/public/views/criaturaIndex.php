<?php
require_once(dirname(__FILE__) . '/../../controllers/offer/CampeonController.php');
$campeonController = new CampeonController();
$campeones = $campeonController->readAction();
session_start();
include 'users.php'; // Incluye el archivo con la lista de usuarios

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["tipo"] == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        // Autenticación exitosa
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];
        $role = $_SESSION['role'];
    } else {
        $error = "Credenciales incorrectas";
    }
}else{
    $role = "public";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comunidad de usuarios de Heroes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="../../../assets/img/logo.png" alt="Logo Heroes" height="40" class="me-2">
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <?php 
            if ($role == "admin"){
                echo '<li class="nav-item">
                            <a class="nav-link" href="user/CrearCriatura.php">Crear una criatura</a>
                      </li>';
            }
             ?>  
        </ul>
      </div>
      <form method="POST" class="d-flex" id="form-login">
          <?php 
          if (isset($error)): 
              ?> 
            <p><?php echo $error; ?></p> 
                <?php endif; ?>
          <input type="hidden" name="tipo" value="login">
          <input class="form-control" type="text" name="username" placeholder="User" aria-label="User" id="input-login">
          <input class="form-control" type="password" name="password" placeholder="Password" aria-label="Password" id="input-pass">
          <button class="btn btn-outline-success d-flex align-items-center" type="submit" id="btn-login"><i class="bi bi-door-open px-1"></i> Acceder</button>
      </form>
    </div>
  </nav>

  <!-- Imagen Principal -->
  <div class="container my-4">
    <div class="row">
      <div class="col-md-8">
        <img src="../../../assets/img/portada.jpg" alt="Banner Heroes V" class="img-fluid w-100">
      </div>
      <div class="col-md-4 d-flex align-items-center justify-content-center bg-light">
        <div class="text-center">
          <h2>Comunidad de usuarios de Heroes</h2>
          <p>La aventura comienza aquí, en tu navegador</p>
          <button class="btn btn-primary">Juega ahora!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Sección de Criaturas -->
  <div class="container my-4">
   <div class="row">
      <?php
            for ($i = 0; $i < sizeof($campeones); $i += 3) {
                ?>
                 
                    <?php
                    for ($j = $i; $j < ($i + 3); $j++) {
                        if (isset($campeones[$j])) {
                            if ($role == "admin"){
                                echo $campeones[$j]->adminCriaturaCard();
                            }else{
                                echo $campeones[$j]->noadminCriaturaCard();
                            }
                        }
                    }
                    ?>
                 
                <?php
                
            }
            ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>





    





