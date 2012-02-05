
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- short_url
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `short_url`;

CREATE TABLE `short_url`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`url` TEXT,
	`url_decoded` TEXT,
	`hash` VARCHAR(8),
	`view_count` INTEGER DEFAULT 0,
	`is_public` BOOL DEFAULT 1 NOT NULL,
	`is_enabled` BOOL DEFAULT 1 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `short_url_I_1` (`hash`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- short_url_hit
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `short_url_hit`;

CREATE TABLE `short_url_hit`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`short_url_id` INTEGER NOT NULL,
	`session_id` VARCHAR(32) NOT NULL,
	`ip_address` VARCHAR(15) NOT NULL,
	`referrer` VARCHAR(255),
	`is_mobile` BOOL DEFAULT 0 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `short_url_hit_FI_1` (`short_url_id`),
	CONSTRAINT `short_url_hit_FK_1`
		FOREIGN KEY (`short_url_id`)
		REFERENCES `short_url` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
