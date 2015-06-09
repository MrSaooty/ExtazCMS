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

ALTER TABLE `extaz_informations` ADD `send_tokens_loss_rate` INT NOT NULL DEFAULT '0' AFTER `maintenance`;

-- ----------------------------
-- Table structure for extaz_send_tokens_history
-- ----------------------------
CREATE TABLE IF NOT EXISTS `extaz_send_tokens_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper` text NOT NULL,
  `recipient` text NOT NULL,
  `nb_tokens` int(11) NOT NULL,
  `loss_rate` text NOT NULL,
  `nb_tokens_with_loss_rate` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

ALTER TABLE `extaz_informations` ADD `use_captcha` INT NOT NULL DEFAULT '0' AFTER `use_slider`;

UPDATE `extaz_users` SET `role`= 2 WHERE `role`= 1;

-- ----------------------------
-- Table structure for extaz_cpages
-- ----------------------------
DROP TABLE IF EXISTS `extaz_cpages`;
CREATE TABLE IF NOT EXISTS `extaz_cpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL,
  `content` longtext NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;