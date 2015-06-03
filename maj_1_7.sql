ALTER TABLE `extaz_support` ADD `type` TEXT NOT NULL AFTER `user_id`;

UPDATE `extaz_shop` SET `cat`= 0;

-- ----------------------------
-- Table structure for extaz_shop_categories
-- ----------------------------
CREATE TABLE IF NOT EXISTS `extaz_shop_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- ----------------------------
-- Records of extaz_shop_categories
-- ----------------------------
INSERT INTO `extaz_shop_categories` VALUES ('0', 'Sans catégorie',  '2015-06-03', '2015-06-03');