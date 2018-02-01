CREATE TABLE `news` (
`id` BIGINT NOT NULL AUTO_INCREMENT,
`title` VARCHAR(255) NOT NULL ,
`content` VARCHAR(255) NOT NULL ,
`date` TIMESTAMP,
 PRIMARY KEY (`id`),
 INDEX `date` (`date`)
 ) ENGINE = InnoDB COMMENT = 'News table';

INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES
(1, 'News 1', 'Lorem1 ipsum dolor sit amet, consectetur adipiscing elit. Nam a enim at ipsum placerat faucibus a nec ante. Pellentesque mollis lectus rutrum fermentum lobortis. Vivamus at massa vel mauris euismod cursus. Mauris at rutrum dui, quis consequat quam. Nullam', '2018-01-23 22:00:00'),
(2, 'News 2', 'Lorem2 ipsum dolor sit amet, consectetur adipiscing elit. Nam a enim at ipsum placerat faucibus a nec ante. Pellentesque mollis lectus rutrum fermentum lobortis. Vivamus at massa vel mauris euismod cursus. Mauris at rutrum dui, quis consequat quam. Nullam', '2018-01-24 22:00:00'),
(3, 'News 3', 'Lorem3 ipsum dolor sit amet, consectetur adipiscing elit. Nam a enim at ipsum placerat faucibus a nec ante. Pellentesque mollis lectus rutrum fermentum lobortis. Vivamus at massa vel mauris euismod cursus. Mauris at rutrum dui, quis consequat quam. Nullam', '2018-01-26 22:00:00'),
(4, 'News 4', 'Lorem4 ipsum dolor sit amet, consectetur adipiscing elit. Nam a enim at ipsum placerat faucibus a nec ante. Pellentesque mollis lectus rutrum fermentum lobortis. Vivamus at massa vel mauris euismod cursus. Mauris at rutrum dui, quis consequat quam. Nullam', '2018-01-31 22:00:00');
