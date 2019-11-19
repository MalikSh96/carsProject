DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id` int(11) NOT NULL auto_increment,
	`email` varchar(45) UNIQUE,
    `firstname` varchar(45),
    `lastname` varchar(45),
    `password` varchar(255), #remember to hash password
    `lastlogin` datetime,
	`isAdmin` bool default FALSE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;