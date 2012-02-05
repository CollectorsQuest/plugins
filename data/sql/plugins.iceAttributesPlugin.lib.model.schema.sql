
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- attribute
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute`;

CREATE TABLE `attribute`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`measure_unit_id` INTEGER,
	`type` ENUM('string', 'text', 'numeric', 'date', 'boolean') DEFAULT 'string' NOT NULL,
	`is_special` BOOL DEFAULT 0,
	PRIMARY KEY (`id`),
	INDEX `attribute_FI_1` (`measure_unit_id`),
	CONSTRAINT `attribute_FK_1`
		FOREIGN KEY (`measure_unit_id`)
		REFERENCES `attribute_measure_unit` (`id`)
		ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_i18n`;

CREATE TABLE `attribute_i18n`
(
	`id` INTEGER NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`name_abbr` VARCHAR(128) NOT NULL,
	`name_translit` VARCHAR(255) NOT NULL,
	`slug` VARCHAR(132) NOT NULL,
	`description` TEXT,
	`culture` VARCHAR(7) NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	UNIQUE INDEX `attribute_i18n_U_1` (`slug`, `culture`),
	CONSTRAINT `attribute_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `attribute` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_category`;

CREATE TABLE `attribute_category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`position` TINYINT DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_category_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_category_i18n`;

CREATE TABLE `attribute_category_i18n`
(
	`id` INTEGER NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`name_translit` TEXT NOT NULL,
	`slug` VARCHAR(132) NOT NULL,
	`culture` VARCHAR(7) NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	UNIQUE INDEX `attribute_category_i18n_U_1` (`slug`, `culture`),
	CONSTRAINT `attribute_category_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `attribute_category` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_filter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_filter`;

CREATE TABLE `attribute_filter`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`attribute_id` INTEGER NOT NULL,
	`pattern` VARCHAR(128) NOT NULL,
	`replacement` VARCHAR(128) NOT NULL,
	`limit` TINYINT DEFAULT -1,
	`position` TINYINT DEFAULT 0,
	PRIMARY KEY (`id`),
	INDEX `attribute_filter_FI_1` (`attribute_id`),
	CONSTRAINT `attribute_filter_FK_1`
		FOREIGN KEY (`attribute_id`)
		REFERENCES `attribute` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_measure_unit
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_measure_unit`;

CREATE TABLE `attribute_measure_unit`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_measure_unit_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_measure_unit_i18n`;

CREATE TABLE `attribute_measure_unit_i18n`
(
	`id` INTEGER NOT NULL,
	`unit` CHAR(25) NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`slug` VARCHAR(132) NOT NULL,
	`description` VARCHAR(255),
	`culture` VARCHAR(7) NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	UNIQUE INDEX `attribute_measure_unit_i18n_U_1` (`slug`, `culture`),
	CONSTRAINT `attribute_measure_unit_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `attribute_measure_unit` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_value
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_value`;

CREATE TABLE `attribute_value`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`string` VARCHAR(255),
	`numeric` DOUBLE,
	`boolean` BOOL,
	`date` DATE,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_string
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_string`;

CREATE TABLE `attribute_string`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`value` VARCHAR(255) NOT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_numeric
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_numeric`;

CREATE TABLE `attribute_numeric`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`value` DOUBLE NOT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_boolean
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_boolean`;

CREATE TABLE `attribute_boolean`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`value` BOOL NOT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- attribute_date
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `attribute_date`;

CREATE TABLE `attribute_date`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`value` DATE NOT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
