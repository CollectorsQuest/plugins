
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- cms_page
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_page`;

CREATE TABLE `cms_page`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`tree_left` INTEGER DEFAULT 0 NOT NULL,
	`tree_right` INTEGER DEFAULT 0 NOT NULL,
	`tree_scope` INTEGER DEFAULT 0 NOT NULL,
	`is_published` BOOL DEFAULT 0,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cms_page_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_page_i18n`;

CREATE TABLE `cms_page_i18n`
(
	`id` INTEGER NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`slug` VARCHAR(255) NOT NULL,
	`contents` TEXT NOT NULL,
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	`culture` VARCHAR(7) NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	UNIQUE INDEX `cms_page_i18n_U_1:` (`slug`, `culture`),
	CONSTRAINT `cms_page_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `cms_page` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cms_slot
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_slot`;

CREATE TABLE `cms_slot`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`type` ENUM('Text','RichText','Image') DEFAULT 'RichText',
	`name` VARCHAR(64),
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cms_slot_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_slot_i18n`;

CREATE TABLE `cms_slot_i18n`
(
	`id` INTEGER NOT NULL,
	`contents` TEXT,
	`culture` VARCHAR(7) NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `cms_slot_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `cms_slot` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
