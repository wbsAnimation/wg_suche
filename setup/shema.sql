-- MySQL Script generated by MySQL Workbench
-- Fri Feb  2 14:46:35 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tool
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `wg_suche` ;

-- -----------------------------------------------------
-- Schema tool
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wg_suche` DEFAULT CHARACTER SET utf8 ;
USE `wg_suche` ;

-- -----------------------------------------------------
-- Table `wg_suche`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wg_suche`.`users` ;

CREATE TABLE IF NOT EXISTS `wg_suche`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(2500) NULL,
  `lastname` VARCHAR(2500) NULL,
  `email` VARCHAR(2500) NULL,
  `password` VARCHAR(2500) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
