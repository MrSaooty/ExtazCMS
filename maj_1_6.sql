DELETE FROM `extaz_team`
ALTER TABLE `extaz_team` ADD `color` TEXT NOT NULL AFTER `rank`, ADD `order` INT(11) NOT NULL AFTER `color`;
DELETE FROM `extaz_codes`
ALTER TABLE `extaz_codes` CHANGE `author` `user_id` INT NOT NULL;
ALTER TABLE `extaz_codes` ADD `creator` TEXT NOT NULL AFTER `id`;
ALTER TABLE `extaz_codes` DROP `by`;
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
DELETE FROM `extaz_support_comments`
ALTER TABLE `extaz_support_comments` CHANGE `username` `user_id` INT(11) NULL DEFAULT NULL;
DELETE FROM `extaz_shop_history`
ALTER TABLE `extaz_shop_history` CHANGE `username` `user_id` INT(11) NULL DEFAULT NULL;
DELETE FROM `extaz_starpass_history`
ALTER TABLE `extaz_starpass_history` CHANGE `username` `user_id` INT(11) NULL DEFAULT NULL;
ALTER TABLE `extaz_informations` ADD `maintenance` INT(11) NOT NULL AFTER `analytics`;