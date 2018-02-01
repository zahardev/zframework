CREATE TABLE `users` (
`id` BIGINT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL ,
`email` VARCHAR(255) NOT NULL ,
 PRIMARY KEY (`id`),
 INDEX `email` (`email`)
 ) ENGINE = InnoDB COMMENT = 'Users table';

INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, 'ivan', 'ivan@test.test');
INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, 'vasya', 'vasya@test.test');
INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, 'danya', 'danya@test.test');
INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, 'user4', 'user4@test.test');
