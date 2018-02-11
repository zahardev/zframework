CREATE TABLE `authors` (
`id` BIGINT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL,
`email` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`id`),
 INDEX `email` (`email`)
 ) ENGINE = InnoDB COMMENT = 'Authors table';

INSERT INTO `authors` (`id`, `name`, `email`) VALUES (NULL, 'admin', 'ivan@test.test');
INSERT INTO `authors` (`id`, `name`, `email`) VALUES (NULL, 'vasya', 'vasya@test.test');
INSERT INTO `authors` (`id`, `name`, `email`) VALUES (NULL, 'danya', 'danya@test.test');
