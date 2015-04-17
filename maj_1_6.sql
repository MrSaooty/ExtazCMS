DELETE FROM `extaz_team`
ALTER TABLE `extaz_team` ADD `color` TEXT NOT NULL AFTER `rank`, ADD `order` INT NOT NULL AFTER `color`;