ALTER TABLE  `user_profiles` ADD  `profile_type` TINYINT( 4 ) NOT NULL DEFAULT  '0' AFTER  `user_id` ;
ALTER TABLE  `user_profiles` ADD INDEX (  `profile_type` ) ;
ALTER TABLE  `user_profiles` ADD  `first_name` VARCHAR( 255 ) NULL AFTER  `profile_type`, ADD  `last_name` VARCHAR( 255 ) NULL AFTER  `first_name` ;