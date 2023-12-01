ALTER TABLE `players`
  ADD COLUMN `username` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  ADD COLUMN `password` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  ADD COLUMN `profile_image` varchar(500) COLLATE utf8mb4_bin DEFAULT 'unknown.png'
;
