-- Contact Form Database Table Creation
-- This table stores all contact/enrollment requests from the website

CREATE TABLE IF NOT EXISTS `contact_submissions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `preferred_course` VARCHAR(255) NULL DEFAULT NULL,
  `preferred_days` VARCHAR(255) NULL DEFAULT NULL,
  `additional_details` TEXT NULL DEFAULT NULL,
  `submission_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `status` ENUM('pending', 'contacted', 'enrolled', 'rejected') NULL DEFAULT 'pending',
  `notes` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_email` (`email`),
  INDEX `idx_status` (`status`),
  INDEX `idx_submission_date` (`submission_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

