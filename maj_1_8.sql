ALTER TABLE `extaz_shop` ADD `visible` INT NOT NULL AFTER `img`;
UPDATE `extaz_shop` SET `visible` = 1;
ALTER TABLE `extaz_shop` ADD `promo` INT NOT NULL AFTER `visible`;
UPDATE `extaz_shop` SET `promo` = -1;
ALTER TABLE `extaz_shop_history` ADD `quantity` INT NOT NULL AFTER `money`;
UPDATE `extaz_shop_history` SET `quantity` = 1;
ALTER TABLE `extaz_codes` ADD `updated` DATETIME NOT NULL AFTER `created`;
ALTER TABLE `extaz_informations` CHANGE `background` `background` TEXT NULL;