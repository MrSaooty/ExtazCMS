-- ----------------------------
-- Table structure for extaz_comments
-- ----------------------------
CREATE TABLE IF NOT EXISTS `extaz_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
-- ----------------------------
-- Table structure for extaz_codes
-- ----------------------------
CREATE TABLE IF NOT EXISTS `extaz_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` text NOT NULL,
  `ip` text NOT NULL,
  `code` text NOT NULL,
  `value` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `by` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `extaz_informations` ADD `analytics` TEXT NOT NULL;