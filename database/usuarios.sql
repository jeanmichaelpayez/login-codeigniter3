-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET utf8mb3 ;
USE `usuarios` ;

-- -----------------------------------------------------
-- Table `usuarios`.`permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`permisos` (
  `idPermisos` INT NOT NULL,
  `PermisosNombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idPermisos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `usuarios`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`roles` (
  `idtable1` INT NOT NULL AUTO_INCREMENT,
  `rolname` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idtable1`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `usuarios`.`rolespermisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`rolespermisos` (
  `roles_idtable1` INT NOT NULL,
  `Permisos_idPermisos` INT NOT NULL,
  INDEX `fk_rolesPermisos_roles1_idx` (`roles_idtable1` ASC),
  INDEX `fk_rolesPermisos_Permisos1_idx` (`Permisos_idPermisos` ASC),
  CONSTRAINT `fk_rolesPermisos_Permisos1`
    FOREIGN KEY (`Permisos_idPermisos`)
    REFERENCES `usuarios`.`permisos` (`idPermisos`),
  CONSTRAINT `fk_rolesPermisos_roles1`
    FOREIGN KEY (`roles_idtable1`)
    REFERENCES `usuarios`.`roles` (`idtable1`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `usuarios`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `contrasena` VARCHAR(45) NULL DEFAULT NULL,
  `roles_idtable1` INT NOT NULL,
  PRIMARY KEY (`idusuarios`),
  INDEX `fk_usuarios_roles_idx` (`roles_idtable1` ASC),
  CONSTRAINT `fk_usuarios_roles`
    FOREIGN KEY (`roles_idtable1`)
    REFERENCES `usuarios`.`roles` (`idtable1`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
