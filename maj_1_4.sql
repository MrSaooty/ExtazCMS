ALTER TABLE `extaz_informations` ADD `use_slider` INT(11) NULL DEFAULT '1' AFTER `use_donation_ladder`;
ALTER TABLE `extaz_informations` ADD `background` INT(11) NULL DEFAULT '3' AFTER `rules`;
ALTER TABLE `extaz_informations` ADD `chat_prefix` TEXT NULL DEFAULT '' AFTER `background`;
ALTER TABLE `extaz_informations` ADD `chat_nb_messages` INT(11) NULL DEFAULT '20' AFTER `chat_prefix`;