ALTER TABLE `extaz_shop` ADD `visible` INT NOT NULL AFTER `img`;
UPDATE `extaz_shop` SET `visible` = 1;
ALTER TABLE `extaz_shop` ADD `promo` INT NOT NULL AFTER `visible`;
UPDATE `extaz_shop` SET `promo` = -1;
ALTER TABLE `extaz_shop_history` ADD `quantity` INT NOT NULL AFTER `money`;
UPDATE `extaz_shop_history` SET `quantity` = 1;
ALTER TABLE `extaz_codes` ADD `updated` DATETIME NOT NULL AFTER `created`;
ALTER TABLE `extaz_informations` CHANGE `background` `background` TEXT NULL;
ALTER TABLE `extaz_informations` ADD `votes_url` TEXT NOT NULL AFTER `send_tokens_loss_rate`, ADD `votes_description` VARCHAR(255) NOT NULL AFTER `votes_url`, ADD `votes_time` INT NOT NULL AFTER `votes_description`, ADD `votes_reward` INT NOT NULL AFTER `votes_time`, ADD `votes_command` TEXT NOT NULL AFTER `votes_reward`;
UPDATE `cms`.`extaz_informations` SET `votes_url` = 'http://www.rpg-paradize.com/' WHERE `extaz_informations`.`id` = 1;
UPDATE `cms`.`extaz_informations` SET `votes_description` = 'Votez pour notre serveur !' WHERE `extaz_informations`.`id` = 1;
UPDATE `cms`.`extaz_informations` SET `votes_time` = '180' WHERE `extaz_informations`.`id` = 1;
UPDATE `cms`.`extaz_informations` SET `votes_reward` = '0' WHERE `extaz_informations`.`id` = 1;
-- ----------------------------
-- Table structure for extaz_votes
-- ----------------------------
DROP TABLE IF EXISTS `extaz_votes`;
CREATE TABLE IF NOT EXISTS `extaz_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `reward` int(11) NOT NULL,
  `next_vote` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
ALTER TABLE `extaz_informations` ADD `use_votes` INT NOT NULL AFTER `use_captcha`;