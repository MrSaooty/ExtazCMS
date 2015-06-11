ALTER TABLE `extaz_shop` ADD `visible` INT NOT NULL AFTER `img`;
UPDATE `extaz_shop` SET `visible` = 1;
ALTER TABLE `extaz_shop` ADD `promo` INT NOT NULL AFTER `visible`;
UPDATE `extaz_shop` SET `promo` = -1;