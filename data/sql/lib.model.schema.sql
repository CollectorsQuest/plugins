
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- bookstore
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bookstore`;

CREATE TABLE `bookstore`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50),
	`location` VARCHAR(128),
	`website` VARCHAR(255),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- book
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`author_id` INTEGER,
	`publisher_id` INTEGER,
	`title` VARCHAR(255),
	`isbn` VARCHAR(24),
	`price` FLOAT,
	`eblob` TEXT,
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `book_FI_1` (`author_id`),
	INDEX `book_FI_2` (`publisher_id`),
	CONSTRAINT `book_FK_1`
		FOREIGN KEY (`author_id`)
		REFERENCES `author` (`id`),
	CONSTRAINT `book_FK_2`
		FOREIGN KEY (`publisher_id`)
		REFERENCES `publisher` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- author
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `author`;

CREATE TABLE `author`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(128),
	`last_name` VARCHAR(128),
	`email` VARCHAR(128),
	`age` INTEGER,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- publisher
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `publisher`;

CREATE TABLE `publisher`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(128),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
