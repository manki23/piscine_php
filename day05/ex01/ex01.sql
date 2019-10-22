CREATE TABLE IF NOT EXISTS `ft_table` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(8) DEFAULT 'toto',
    `group` ENUM('staff', 'student', 'other') NOT NULL, 
    `creation_date` DATE NOT NULL
);