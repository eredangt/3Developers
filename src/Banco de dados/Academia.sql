-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema academia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema academia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `academia` DEFAULT CHARACTER SET utf8;
USE `academia` ;

-- -----------------------------------------------------
-- Table `academia`.`plano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`plano` (
  `idPlano` INT(2) NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  `numMeses` INT(2) NOT NULL,
  `Valor` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`idPlano`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academia`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`pessoa` (
  `idPessoa` INT(4) NOT NULL AUTO_INCREMENT,
  `CPF` CHAR(11) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Telefone` CHAR(19) NOT NULL COMMENT '+99 (99) 99999-9999',
  `E_MAIL` VARCHAR(45) NOT NULL,
  `Data_nascimento` DATE NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  `Tipo_cargo` ENUM('C', 'I') NOT NULL,
  PRIMARY KEY (`idPessoa`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academia`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`cliente` (
  `Pessoa_idPessoa` INT(4) NOT NULL,
  `Plano_idPlano` INT(2) NOT NULL,
  INDEX `fk_Cliente_Pessoa_idx` (`Pessoa_idPessoa` ASC),
  PRIMARY KEY (`Pessoa_idPessoa`),
  INDEX `fk_Cliente_Plano1_idx` (`Plano_idPlano` ASC),
  CONSTRAINT `fk_Cliente_Pessoa`
    FOREIGN KEY (`Pessoa_idPessoa`)
    REFERENCES `academia`.`pessoa` (`idPessoa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Cliente_Plano1`
    FOREIGN KEY (`Plano_idPlano`)
    REFERENCES `academia`.`plano` (`idPlano`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academia`.`instrutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`instrutor` (
  `Pessoa_idPessoa` INT(4) NOT NULL,
  `Salario` DECIMAL(6,2) NOT NULL,
  `Carga_horaria` INT(11) NOT NULL,
  `imagem` VARCHAR(300) NOT NULL,
  INDEX `fk_Funcionario_Pessoa1_idx` (`Pessoa_idPessoa` ASC),
  PRIMARY KEY (`Pessoa_idPessoa`),
  CONSTRAINT `fk_Funcionario_Pessoa1`
    FOREIGN KEY (`Pessoa_idPessoa`)
    REFERENCES `academia`.`pessoa` (`idPessoa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academia`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`equipamento` (
  `idEquipamento` INT(3) NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  `Quantidade` INT(2) NOT NULL,
  `Marca` VARCHAR(45) NOT NULL,
  `Ano` YEAR(4) NOT NULL,
  PRIMARY KEY (`idEquipamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academia`.`treino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`treino` (
  `idTreino` INT(5) NOT NULL AUTO_INCREMENT,
  `Cliente_Pessoa_idPessoa` INT(4) NOT NULL,
  `Funcionario_Pessoa_idPessoa` INT(4) NOT NULL,
  `Equipamento_idEquipamento` INT(3) NOT NULL,
  `Tipo_treino` ENUM('A', 'B', 'C') NOT NULL,
  `Serie` INT(2) NOT NULL,
  `Repeticoes` INT(2) NOT NULL,
  `Peso` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`idTreino`),
  INDEX `fk_Treino_Cliente1_idx` (`Cliente_Pessoa_idPessoa` ASC),
  INDEX `fk_Treino_Funcionario1_idx` (`Funcionario_Pessoa_idPessoa` ASC),
  INDEX `fk_Treino_Equipamento1_idx` (`Equipamento_idEquipamento` ASC),
  CONSTRAINT `fk_Treino_Cliente1`
    FOREIGN KEY (`Cliente_Pessoa_idPessoa`)
    REFERENCES `academia`.`cliente` (`Pessoa_idPessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Treino_Funcionario1`
    FOREIGN KEY (`Funcionario_Pessoa_idPessoa`)
    REFERENCES `academia`.`instrutor` (`Pessoa_idPessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Treino_Equipamento1`
    FOREIGN KEY (`Equipamento_idEquipamento`)
    REFERENCES `academia`.`equipamento` (`idEquipamento`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `academia`.`plano` (`Nome`, `numMeses`, `Valor`)
VALUES ('Mensal', '1', '100.00'),
       ('Semestral', '6', '90.00'),
       ('Anual', '12', '80.00');

INSERT INTO `academia`.`pessoa` (`CPF`, `Nome`, `Telefone`, `E_MAIL`, `Data_nascimento`, `Senha`, `Tipo_cargo`)
VALUES ('11122233344', 'Admin', '+99 (11) 23333-4444', 'admin@admin.com', '0001-01-01', 'administrador', 'I'),
       ('15122233345', 'João Silva', '+99 (11) 13733-4445', 'joao@silva.com', '1967-11-10', '0123450', 'C'),
       ('19122233346', 'Maria Martins', '+99 (11) 53333-4446', 'maria@martins.br', '1986-03-03', '0123451', 'C'),
       ('10122233347', 'Pedro Pereira', '+99 (11) 43333-4447', 'pedro@pereira.uk', '1985-12-08', '0123452', 'C'),
       ('14122233348', 'Marta Josembeff', '+99 (11) 83333-4448', 'marta@josembeff.com', '1976-12-02', '0123453', 'I'),
       ('17122233349', 'Ricardo Terra', '+99 (11) 73333-4448', 'ricardo@terra.com', '1989-01-05', '0123456', 'I'),
       ('02122233351', 'Jolmelf Rizebelt', '+99 (11) 93333-4449', 'jolmelf@rizebelt.com', '1977-07-05', '0123455', 'I');

INSERT INTO `academia`.`instrutor` (`Pessoa_idPessoa`, `Salario`, `Carga_horaria`, `imagem`)
VALUES ('1', '9999.99', '0', '../imgInstrutores/Admin.jpg'),
       ('5', '2000.00', '8', '../imgInstrutores/Marta_Josembeff.jpg'),
       ('6', '1800.00', '8', '../imgInstrutores/Ricardo_Terra.jpg'),
       ('7', '1800.00', '8', '../imgInstrutores/Jolmelf_Rizebelt.jpg');

INSERT INTO `academia`.`cliente` (`Pessoa_idPessoa`, `Plano_idPlano`)
VALUES ('2', '1'),
       ('3', '3'),
       ('4', '2');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
