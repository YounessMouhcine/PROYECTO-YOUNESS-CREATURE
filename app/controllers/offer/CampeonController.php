<?php
require_once(dirname(__FILE__) . '/../../../persistence/DAO/CampeonDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Campeon.php');
require_once(dirname(__FILE__) . '/../../../app/models/validations/ValidationsRules.php');

$_CampeonController = new CampeonController();

// Enrutamiento de las acciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["tipo"] == "crear") {
        $_CampeonController->createAction();
    } else if ($_POST["tipo"] == "editar") {
        $_CampeonController->editAction();
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    //Llamo que hace la edición contra BD
    $_CampeonController->deleteAction();
}

class CampeonController {

    /**
     * Parameterless constractor.
     */
    public function __construct() {
        
    }

    function readAction() {
        $campeonDAO = new CampeonDAO();
        return $campeonDAO->selectAll();
    }
    
    
    function createAction() {
        // Obtención de los valores del formulario y validación
        $name = ValidationsRules::test_input($_POST["name"]);
        $description = ValidationsRules::test_input($_POST["descripcion"]);
        $avatar = ValidationsRules::test_input($_POST["avatar"]);
        $attackPower = ValidationsRules::test_input($_POST["attackPower"]);
        $LifeLevel = ValidationsRules::test_input($_POST["LifeLevel"]);
        $weapon = ValidationsRules::test_input($_POST["weapon"]);

        // Creación de objeto auxiliar   
        $campeon = new Campeon();
        $campeon->setName($name);
        $campeon->setDescription($description);
        $campeon->setAvatar($avatar);
        $campeon->setAttackPower($attackPower);
        $campeon->setLifeLevel($LifeLevel);
        $campeon->setWeapon($weapon);
        //Creamos un objeto OfferDAO para hacer las llamadas a la BD
        $campeonDAO = new CampeonDAO();
        $campeonDAO->insert($campeon);

        header('Location: ../../public/views/criaturaIndex.php');
    }

    
    function editAction() {
        
        $Id = $_POST["idC"];
        $name = $_POST["name"];
        $description = $_POST["descripcion"];
        $avatar = $_POST["avatar"];
        $attackPower = $_POST["attackPower"];
        $LifeLevel = $_POST["LifeLevel"];
        $weapon = $_POST["weapon"];

        // Creación de objeto auxiliar   
        $campeon = new Campeon();
        $campeon->setId($Id);
        $campeon->setName($name);
        $campeon->setDescription($description);
        $campeon->setAvatar($avatar);
        $campeon->setAttackPower($attackPower);
        $campeon->setLifeLevel($LifeLevel);
        $campeon->setWeapon($weapon);
     
        $campeonDAO = new CampeonDAO();
        $campeonDAO->editar($campeon);

        header('Location: ../../public/views/criaturaIndex.php');
    }

    function deleteAction() {
        $id = $_GET["id"];

        $campeonDAO = new CampeonDAO();
        $campeonDAO->delete($id);

        header('Location: ../../public/views/criaturaIndex.php');
    }
}

?>