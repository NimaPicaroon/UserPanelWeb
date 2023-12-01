ALTER TABLE `users`
  ADD COLUMN `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD COLUMN `profile_image` varchar(500) COLLATE utf8mb4_bin DEFAULT 'unknown.png',
  ADD COLUMN `username` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  ADD COLUMN `password` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  ADD KEY `id` (`id`)
;
