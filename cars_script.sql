CREATE DATABASE  IF NOT EXISTS `cars`;
USE `cars`;
DROP TABLE IF EXISTS `information`;

CREATE TABLE `information` (
	`id` int(11) NOT NULL auto_increment,
	`design` varchar(45), #<-- hvilken type mærke
    `design_model` varchar(45),
    `fuel` varchar(45),
    `model_year` varchar(45),
    `kilometers` int(11),
    `color` varchar(45),
    `steering_type` varchar(45), #f.eks servostyring
    `gear_type` varchar(45),
    `serialnumber` varchar(45) UNIQUE,
    `updated` datetime,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;