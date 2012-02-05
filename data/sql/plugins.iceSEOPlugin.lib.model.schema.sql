
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- meta_tag
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `meta_tag`;

CREATE TABLE `meta_tag`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(255) NOT NULL,
	`parameters` VARCHAR(255),
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `meta_tag_U_1` (`url`, `parameters`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- meta_tag_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `meta_tag_i18n`;

CREATE TABLE `meta_tag_i18n`
(
	`id` INTEGER NOT NULL,
	`title` VARCHAR(255),
	`description` VARCHAR(255) NOT NULL,
	`keywords` VARCHAR(255) NOT NULL,
	`culture` VARCHAR(7) NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `meta_tag_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `meta_tag` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
