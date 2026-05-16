-- Guest Book database schema for InfinityFree
-- Database name: if0_41883247_guestbook_app

USE `if0_41883247_guestbook_app`;

CREATE TABLE IF NOT EXISTS `guestbook_entries` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `message` TEXT NOT NULL,
    `submitted_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;