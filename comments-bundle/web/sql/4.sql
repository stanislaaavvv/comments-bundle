CREATE TABLE IF NOT EXISTS `comments_has_reactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;