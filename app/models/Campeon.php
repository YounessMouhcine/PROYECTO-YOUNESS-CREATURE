<?php

class Campeon {

    private $id;
    private $name;
    private $description;
    private $avatar;
    private $attackPower;
    private $lifeLevel;
    private $weapon;
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getAttackPower() {
        return $this->attackPower;
    }

    public function getLifeLevel() {
        return $this->lifeLevel;
    }

    public function getWeapon() {
        return $this->weapon;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setAvatar($avatar): void {
        $this->avatar = $avatar;
    }

    public function setAttackPower($attackPower): void {
        $this->attackPower = $attackPower;
    }

    public function setLifeLevel($lifeLevel): void {
        $this->lifeLevel = $lifeLevel;
    }

    public function setWeapon($weapon): void {
        $this->weapon = $weapon;
    }

    
    
    function adminCriaturaCard() {
        $result = '<div class="col-md-4 mb-4">';
        $result .= '<div class="card p-2">';
        $result .= '<div class="d-flex align-items-start">'; // Imagen de ejemplo
        $result .= '<img src="' . $this->getAvatar() . '" class="w-25" alt="Criatura">';
        $result .= '<div class="card-body">';
        $result .= '<h5 class="card-title">' . $this->getName() . '</h5>';
        $result .= '<p class="card-text">' . $this->getDescription() . '</p>';
        $result .= '<div class="card-footer d-flex justify-content-around">';
        $result .= '<a href="../views/user/DetallesCriatura.php?id=' . $this->getId() . '" class="btn btn-secondary">Mas info</a>';
        $result .= '<a href="../views/user/ModificarCriatura.php?id=' . $this->getId() . '" class="btn btn-warning">Modificar</a>';
        $result .= '<a href="../../controllers/offer/CampeonController.php?id=' . $this->getId() . '" class="btn btn-danger">Eliminar</a>';
        $result .= '</div>';
        $result .= '</div>'; 
        $result .= '</div>'; 
        $result .= '</div>';
        $result .= '</div>';
        return $result;
    }
    function noadminCriaturaCard() {
        $result = '<div class="col-md-4 mb-4">';
        $result .= '<div class="card p-2">';
        $result .= '<div class="d-flex align-items-start">'; // Imagen de ejemplo
        $result .= '<img src="' . $this->getAvatar() . '" class="w-25" alt="Criatura">';
        $result .= '<div class="card-body">';
        $result .= '<h5 class="card-title">' . $this->getName() . '</h5>';
        $result .= '<p class="card-text">' . $this->getDescription() . '</p>';
        $result .= '<div class="card-footer d-flex justify-content-around">';
        $result .= '<a href="../views/user/DetallesCriatura.php?id=' . $this->getId() . '" class="btn btn-secondary">Mas info</a>';
        $result .= '</div>';
        $result .= '</div>'; 
        $result .= '</div>'; 
        $result .= '</div>';
        $result .= '</div>';
        return $result;
    }
    
}
