-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema portfolio2020
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema portfolio2020
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `portfolio2020` ;
USE `portfolio2020` ;

-- -----------------------------------------------------
-- Table `portfolio2020`.`adminpres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio2020`.`adminpres` (
  `idadminpres` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idadminpres`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio2020`.`categorie_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio2020`.`categorie_image` (
  `idcategorie` INT NOT NULL AUTO_INCREMENT,
  `nom_cat_img` VARCHAR(50) NOT NULL,
  `adminpres_idadminpres` TINYINT(2) NOT NULL,
  PRIMARY KEY (`idcategorie`),
  INDEX `fk_categorie-image_adminpres1_idx` (`adminpres_idadminpres` ASC) VISIBLE,
  CONSTRAINT `fk_categorie-image_adminpres1`
    FOREIGN KEY (`adminpres_idadminpres`)
    REFERENCES `portfolio2020`.`adminpres` (`idadminpres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio2020`.`galerie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio2020`.`galerie` (
  `idgalerie` INT NOT NULL AUTO_INCREMENT,
  `nomfichier` VARCHAR(50) NOT NULL,
  `chemin` VARCHAR(250) NULL,
  `adminpres_idadminpres` TINYINT(2) NOT NULL,
  `categorie_idcategorie` INT NOT NULL,
  `categorie_adminpres_idadminpres` TINYINT(2) NOT NULL,
  `categorie_emploi_idemploi` INT NOT NULL,
  `categorie` VARCHAR(100) NULL,
  PRIMARY KEY (`idgalerie`),
  INDEX `fk_galerie_adminpres_idx` (`adminpres_idadminpres` ASC) VISIBLE,
  INDEX `fk_galerie_categorie1_idx` (`categorie_idcategorie` ASC, `categorie_adminpres_idadminpres` ASC, `categorie_emploi_idemploi` ASC) VISIBLE,
  CONSTRAINT `fk_galerie_adminpres`
    FOREIGN KEY (`adminpres_idadminpres`)
    REFERENCES `portfolio2020`.`adminpres` (`idadminpres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_galerie_categorie1`
    FOREIGN KEY (`categorie_idcategorie`)
    REFERENCES `portfolio2020`.`categorie_image` (`idcategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio2020`.`categorie_liens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio2020`.`categorie_liens` (
  `idcategorie-liens` INT NOT NULL AUTO_INCREMENT,
  `nom_cat_liens` TINYINT NOT NULL,
  `adminpres_idadminpres` TINYINT(2) NOT NULL,
  PRIMARY KEY (`idcategorie-liens`),
  INDEX `fk_categorie-liens_adminpres1_idx` (`adminpres_idadminpres` ASC) VISIBLE,
  CONSTRAINT `fk_categorie-liens_adminpres1`
    FOREIGN KEY (`adminpres_idadminpres`)
    REFERENCES `portfolio2020`.`adminpres` (`idadminpres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio2020`.`liens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio2020`.`liens` (
  `idliens` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(250) NOT NULL,
  `description` TEXT(2000) NULL,
  `adminpres_idadminpres` TINYINT(2) NOT NULL,
  `nom_site` VARCHAR(50) NOT NULL,
  `categorie-liens_idcategorie_liens` INT(11) NOT NULL,
  PRIMARY KEY (`idliens`),
  INDEX `fk_liens_categorie-liens1_idx` (`categorie-liens_idcategorie_liens` ASC) VISIBLE,
  CONSTRAINT `fk_liens_adminpres1`
    FOREIGN KEY (`adminpres_idadminpres`)
    REFERENCES `portfolio2020`.`adminpres` (`idadminpres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_liens_categorie-liens1`
    FOREIGN KEY (`categorie-liens_idcategorie_liens`)
    REFERENCES `portfolio2020`.`categorie_liens` (`idcategorie-liens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio2020`.`liste_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio2020`.`liste_contact` (
  `idliste_contact` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `message` VARCHAR(2000) NOT NULL,
  `adminpres_idadminpres` TINYINT(2) NOT NULL,
  PRIMARY KEY (`idliste_contact`),
  INDEX `fk_liste-contact_adminpres1_idx` (`adminpres_idadminpres` ASC) VISIBLE,
  CONSTRAINT `fk_liste-contact_adminpres1`
    FOREIGN KEY (`adminpres_idadminpres`)
    REFERENCES `portfolio2020`.`adminpres` (`idadminpres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
