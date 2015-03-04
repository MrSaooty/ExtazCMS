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
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;