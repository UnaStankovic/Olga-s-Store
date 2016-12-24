-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Olga_Store
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Olga_Store
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Olga_Store` DEFAULT CHARACTER SET utf8 ;
USE `Olga_Store` ;

-- -----------------------------------------------------
-- Table `Olga_Store`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `name` VARCHAR(45) NULL,
  `surname` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `country` VARCHAR(45) NULL,
  `telephone` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Olga_Store`.`Privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`Privilege` (
  `id` CHAR(1) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Olga_Store`.`Has`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`Has` (
  `User_id` INT NOT NULL,
  `Privilege_id` INT NOT NULL,
  PRIMARY KEY (`User_id`, `Privilege_id`),
  INDEX `fk_Has_Privilege1_idx` (`Privilege_id` ASC),
  CONSTRAINT `fk_Has_User`
    FOREIGN KEY (`User_id`)
    REFERENCES `Olga_Store`.`User` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Has_Privilege1`
    FOREIGN KEY (`Privilege_id`)
    REFERENCES `Olga_Store`.`Privilege` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Olga_Store`.`Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`Order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date_of_creation` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `amount` DOUBLE NOT NULL,
  `User_id` INT NOT NULL,
  `comment` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Order_User1_idx` (`User_id` ASC),
  CONSTRAINT `fk_Order_User1`
    FOREIGN KEY (`User_id`)
    REFERENCES `Olga_Store`.`User` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Olga_Store`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Olga_Store`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`Product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` TEXT NOT NULL,
  `price_per_piece` DOUBLE NOT NULL,
  `in_stock` TINYINT(1) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `path_to_picture` VARCHAR(45) NOT NULL,
  `Category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Product_Category1_idx` (`Category_id` ASC),
  CONSTRAINT `fk_Product_Category1`
    FOREIGN KEY (`Category_id`)
    REFERENCES `Olga_Store`.`Category` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Olga_Store`.`Contains`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Olga_Store`.`Contains` (
  `quantity` INT NOT NULL,
  `Order_id` INT NOT NULL,
  `Product_id` INT NOT NULL,
  PRIMARY KEY (`Order_id`, `Product_id`),
  INDEX `fk_Contains_Order1_idx` (`Order_id` ASC),
  INDEX `fk_Contains_Product1_idx` (`Product_id` ASC),
  CONSTRAINT `fk_Contains_Order1`
    FOREIGN KEY (`Order_id`)
    REFERENCES `Olga_Store`.`Order` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Contains_Product1`
    FOREIGN KEY (`Product_id`)
    REFERENCES `Olga_Store`.`Product` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
