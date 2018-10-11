CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(500) NULL DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `is_updated` TINYINT(1) NULL DEFAULT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;