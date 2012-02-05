
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- multimedia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `multimedia`;

CREATE TABLE `multimedia`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`model` CHAR(64) NOT NULL,
	`model_id` INTEGER,
	`type` ENUM('image','video','pdf') DEFAULT 'image' NOT NULL,
	`name` CHAR(128) NOT NULL,
	`slug` CHAR(128) NOT NULL,
	`md5` CHAR(32) NOT NULL,
	`source` VARCHAR(255),
	`is_primary` BOOL DEFAULT 0,
	`position` SMALLINT UNSIGNED DEFAULT 65535,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `multimedia_U_1` (`slug`),
	UNIQUE INDEX `multimedia_U_2` (`model`, `model_id`, `md5`),
	INDEX `multimedia_I_1` (`model`, `model_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
