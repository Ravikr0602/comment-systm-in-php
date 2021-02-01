

CREATE TABLE `pratical`.`comment_table` ( `comment_id` INT(8) NOT NULL AUTO_INCREMENT ,  `user_comment` TEXT NOT NULL ,  `user_name` VARCHAR(100) NOT NULL ,  `user_email` VARCHAR(100) NOT NULL ,  `website` VARCHAR(100) NOT NULL ,  `comment_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`comment_id`)) ENGINE = InnoDB;


INSERT INTO `comment_table` (`comment_id`, `user_comment`, `user_name`, `user_email`, `website`, `comment_time`) VALUES ('1', 'This is comment system by using Php and Mysql.', 'Ravi Kumar', 'ravikr0602@gmail.com', 'www.creativeblog.com', CURRENT_TIMESTAMP);