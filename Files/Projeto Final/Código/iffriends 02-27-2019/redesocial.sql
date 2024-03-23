-- MySQL Script generated by MySQL Workbench
-- Wed Feb 27 03:33:58 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rede-social
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rede-social
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rede-social` ;
USE `rede-social` ;

-- -----------------------------------------------------
-- Table `rede-social`.`chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`chat` (
  `idchat` INT NOT NULL AUTO_INCREMENT,
  `mensagem` LONGTEXT NULL,
  PRIMARY KEY (`idchat`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`albuns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`albuns` (
  `idalbuns` INT NOT NULL AUTO_INCREMENT,
  `nome_foto` VARCHAR(100) NOT NULL,
  `local_foto` MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`idalbuns`),
  UNIQUE INDEX `idalbuns_UNIQUE` (`idalbuns` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`Paginas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`Paginas` (
  `idPaginas` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `datainicio` DATE NOT NULL,
  `sobre` MEDIUMTEXT NULL,
  `mebros` INT NULL,
  `albuns_idalbuns` INT NULL,
  PRIMARY KEY (`idPaginas`, `albuns_idalbuns`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `idPaginas_UNIQUE` (`idPaginas` ASC),
  INDEX `fk_Paginas_albuns1_idx` (`albuns_idalbuns` ASC),
  CONSTRAINT `fk_Paginas_albuns1`
    FOREIGN KEY (`albuns_idalbuns`)
    REFERENCES `rede-social`.`albuns` (`idalbuns`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(30) NOT NULL,
  `rsenha` VARCHAR(30) NOT NULL,
  `cidade` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `curso` VARCHAR(45) NULL,
  `data_de_nascimento` DATE NULL,
  `telefone` INT NULL,
  `genero` VARCHAR(45) NULL,
  `nome_social` VARCHAR(45) NULL,
  `foto_perfil` MEDIUMBLOB NULL,
  `data_criacao` DATE NOT NULL,
  `situacao` TINYINT(1) NOT NULL,
  `chat_idchat` INT NULL DEFAULT NULL,
  `pesquisa_idpesquisa` INT NULL DEFAULT NULL,
  `Paginas_idPaginas` INT NULL DEFAULT NULL,
  `albuns_idalbuns` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_chat1_idx` (`chat_idchat` ASC),
  INDEX `fk_usuario_Paginas1_idx` (`Paginas_idPaginas` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC),
  INDEX `fk_usuario_albuns1_idx` (`albuns_idalbuns` ASC),
  CONSTRAINT `fk_usuario_chat1`
    FOREIGN KEY (`chat_idchat`)
    REFERENCES `rede-social`.`chat` (`idchat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_Paginas1`
    FOREIGN KEY (`Paginas_idPaginas`)
    REFERENCES `rede-social`.`Paginas` (`idPaginas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_albuns1`
    FOREIGN KEY (`albuns_idalbuns`)
    REFERENCES `rede-social`.`albuns` (`idalbuns`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`grupo` (
  `idgrupo` INT NOT NULL,
  `nome_grupo` INT NOT NULL,
  `foto_do_grupo` MEDIUMBLOB NULL,
  `situação` TINYINT(1) NOT NULL,
  `chat_idchat` INT NULL,
  PRIMARY KEY (`idgrupo`),
  INDEX `fk_grupo_chat1_idx` (`chat_idchat` ASC),
  CONSTRAINT `fk_grupo_chat1`
    FOREIGN KEY (`chat_idchat`)
    REFERENCES `rede-social`.`chat` (`idchat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`amizade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`amizade` (
  `idamizade` INT NOT NULL AUTO_INCREMENT,
  `idamizade_amigo` INT NOT NULL,
  `data_solicitacao` DATE NOT NULL,
  `data_confirmacao` DATE NOT NULL,
  `tipo_amigo` VARCHAR(45) NULL,
  PRIMARY KEY (`idamizade`, `idamizade_amigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`usuario_e_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`usuario_e_grupo` (
  `usuario_idusuario` INT NOT NULL,
  `grupo_idgrupo` INT NOT NULL,
  `data_entraga` DATE NOT NULL,
  `administrador` INT NOT NULL,
  `membros` INT NULL,
  INDEX `fk_usuario_has_grupo_grupo1_idx` (`grupo_idgrupo` ASC),
  INDEX `fk_usuario_has_grupo_usuario1_idx` (`usuario_idusuario` ASC),
  PRIMARY KEY (`grupo_idgrupo`, `usuario_idusuario`),
  CONSTRAINT `fk_usuario_has_grupo_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `rede-social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_grupo_grupo1`
    FOREIGN KEY (`grupo_idgrupo`)
    REFERENCES `rede-social`.`grupo` (`idgrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede-social`.`postagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede-social`.`postagem` (
  `idpostagem` INT NOT NULL AUTO_INCREMENT,
  `postagemtexto` LONGTEXT NULL,
  `postagemimagem` MEDIUMBLOB NULL,
  `postagemvideo` LONGBLOB NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idpostagem`, `usuario_idusuario`),
  UNIQUE INDEX `idpostagem_UNIQUE` (`idpostagem` ASC),
  INDEX `fk_postagem_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_postagem_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `rede-social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
