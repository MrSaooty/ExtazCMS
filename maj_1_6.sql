DELETE FROM `extaz_team`
ALTER TABLE `extaz_team` ADD `color` TEXT NOT NULL AFTER `rank`, ADD `order` INT NOT NULL AFTER `color`;
DELETE FROM `extaz_codes`
ALTER TABLE `extaz_codes` CHANGE `author` `user_id` INT NOT NULL;
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