CREATE TABLE IF NOT EXISTS `user_ratings` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rating_points` tinyint(3) NOT NULL,
  `rating_type` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
