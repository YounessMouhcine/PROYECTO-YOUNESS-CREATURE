<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '\..\conf\PersistentManager.php');


class CampeonDAO {

    //Se define una constante con el nombre de la tabla
    const CAMPEON_TABLE = 'creature';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . CampeonDAO::CAMPEON_TABLE;
        $result = mysqli_query($this->conn, $query);
        $campeones= array();
        while ($campeon = mysqli_fetch_array($result)) {

            $Campeon = new Campeon();
            $Campeon->setId($campeon["IdCreature"]);
            $Campeon->setName($campeon["Name"]);
            $Campeon->setDescription($campeon["Description"]);
            $Campeon->setAvatar($campeon["avatar"]);
            $Campeon->setAttackPower($campeon["attackPower"]);
            $Campeon->setLifeLevel($campeon["lifeLevel"]);
            $Campeon->setWeapon($campeon["weapon"]);
            
            array_push($campeones, $Campeon);
        }
        return $campeones;
    }

    public function insert($campeon) {
        $query = "INSERT INTO " . CampeonDAO::CAMPEON_TABLE.
                " (Name, Description, avatar, attackPower, lifeLevel,weapon) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        
        $name = $campeon->getName();
        $description = $campeon->getDescription();
        $avatar = $campeon->getAvatar();
        $attackPower = $campeon->getAttackPower();
        $LifeLevel = $campeon->getLifeLevel();
        $weapon = $campeon->getWeapon();
        
        mysqli_stmt_bind_param($stmt, 'sssiis', $name, $description, $avatar,$attackPower,$LifeLevel,$weapon);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT Name, Description, avatar, attackPower, lifeLevel,weapon FROM " . CampeonDAO::CAMPEON_TABLE . " WHERE IdCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $description, $avatar,$attackPower,$lifeLevel,$weapon);

        $campeon = new Campeon();
        while (mysqli_stmt_fetch($stmt)) {
            $campeon->setId($id);
            $campeon->setName($name);
            $campeon->setDescription($description);
            $campeon->setAvatar($avatar);
            $campeon->setAttackPower($attackPower);
            $campeon->setLifeLevel($lifeLevel);
            $campeon->setWeapon($weapon);
       }

        return $campeon;
    }

    public function editar($campeon) {
        $query = "UPDATE " . CampeonDAO::CAMPEON_TABLE .
                " SET Name=?, Description=?, avatar=?, attackPower=?, lifeLevel=?, weapon=? "
                . " WHERE IdCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $campeon->getName();
        $description = $campeon->getDescription();
        $avatar = $campeon->getAvatar();
        $attackPower = $campeon->getAttackPower();
        $LifeLevel = $campeon->getLifeLevel();
        $weapon = $campeon->getWeapon();
        $idC = $campeon->getId();
        mysqli_stmt_bind_param($stmt, 'sssddii', $name, $description, $avatar, $attackPower, $LifeLevel,$weapon, $idC);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . CampeonDAO::CAMPEON_TABLE . " WHERE IdCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

        
}

?>
