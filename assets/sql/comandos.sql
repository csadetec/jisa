--adicionar valor unico na tabela
ALTER TABLE `jisa_equipes` ADD UNIQUE( `nome_equipe`);

ALTER TABLE `jisa_equipes` CHANGE `nome_equipe` `nome_equipe` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;