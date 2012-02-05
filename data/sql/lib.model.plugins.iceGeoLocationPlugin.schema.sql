
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- geo_country
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `geo_country`;

CREATE TABLE `geo_country`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(64) NOT NULL,
	`slug` VARCHAR(64) NOT NULL,
	`iso3166` CHAR(2) NOT NULL,
	`currency` CHAR(3) NOT NULL,
	`latitude` FLOAT,
	`longitude` FLOAT,
	`zoom` SMALLINT,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `geo_country_U_1` (`slug`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- geo_region
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `geo_region`;

CREATE TABLE `geo_region`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name_cyrillic` VARCHAR(64) NOT NULL,
	`name_latin` VARCHAR(64) NOT NULL,
	`slug_cyrillic` VARCHAR(64) NOT NULL,
	`slug_latin` VARCHAR(64) NOT NULL,
	`coords` TEXT NOT NULL,
	`latitude` FLOAT,
	`longitude` FLOAT,
	`zoom` SMALLINT,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `geo_region_U_1` (`slug_cyrillic`),
	UNIQUE INDEX `geo_region_U_2` (`slug_latin`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- geo_city
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `geo_city`;

CREATE TABLE `geo_city`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`geo_region_id` INTEGER NOT NULL,
	`type` ENUM('city', 'village', 'resort', 'camping', 'locality', 'villas') DEFAULT 'village' NOT NULL,
	`name_cyrillic` VARCHAR(64) NOT NULL,
	`name_latin` VARCHAR(64) NOT NULL,
	`slug_cyrillic` VARCHAR(64) NOT NULL,
	`slug_latin` VARCHAR(64) NOT NULL,
	`latitude` FLOAT,
	`longitude` FLOAT,
	`postal_code` CHAR(4),
	`telephone_code` CHAR(8),
	PRIMARY KEY (`id`),
	UNIQUE INDEX `geo_city_U_1` (`slug_cyrillic`),
	UNIQUE INDEX `geo_city_U_2` (`slug_latin`),
	INDEX `geo_city_FI_1` (`geo_region_id`),
	CONSTRAINT `geo_city_FK_1`
		FOREIGN KEY (`geo_region_id`)
		REFERENCES `geo_region` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- geo_area
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `geo_area`;

CREATE TABLE `geo_area`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`geo_region_id` INTEGER NOT NULL,
	`geo_city_id` INTEGER NOT NULL,
	`name_cyrillic` VARCHAR(64) NOT NULL,
	`name_latin` VARCHAR(64) NOT NULL,
	`slug_cyrillic` VARCHAR(64) NOT NULL,
	`slug_latin` VARCHAR(64) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `geo_area_FI_1` (`geo_region_id`),
	INDEX `geo_area_FI_2` (`geo_city_id`),
	CONSTRAINT `geo_area_FK_1`
		FOREIGN KEY (`geo_region_id`)
		REFERENCES `geo_region` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `geo_area_FK_2`
		FOREIGN KEY (`geo_city_id`)
		REFERENCES `geo_city` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- geo_street
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `geo_street`;

CREATE TABLE `geo_street`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`geo_region_id` INTEGER NOT NULL,
	`geo_city_id` INTEGER NOT NULL,
	`geo_area_id` INTEGER NOT NULL,
	`name_cyrillic` VARCHAR(64) NOT NULL,
	`name_latin` VARCHAR(64) NOT NULL,
	`slug_cyrillic` VARCHAR(64) NOT NULL,
	`slug_latin` VARCHAR(64) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `geo_street_FI_1` (`geo_region_id`),
	INDEX `geo_street_FI_2` (`geo_city_id`),
	INDEX `geo_street_FI_3` (`geo_area_id`),
	CONSTRAINT `geo_street_FK_1`
		FOREIGN KEY (`geo_region_id`)
		REFERENCES `geo_region` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `geo_street_FK_2`
		FOREIGN KEY (`geo_city_id`)
		REFERENCES `geo_city` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `geo_street_FK_3`
		FOREIGN KEY (`geo_area_id`)
		REFERENCES `geo_area` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
