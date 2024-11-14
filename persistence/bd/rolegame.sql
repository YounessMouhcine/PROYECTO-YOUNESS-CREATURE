CREATE SCHEMA IF NOT EXISTS `rolegame` DEFAULT CHARACTER SET utf8;
USE `rolegame`;

CREATE TABLE IF NOT EXISTS `creature` (
  `IdCreature` INT(110) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Description` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Avatar` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AttackPower` INT(11) DEFAULT NULL,
  `LifeLevel` INT(11) DEFAULT NULL,
  `Weapon` VARCHAR(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`IdCreature`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



