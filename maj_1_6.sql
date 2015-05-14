DROP TABLE IF EXISTS `extaz_team`;
CREATE TABLE `extaz_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '',
  `rank` text,
  `color` text,
  `order` int(11),
  `facebook_url` text,
  `twitter_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `extaz_codes`;
CREATE TABLE IF NOT EXISTS `extaz_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `code` text NOT NULL,
  `value` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `extaz_buttons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
ALTER TABLE `extaz_informations` DROP `facebook_url`, DROP `twitter_url`;
ALTER TABLE `extaz_support` DROP `username`;
DROP TABLE IF EXISTS `extaz_support_comments`;
CREATE TABLE `extaz_support_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` longtext,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `extaz_shop_history`;
CREATE TABLE `extaz_shop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item` text,
  `item_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `money` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `extaz_starpass_history`;
CREATE TABLE `extaz_starpass_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tokens` int(11) DEFAULT NULL,
  `code` text,
  `note` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
ALTER TABLE `extaz_informations` ADD `maintenance` INT(11) NOT NULL AFTER `analytics`;