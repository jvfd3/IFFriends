CREATE SCHEMA IF NOT EXISTS `rede social` ;
USE `rede social` ;

-- -----------------------------------------------------
-- Table `rede social`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede social`.`usuario` (
  `idusuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(30) NOT NULL,
  `cidade` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `curso` VARCHAR(45) NULL,
  `data_de_nascimento` DATE NULL,
  `genero` VARCHAR(45) NULL,
  `nome_social` VARCHAR(45) NULL,
  `foto_perfil` VARBINARY(10000) NULL,
  `cor_fundo` VARBINARY(1000) NULL,
  `modo_norturno` VARCHAR(45) NULL,
  `usuariocol` TINYINT(1) NULL,
  `situacao` TINYINT(1) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede social`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede social`.`grupo` (
  `idgrupo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_grupo` INT NOT NULL,
  `foto_do_grupo` VARBINARY(1000) NULL,
  `situação` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idgrupo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede social`.`usuario_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede social`.`usuario_grupo` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idusuario` INT NOT NULL,
  `idgrupo` VARCHAR(45) NOT NULL,
  `data_entraga` DATE NOT NULL,
  `administrador` INT NOT NULL,
  `membros` INT NULL,
  PRIMARY KEY (`id`, `idusuario`, `idgrupo`),
  INDEX `fk_usuario_has_grupo_grupo1_idx` (`idusuario` ASC),
  INDEX `fk_usuario_has_grupo_usuario1_idx` (`id` ASC),
  CONSTRAINT `fk_usuario_has_grupo_usuario1`
    FOREIGN KEY (`id`)
    REFERENCES `rede social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_grupo_grupo1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `rede social`.`grupo` (`idgrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede social`.`amizade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede social`.`amizade` (
  `idamizade` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idamizade_usuario` INT UNSIGNED NOT NULL,
  `idamizade_amigo` INT UNSIGNED NOT NULL,
  `data_solicitacao` DATE NOT NULL,
  `data_confirmacao` DATE NOT NULL,
  `tipo_amigo` VARCHAR(45) NULL,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idamizade`, `idamizade_usuario`, `idamizade_amigo`),
  INDEX `fk_amizade_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_amizade_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `rede social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede social`.`chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede social`.`chat` (
  `idchat` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idgrupo` INT NOT NULL,
  `idusuario` INT UNSIGNED NOT NULL,
  `mensagem` LONGTEXT NULL,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idchat`, `idgrupo`, `idusuario`),
  INDEX `fk_chat_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_chat_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `rede social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rede social`.`albuns`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rede social`.`albuns` (
  `idalbuns` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_foto` VARCHAR(100) NOT NULL,
  `local_foto` VARCHAR(100) NOT NULL,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idalbuns`),
  INDEX `fk_albuns_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_albuns_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `rede social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `rede social` ;
