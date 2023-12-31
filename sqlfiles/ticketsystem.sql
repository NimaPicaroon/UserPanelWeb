-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ticket
CREATE DATABASE IF NOT EXISTS `ticket` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ticket`;

-- Volcando estructura para tabla ticket.apikey
CREATE TABLE IF NOT EXISTS `apikey` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.apikey: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `apikey` DISABLE KEYS */;
/*!40000 ALTER TABLE `apikey` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_edited` double DEFAULT NULL,
  `position` tinyint(1) unsigned DEFAULT NULL,
  `topic_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_article_topic` (`topic_id`),
  CONSTRAINT `c_fk_article_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.article: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.ban
CREATE TABLE IF NOT EXISTS `ban` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.ban: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ban` DISABLE KEYS */;
/*!40000 ALTER TABLE `ban` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.customfield
CREATE TABLE IF NOT EXISTS `customfield` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.customfield: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `customfield` DISABLE KEYS */;
/*!40000 ALTER TABLE `customfield` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.customfieldoption
CREATE TABLE IF NOT EXISTS `customfieldoption` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customfield_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_customfieldoption_customfield` (`customfield_id`),
  CONSTRAINT `c_fk_customfieldoption_customfield_id` FOREIGN KEY (`customfield_id`) REFERENCES `customfield` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.customfieldoption: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `customfieldoption` DISABLE KEYS */;
/*!40000 ALTER TABLE `customfieldoption` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.customfieldvalue
CREATE TABLE IF NOT EXISTS `customfieldvalue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `customfield_id` int(11) unsigned DEFAULT NULL,
  `customfieldoption_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_customfieldvalue_user` (`user_id`),
  KEY `index_foreignkey_customfieldvalue_customfield` (`customfield_id`),
  KEY `index_foreignkey_customfieldvalue_customfieldoption` (`customfieldoption_id`),
  CONSTRAINT `c_fk_customfieldvalue_customfield_id` FOREIGN KEY (`customfield_id`) REFERENCES `customfield` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_customfieldvalue_customfieldoption_id` FOREIGN KEY (`customfieldoption_id`) REFERENCES `customfieldoption` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_customfieldvalue_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.customfieldvalue: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `customfieldvalue` DISABLE KEYS */;
/*!40000 ALTER TABLE `customfieldvalue` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.customresponse
CREATE TABLE IF NOT EXISTS `customresponse` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.customresponse: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `customresponse` DISABLE KEYS */;
/*!40000 ALTER TABLE `customresponse` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owners` int(11) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.department: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `owners`, `name`, `private`) VALUES
	(1, 2, 'Help and Support', 0);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.department_staff
CREATE TABLE IF NOT EXISTS `department_staff` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(11) unsigned DEFAULT NULL,
  `staff_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_f2a19cacc73eb380315c104650ebc8c42d1b75a0` (`department_id`,`staff_id`),
  KEY `index_foreignkey_department_staff_department` (`department_id`),
  KEY `index_foreignkey_department_staff_staff` (`staff_id`),
  CONSTRAINT `c_fk_department_staff_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c_fk_department_staff_staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.department_staff: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `department_staff` DISABLE KEYS */;
INSERT INTO `department_staff` (`id`, `department_id`, `staff_id`) VALUES
	(1, 1, 1),
	(2, 1, 2);
/*!40000 ALTER TABLE `department_staff` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.language
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed` int(11) unsigned DEFAULT NULL,
  `supported` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.language: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id`, `code`, `allowed`, `supported`) VALUES
	(1, 'en', 1, 1),
	(2, 'es', 1, 0),
	(3, 'de', 1, 0),
	(4, 'fr', 1, 0),
	(5, 'pt', 1, 0),
	(6, 'jp', 1, 0),
	(7, 'ru', 1, 0),
	(8, 'cn', 1, 0),
	(9, 'in', 1, 0),
	(10, 'tr', 1, 0),
	(11, 'it', 1, 0),
	(12, 'br', 1, 0),
	(13, 'gr', 1, 0),
	(14, 'nl', 1, 0),
	(15, 'pl', 1, 0);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` double DEFAULT NULL,
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_staff_id` int(11) unsigned DEFAULT NULL,
  `author_user_id` int(11) unsigned DEFAULT NULL,
  `author_staff` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_log_author_staff` (`author_staff_id`),
  KEY `index_foreignkey_log_author_user` (`author_user_id`),
  CONSTRAINT `c_fk_log_author_staff_id` FOREIGN KEY (`author_staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_log_author_user_id` FOREIGN KEY (`author_user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.log: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id`, `type`, `to`, `date`, `author_name`, `author_staff_id`, `author_user_id`, `author_staff`) VALUES
	(1, 'INVITE', 'test', 202202111814, 'admin', 1, NULL, NULL),
	(2, 'SIGNUP', NULL, 202202111815, 'user', NULL, 2, NULL),
	(3, 'CREATE_TICKET', '855927', 202202111816, 'user', NULL, 2, NULL),
	(4, 'COMMENT', '855927', 202202111817, 'admin', 1, NULL, NULL),
	(5, 'EDIT_SETTINGS', NULL, 202202111830, 'admin', 1, NULL, NULL),
	(6, 'INVITE', 'admin2', 202202111834, 'admin', 1, NULL, NULL),
	(7, 'COMMENT', '855927', 202202111920, 'user', NULL, 2, NULL),
	(8, 'COMMENT', '855927', 202202111929, 'admin', 1, NULL, NULL),
	(9, 'COMMENT', '855927', 202202111931, 'user', NULL, 2, NULL),
	(10, 'CREATE_TICKET', '264625', 202202111932, 'user', NULL, 2, NULL),
	(11, 'COMMENT', '855927', 202202112304, 'user', NULL, 2, NULL),
	(12, 'CREATE_TICKET', '868974', 202202112304, 'user', NULL, 2, NULL);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.mailtemplate
CREATE TABLE IF NOT EXISTS `mailtemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.mailtemplate: ~165 rows (aproximadamente)
/*!40000 ALTER TABLE `mailtemplate` DISABLE KEYS */;
INSERT INTO `mailtemplate` (`id`, `template`, `subject`, `language`, `text1`, `text2`, `text3`) VALUES
	(1, 'USER_SIGNUP', 'Signup {{to}} - OpenSupports', 'en', 'Verify your account', 'Welcome to our support center, {{name}}!. We need you to verify this email in order to get access to your account.', 'Use this code in {{url}}/verify-token/{{to}}/{{verificationToken}} or click the button below.'),
	(2, 'USER_PASSWORD', 'Password edited - OpenSupports', 'en', 'Password changed', 'Hi, {{name}}. We want to inform you that your password has changed from your customer panel.', ''),
	(3, 'USER_EMAIL', 'Email edited - OpenSupports', 'en', 'Email changed', 'Hi, {{name}}. We want to inform you that your email has changed to {{newemail}} from your customer panel.', ''),
	(4, 'PASSWORD_FORGOT', 'Recover password - OpenSupports', 'en', 'Recover password', 'Hi, {{name}}. You have requested to recover your password.', 'Use this code in {{url}}/recover-password?email={{to}}&token={{token}} or click the button below.'),
	(5, 'USER_INVITE', 'You have been invited - OpenSupports', 'en', 'You have been invited', 'Hi, {{name}}. You have been invited to join our support center.', 'Use this code in {{url}}/recover-password?email={{to}}&token={{token}}&invited=true or click the button below to set up your password.'),
	(6, 'USER_SYSTEM_DISABLED', 'Access system changed - OpenSupports', 'en', 'Access system changed', 'Hello, {{name}}. The system to access tickets has changed.', 'You can access and see to your tickets by using your email and the ticket number.Click in the button below to see your tickets.'),
	(7, 'USER_SYSTEM_ENABLED', 'Account created - OpenSupports', 'en', 'Account created', 'Hello, {{name}}. We have created an account where you can access the tickets you have sent us.', 'You can access your account by using this email <i>({{to}})</i> and password below.Please change the password as soon as you log in.'),
	(8, 'TICKET_CREATED', '#{{ticketNumber}} Ticket created - OpenSupports', 'en', 'Ticket created', 'Hello, {{name}}. You have sent a new ticket titled <i>{{title}}</i> to our support center.', 'You can access to the ticket by its ticket number or you can click on the button below.'),
	(9, 'TICKET_RESPONDED', '#{{ticketNumber}} New response - OpenSupports', 'en', 'Ticket responded', 'Hello, {{name}}. You have received a response in the ticket titled <i>{{title}}</i>.', 'Please click below to see the new response.'),
	(10, 'TICKET_CLOSED', '#{{ticketNumber}} Ticket closed - OpenSupports', 'en', 'Ticket closed', 'Hello, {{name}}. A ticket you sent titled <i>{{title}}</i> has been closed.', 'You can access to the ticket by its ticket number. Or you can click on the button below.'),
	(11, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket created - OpenSupports', 'en', 'Ticket created', 'User {{name}} has created a new ticket titled <i>{{title}}</i>.', 'You can access to the ticket by its ticket number.'),
	(12, 'USER_SIGNUP', '注册 {{to}} - OpenSupports', 'cn', '验证您的帐户', '欢迎来到我们的支援中心{{name}} !. 我们需要您验证此电子邮件才能访问您的帐户。', '使用此代码 {{url}}/verify-token/{{to}}/{{verificationToken}} 或单击下面的按钮.'),
	(13, 'USER_PASSWORD', '密码已编辑 - OpenSupports', 'cn', '密码已更改', '嗨，{{name}}。 我们想通知您，您的密码已从您的客户面板更改。', ''),
	(14, 'USER_EMAIL', '电子邮件已修改 - OpenSupports', 'cn', '电子邮件已更改', '嗨，{{name}}。 我们想通知您，您的电子邮件已从您的客户面板更改为 {{newemail}}。', ''),
	(15, 'PASSWORD_FORGOT', '恢复密码 - OpenSupports', 'cn', '恢复密码', '喂 {{name}}。 您已要求恢复密码。', '使用此代码 {{url}}/recover-password?email={{to}}&token={{token}} 或单击下面的按钮.'),
	(16, 'USER_INVITE', '您已受邀 - OpenSupports', 'cn', '您已受邀', '你好, {{name}}. 邀请您加入我们的支持中心.', '使用此代码 {{url}}/recover-password?email={{to}}&token={{token}}&invited=true 或单击下面的按钮来设置密码.'),
	(17, 'USER_SYSTEM_DISABLED', '访问系统更改 - OpenSupports', 'cn', '访问系统更改', '您好，{{name}}。 访问票证的系统已更改。', '您可以通过使用您的电子邮件和票号访问和查看您的机票。 点击下面的按钮查看您的票。'),
	(18, 'USER_SYSTEM_ENABLED', '帐户已创建 - OpenSupports', 'cn', '帐户已创建', '您好，{{name}}。 我们已经创建了一个帐户，您可以访问您发送给我们的票。', '您可以在下面使用此电子邮件 <i>({{to}})</i> 和密码访问您的帐户。 请在登录后立即更改密码。'),
	(19, 'TICKET_CREATED', '#{{ticketNumber}} 已创建票证 - OpenSupports', 'cn', '票据创建', '您好，{{name}}。 您已将一张名为 <i>{{title}}</i> 的新票发送到我们的支持中心。', '您可以通过其票号访问票证。 或者你可以点击下面的按钮。'),
	(20, 'TICKET_RESPONDED', '#{{ticketNumber}} 新反应 - OpenSupports', 'cn', '机票回应', '您好，{{name}}。 您在票证名称 <i>{{title}}</i> 中收到了回复。', '请点击下面查看新的回复。'),
	(21, 'TICKET_CLOSED', '#{{ticketNumber}} 票已关闭 - OpenSupports', 'cn', '票關閉', '您好，{{name}}。 您发送的名为 <i>{{title}}</i> 的票已经关闭。', '您可以通过其票号访问票证。 或者你可以点击下面的按钮。'),
	(22, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} 已创建票证 - OpenSupports', 'cn', '票据创建', '用戶 {{name}}。 他創造了一個題為新票 <i>{{title}}</i>。', '您可以通过其票号访问票证。'),
	(23, 'USER_SIGNUP', 'Anmelden {{to}} - OpenSupports', 'de', 'Überprüfen Sie Ihr Konto', 'Willkommen in unserem Support-Center, {{name}} !. Wir müssen diese E-Mail bestätigen, um Zugang zu Ihrem Konto zu erhalten.', 'Verwenden Sie diesen Code in {{url}}/verify-token/{{to}}/{{verificationToken}} oder klicken Sie auf die Schaltfläche unten.'),
	(24, 'USER_PASSWORD', 'Passwort bearbeitet - OpenSupports', 'de', 'Passwort geändert', 'Hallo, {{name}}. Wir möchten Sie darüber informieren, dass Ihr Passwort in Ihrem Kundenbereich geändert wurde.', ''),
	(25, 'USER_EMAIL', 'E-Mail bearbeitet - OpenSupports', 'de', 'E-Mail geändert', 'Hallo, {{name}}. Wir möchten Sie darüber informieren, dass Ihre E-Mail von Ihrem Kundenbereich zu {{newemail}} geändert wurde.', ''),
	(26, 'PASSWORD_FORGOT', 'Passwort wiederherstellen - OpenSupports', 'de', 'Passwort wiederherstellen', 'Hallo, {{name}}. Sie haben aufgefordert, Ihr Passwort wiederherzustellen.', 'Verwenden Sie diesen Code in {{url}}/recover-password?email={{to}}&token={{token}} oder klicken Sie auf die Schaltfläche unten.'),
	(27, 'USER_INVITE', 'Du bist eingeladen - OpenSupports', 'de', 'Du bist eingeladen', 'Hallo, {{name}}. Sie wurden zu unserem Support-Center eingeladen.', 'Verwenden Sie diesen Code in {{url}}/recover-password?email={{to}}&token={{token}}&invited=true oder klicken Sie auf die Schaltfläche unten, um Ihr Passwort einzurichten.'),
	(28, 'USER_SYSTEM_DISABLED', 'Access system changed - OpenSupports', 'de', 'Zugriffssystem geändert', 'Hallo, {{name}}. Das System für den Zugriff auf Tickets hat sich geändert.', 'Sie können mit Ihren E-Mails und der Ticketnummer auf Ihre Tickets zugreifen und sie sehen. Klicken Sie auf die Schaltfläche unten, um Ihre Tickets zu lesen.'),
	(29, 'USER_SYSTEM_ENABLED', 'Account erstellt - OpenSupports', 'de', 'Account erstellt', 'Hallo, {{name}}. Wir haben ein Konto erstellt, wo Sie auf die Tickets zugreifen können, die Sie uns gesendet haben.', 'Sie können auf Ihr Konto zugreifen, indem Sie diese E-Mail <i>({{to}})</i> und das Passwort unten verwenden. Bitte ändern Sie das Passwort, sobald Sie sich anmelden.'),
	(30, 'TICKET_CREATED', '#{{ticketNumber}} Ticket erstellt - OpenSupports', 'de', 'Ticket erstellt', 'Hallo, {{name}}. Sie haben ein neues Ticket mit dem Titel <i>{{title}}</i> an unser Support-Center gesendet.', 'Sie können das Ticket nach der Ticketnummer erreichen. Oder klicken Sie auf die Schaltfläche unten.'),
	(31, 'TICKET_RESPONDED', '#{{ticketNumber}} Neue Antwort - OpenSupports', 'de', 'Ticket antwortete', 'Hallo, {{name}}. Sie haben eine Antwort im Tickettitel <i>{{title}}</i> erhalten.', 'Bitte klicken Sie unten, um die neue Antwort zu lesen.'),
	(32, 'TICKET_CLOSED', '#{{ticketNumber}} Ticket geschlossen - OpenSupports', 'de', 'Ticket geschlossen', 'Hallo, {{name}}. Ein Ticket, das Sie mit dem Titel <i>{{title}}</i> gesendet haben, wurde geschlossen.', 'Sie können das Ticket nach der Ticketnummer erreichen oder klicken Sie auf die Schaltfläche unten.'),
	(33, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket erstellt - OpenSupports', 'de', 'Ticket erstellt', 'Der Benutzer {{name}} hat ein neues Ticket erstellt berechtigt <i>{{title}}</i>.', 'Sie können das Ticket nach der Ticketnummer erreichen.'),
	(34, 'USER_SIGNUP', 'Registrado {{to}} - OpenSupports', 'es', 'Verifique su cuenta', '{{name}}, le damos la bienvenida a nuestro centro de soporte. Necesitamos que verifique esta cuenta de correo para que pueda acceder a su cuenta.', 'Use este código en {{url}}/verify-token/{{to}}/{{verificationToken}} o haga clic en el botón de abajo.'),
	(35, 'USER_PASSWORD', 'La contraseña ha cambiado - OpenSupports', 'es', 'Contraseña cambiada', 'Hola, {{name}}. Queremos informale que su contraseña ha sido cambiada desde el panel de usuario.', ''),
	(36, 'USER_EMAIL', 'Email cambiado - OpenSupports', 'es', 'Email cambiado', 'Hola, {{name}}. Queremos informale que su email ha cambiado a {{newemail}} desde el panel de control.', ''),
	(37, 'PASSWORD_FORGOT', 'Recuperar contraseña - OpenSupports', 'es', 'Recuperar contraseña', 'Hola, {{name}}. Ha solicitado recuperar su contraseña.', 'Use este código en {{url}}/recover-password?email={{to}}&token={{token}} o haga clic en el botón de abajo.'),
	(38, 'USER_INVITE', 'Ha sido invitado - OpenSupports', 'es', 'Ha sido invitado', 'Hola, {{name}}. Usted ha sido invitado a unirse a nuestro sistema de soporte.', 'Use este código en {{url}}/recover-password?email={{to}}&token={{token}}&invited=true o haga clic en el botón de abajo para establecer su contraseña.'),
	(39, 'USER_SYSTEM_DISABLED', 'Sistema de acceso cambiado - OpenSupports', 'es', 'Sistema de acceso cambiado', 'Hola, {{name}}. El sistema para acceder a los tickets ha cambiado.', 'Ahora puede acceder a los tickets usando su cuenta de correo y el número de ticket. Haga clic en el botón de abajo para poder ver los tickets.'),
	(40, 'USER_SYSTEM_ENABLED', 'Cuenta creada - OpenSupports', 'es', 'Cuenta creada', 'Hola, {{name}}. Hemos creado una cuenta donde puede acceder a los tickets que nos ha enviado.', 'Puede acceder usando su cuenta de cooreo <i>({{to}})</i> y la contraseña de abajo. Por favor, cambia su contraseña tan pronto como ingrese al panel de usuario.'),
	(41, 'TICKET_CREATED', '#{{ticketNumber}} Ticket creado - OpenSupports', 'es', 'Ticket creado', 'Hola, {{name}}. Ha creado un nuevo ticket titulado <i>{{title}}</i> en nuestro sistema de soporte.', 'Puede ver el ticket usando el número de ticket mostrado abajo o puede hacer clic en el botón de más abajo.'),
	(42, 'TICKET_RESPONDED', '#{{ticketNumber}} Nueva respuesta - OpenSupports', 'es', 'Nueva respuesta', 'Hola, {{name}}. Ha recibido una nueva respuesta en su ticket titulado <i>{{title}}</i>.', 'Por favor, haga clic abajo para ver la respuesta.'),
	(43, 'TICKET_CLOSED', '#{{ticketNumber}} Ticket cerrado - OpenSupports', 'es', 'Ticket cerrado', 'Hola, {{name}}. El ticket que envió, titulado <i>{{title}}</i>, ha sido cerrado.', 'Puede acceder al ticket por su número de ticket o haciendo clic en el botón de abajo.'),
	(44, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket creado - OpenSupports', 'es', 'Ticket creado', 'El usuario {{name}} ha creado un nuevo ticket titulado <i>{{title}}</i>.', 'Puede ver el ticket usando el número de ticket mostrado abajo.'),
	(45, 'USER_SIGNUP', 'S\'inscrire {{to}} - OpenSupports', 'fr', 'Vérifiez votre compte', 'Bienvenue dans notre centre de support, {{name}}!. Nous vous demandons de vérifier cet e-mail afin d accéder à votre compte.', 'Utilisez ce code dans {{url}}/verify-token/{{to}}/{{verificationToken}} ou cliquez sur le bouton ci-dessous.'),
	(46, 'USER_PASSWORD', 'Mot de passe modifié - OpenSupports', 'fr', 'Mot de passe changé', 'Salut, {{name}}. Nous souhaitons vous informer que votre mot de passe a changé de votre panel client.', ''),
	(47, 'USER_EMAIL', 'Courrier électronique - OpenSupports', 'fr', 'Email modifié', 'Salut, {{name}}. Nous souhaitons vous informer que votre adresse e-mail est devenue {{newemail}} dans votre panneau client.', ''),
	(48, 'PASSWORD_FORGOT', 'Récupérer mot de passe - OpenSupports', 'fr', 'Récupérer mot de passe', 'Salut, {{name}}. Vous avez demandé à récupérer votre mot de passe.', 'Utilisez ce code dans {{url}}/recover-password?email={{to}}&token={{token}} ou cliquez sur le bouton ci-dessous.'),
	(49, 'USER_INVITE', 'You have been invited - OpenSupports', 'fr', 'You have been invited', 'Hi, {{name}}. You have been invited to join our support center.', 'Use this code in {{url}}/recover-password?email={{to}}&token={{token}}&invited=true or click the button below to set up your password.'),
	(50, 'USER_SYSTEM_DISABLED', 'Système d\'accès modifié - OpenSupports', 'fr', 'Système d\'accès modifié', 'Bonjour, {{name}}.Le système d\'accès aux tickets a changé.', 'Vous pouvez accéder et voir vos billets en utilisant votre email et le numéro de ticket.Cliquez sur le bouton ci-dessous pour voir vos billets.'),
	(51, 'USER_SYSTEM_ENABLED', 'Compte créé - OpenSupports', 'fr', 'Compte créé', 'Bonjour, {{name}}. Nous avons créé un compte où vous pouvez accéder aux billets que vous nous avez envoyés.', 'Vous pouvez accéder à votre compte en utilisant ce courriel <i>({{to}})</i> et votre mot de passe ci-dessous.Veuillez modifier le mot de passe dès que vous vous connectez.'),
	(52, 'TICKET_CREATED', '#{{ticketNumber}} Ticket créé - OpenSupports', 'fr', 'Ticket créé', 'Bonjour, {{name}}. Vous avez envoyé un nouveau ticket intitulé <i>{{title}}</i> à notre centre de support.', 'Vous pouvez accéder au billet par son numéro de ticket. Ou vous pouvez cliquer sur le bouton ci-dessous.'),
	(53, 'TICKET_RESPONDED', '#{{ticketNumber}} Nouvelle réponse - OpenSupports', 'fr', 'Ticket répondu', 'Bonjour, {{name}}. Vous avez reçu une réponse dans le titre du ticket <i>{{title}}</i>.', 'Veuillez cliquer ci-dessous pour voir la nouvelle réponse.'),
	(54, 'TICKET_CLOSED', '#{{ticketNumber}} Billet fermé - OpenSupports', 'fr', 'Billet fermé', 'Bonjour, {{name}}. Un billet que vous avez envoyé intitulé <i>{{title}}</i> a été fermé.', 'Vous pouvez accéder au billet par son numéro de ticket. Ou vous pouvez cliquer sur le bouton ci-dessous.'),
	(55, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket créé - OpenSupports', 'fr', 'Ticket créé', 'L\'utilisateur {{name}}. a créé un nouveau poste intitulé <i>{{title}}</i>.', 'Vous pouvez accéder au billet par son numéro de ticket.'),
	(56, 'USER_SIGNUP', 'Daftar - OpenSupports', 'in', 'अपने खाते को सत्यापित करें', 'हमारे समर्थन केंद्र में आपका स्वागत है {{name}}!. आपके खाते तक पहुंच प्राप्त करने के लिए हमें आपको यह ईमेल सत्यापित करने की आवश्यकता है।', 'इस कोड का उपयोग करें {{url}}/verify-token/{{to}}/{{verificationToken}} या नीचे दिए गए बटन पर क्लिक करें।'),
	(57, 'USER_PASSWORD', 'sandi diedit - OpenSupports', 'in', 'संकेतशब्द परवर्तित', 'नमस्ते {{name}}. हम आपको सूचित करना चाहते हैं कि आपका पासवर्ड आपके ग्राहक पैनल से बदल गया है।', ''),
	(58, 'USER_EMAIL', 'email diedit - OpenSupports', 'in', 'ईमेल बदल गया', 'नमस्ते {{name}}। हम आपको सूचित करना चाहते हैं कि आपका ईमेल आपके ग्राहक पैनल से {{newemail}} में बदल गया है।', ''),
	(59, 'PASSWORD_FORGOT', 'memulihkan password - OpenSupports', 'in', 'गोपनीय शब्द पुन प्राप्त करे', 'नमस्ते {{name}}. आपने अपना पासवर्ड पुनर्प्राप्त करने का अनुरोध किया है', 'इस कोड का उपयोग करें {{url}}/recover-password?email={{to}}&token={{token}} या नीचे दिए गए बटन पर क्लिक करें.'),
	(60, 'USER_INVITE', 'आपको आमंत्रित किया गया है - OpenSupports', 'in', 'आपको आमंत्रित किया गया है', 'नमस्ते, {{name}}. आपको हमारे सहायता केंद्र से जुड़ने के लिए आमंत्रित किया गया है.', 'इस कोड का उपयोग करें {{url}}/recover-password?email={{to}}&token={{token}}&invited=true या अपना पासवर्ड सेट करने के लिए नीचे दिए गए बटन पर क्लिक करें.'),
	(61, 'USER_SYSTEM_DISABLED', 'sistem akses berubah - OpenSupports', 'in', 'एक्सेस सिस्टम बदल गया', 'नमस्ते {{name}}. टिकट का उपयोग करने के लिए सिस्टम बदल गया है।', 'आप अपने ईमेल और टिकट नंबर का उपयोग करके अपने टिकट तक पहुंच सकते हैं और देख सकते हैं।अपने टिकट देखने के लिए नीचे दिए गए बटन पर क्लिक करें।'),
	(62, 'USER_SYSTEM_ENABLED', 'Akun telah dibuat - OpenSupports', 'in', 'खाता बन गय', 'नमस्ते {{name}}. हमने एक खाता बनाया है, जहां आप हमारे द्वारा भेजे गए टिकटों तक पहुंच सकते हैं।', 'आप इस ईमेल <i>({{to}})</i> और नीचे दिए गए पासवर्ड का उपयोग करके अपने खाते का उपयोग कर सकते हैं।जैसे ही आप लॉग इन करते हैं, तभी पासवर्ड बदल दें।'),
	(63, 'TICKET_CREATED', '#{{ticketNumber}} tiket dibuat - OpenSupports', 'in', 'टिकट बनाय', 'नमस्ते {{name}}. आपने हमारे समर्थन केंद्र पर <i>{{title}}</i> नामक एक नया टिकट भेजा है.', 'आप अपने टिकट नंबर से टिकट तक पहुंच सकते हैं। या आप नीचे दिए गए बटन पर क्लिक कर सकते हैं।'),
	(64, 'TICKET_RESPONDED', '#{{ticketNumber}} tanggapan baru - OpenSupports', 'in', 'टिकट जवाब दिया', 'नमस्ते {{name}}. आपको टिकट के शीर्षक में एक प्रतिक्रिया मिली है <i>{{title}}</i>.', 'कृपया नया प्रतिसाद देखने के लिए नीचे क्लिक करें।'),
	(65, 'TICKET_CLOSED', '#{{ticketNumber}} tiket ditutup - OpenSupports', 'in', 'Tiket ditutup', 'नमस्ते {{name}}. आपके द्वारा लिखे गए टिकट <i>{{title}} </i> को बंद कर दिया गया है।', 'आप अपने टिकट नंबर से टिकट तक पहुंच सकते हैं। या आप नीचे दिए गए बटन पर क्लिक कर सकते हैं।'),
	(66, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} tiket dibuat - OpenSupports', 'in', 'टिकट बनाया', 'उपयोगकर्ता {{name}} हकदार एक नया पद बनाया गया है <i>{{title}}</i>.', 'आप अपने टिकट नंबर से टिकट तक पहुंच सकते हैं।'),
	(67, 'USER_SIGNUP', 'Sei iscritto {{to}} - OpenSupports', 'it', 'Verifica il tuo account', 'Benvenuto, {{name}}!. Devi verificare questa email per accedere al tuo account.', 'Clicca sul link {{url}}/verify-token/{{to}}/{{verificationToken}} o clicca sul pulsante qui sotto.'),
	(68, 'USER_PASSWORD', 'Password modificata - OpenSupports', 'it', 'Password modificata', 'Ciao, {{name}}. Vogliamo informarti che la tua password è stata modificata dal tuo pannello di controllo.', ''),
	(69, 'USER_EMAIL', 'E-mail modificata - OpenSupports', 'it', 'L\'email è stata modificata', 'Ciao, {{name}}. Vogliamo informarti che la tua email è stata modificata {{newemail}} dal tuo pannello di controllo.', ''),
	(70, 'PASSWORD_FORGOT', 'Recupera la password - OpenSupports', 'it', 'Recupera password', 'Ciao, {{name}}. Hai richiesto di recuperare la tua password.', 'Clicca sul link {{url}}/recover-password?email={{to}}&token={{token}} o clicca sul pulsante qui sotto.'),
	(71, 'USER_INVITE', 'Sei stato invitato - OpenSupports', 'it', 'Sei stato invitato', 'Ciao, {{name}}. Sei stato invitato a far parte del nostro centro di supporto.', 'Usa questo codice in {{url}}/recover-password?email={{to}}&token={{token}}&invited=true oppure fai clic sul pulsante in basso per impostare la password.'),
	(72, 'USER_SYSTEM_DISABLED', 'Il sistema di accesso è cambiato - OpenSupports', 'it', 'Modifica sistema di accesso', 'Ciao, {{name}}. Il sistema di accesso ai tuoi tickets è cambiato.', 'Puoi accedere ai tuoi ticket usando la tua email e il numero del ticket.Clicca sul bottone qui sotto per vedere i tuoi tickets.'),
	(73, 'USER_SYSTEM_ENABLED', 'Account creato - OpenSupports', 'it', 'Account creato', 'Ciao, {{name}}. Abbiamo creato il tuo account.', ' Puoi accedere al tuo account utilizzando questa email <i>({{to}})</i> e la password qui sotto.Ti consigliamo di cambiare la password dopo il primo accesso.'),
	(74, 'TICKET_CREATED', '#{{ticketNumber}} ticket creato - OpenSupports', 'it', 'Ticket inviato', 'Ciao, {{name}}. Hai inviato un nuovo ticket <i>{{title}}</i> al nostro centro si assistenza.', 'È possibile accedere al ticket attraverso il numero del ticket. Oppure puoi cliccare sul bottone qui sotto.'),
	(75, 'TICKET_RESPONDED', '#{{ticketNumber}} Ticket risposto - OpenSupports', 'it', 'Risposta al tuo ticket', 'Ciao, {{name}}. Hai ricevuto una risposta al tuo ticket <i>{{title}}</i>.', 'Clicca qui sotto per leggere la risposta.'),
	(76, 'TICKET_CLOSED', '#{{ticketNumber}} Ticket chiuso - OpenSupports', 'it', 'Ticket chiuso', 'Ciao, {{name}}. Il ticket che hai inviato <i>{{title}}</i> è stato chiuso.', 'È possibile accedere al ticket attraverso il numero del ticket. Oppure puoi cliccare sul bottone qui sotto.'),
	(77, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket creato - OpenSupports', 'it', 'Ticket inviato', 'l\'utente {{name}} ha creato un nuovo titolo dal titolo <i>{{title}}</i>', 'È possibile accedere al ticket con il suo numero di ticket.'),
	(78, 'USER_SIGNUP', 'サインアップ - OpenSupports', 'jp', 'アカウントを確認する', 'サポートセンターへようこそ, {{name}}!. アカウントにアクセスするには、このメールを確認する必要があります。', 'でこのコードを使用 {{url}}/verify-token/{{to}}/{{verificationToken}} 下のボタンをクリックしてください.'),
	(79, 'USER_PASSWORD', 'パスワードの編集 - OpenSupports', 'jp', 'パスワード変更済み', 'こんにちは、{{name}}。 お客様のパスワードがお客様のパネルから変更されたことをお知らせいたします。', ''),
	(80, 'USER_EMAIL', '電子メールを編集しました - OpenSupports', 'jp', 'メールが変更されました', 'こんにちは、{{name}}。 お客様のメールがお客様のパネルから{{newemail}}に変更されたことをお知らせいたします。', ''),
	(81, 'PASSWORD_FORGOT', 'パスワードを回復 - OpenSupports', 'jp', 'パスワードを回復', 'こんにちは、{{name}}。 パスワードの回復を要求しました。', 'でこのコードを使用 {{url}}/recover-password?email={{to}}&token={{token}} 下のボタンをクリックしてください.'),
	(82, 'USER_INVITE', '招待されました - OpenSupports', 'jp', '招待されました', 'こんにちは, {{name}}. サポートセンターに招待されました.', 'このコードを {{url}}/recover-password?email={{to}}&token={{token}}&invited=true または、下のボタンをクリックしてパスワードを設定します.'),
	(83, 'USER_SYSTEM_DISABLED', 'アクセスシステムが変更されました - OpenSupports', 'jp', 'アクセスシステムが変更されました', 'こんにちは、{{name}}。 チケットにアクセスするシステムが変更されました。', 'あなたはあなたの電子メールとチケット番号を使ってチケットにアクセスして見ることができます。チケットを見るには、下のボタンをクリックしてください。'),
	(84, 'USER_SYSTEM_ENABLED', 'アカウントが作成されました - OpenSupports', 'jp', 'アカウントが作成されました', 'こんにちは、{{name}}。 あなたが送ったチケットにアクセスできるアカウントを作成しました。', '下記のメール<i>（{{to}}）</i>とパスワードを使用してアカウントにアクセスできます。ログインするとすぐにパスワードを変更してください。'),
	(85, 'TICKET_CREATED', '#{{ticketNumber}} チケットが作成されました - OpenSupports', 'jp', 'チケットが作成されました', 'こんにちは、{{name}}。<i>{{title}}</i> という新しいチケットをサポートセンターにお送りしました。', 'そのチケット番号でチケットにアクセスできます。 または、下のボタンをクリックしてください。'),
	(86, 'TICKET_RESPONDED', '#{{ticketNumber}} 新しい応答 - OpenSupports', 'jp', 'チケットが応答しました', 'こんにちは、{{name}}。 あなたはチケットのタイトル <i>{{title}}</i>で回答を受け取りました。', '新しいレスポンスを見るには、下記をクリックしてください。'),
	(87, 'TICKET_CLOSED', '#{{ticketNumber}} チケットが閉じられました - OpenSupports', 'jp', 'チケットが閉じられました', 'こんにちは、{{name}}。<i>{{title}}</i> というタイトルのチケットは閉鎖されました。', 'そのチケット番号でチケットにアクセスできます。 または、下のボタンをクリックしてください。'),
	(88, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} チケットが作成されました - OpenSupports', 'jp', 'チケットが作成されました', 'ユーザーは {{name}} 彼は題した新しいチケットを作成しました <i>{{title}}</i>。', 'そのチケット番号でチケットにアクセスできます。'),
	(89, 'USER_SIGNUP', 'Inscrever-se {{to}} - OpenSupports', 'pt', 'Verifique sua conta', 'Bem-vindo ao nosso centro de suporte, {{name}}!. Precisamos que você verifique este e-mail para acessar sua conta.', 'Use este código em {{url}}/verify-token/{{to}}/{{verificationToken}} ou clique no botão abaixo.'),
	(90, 'USER_PASSWORD', 'Senha editada - OpenSupports', 'pt', 'Senha alterada', 'Olá, {{name}}. Queremos informá-lo de que sua senha foi alterada do seu painel de clientes.', ''),
	(91, 'USER_EMAIL', 'Email editado - OpenSupports', 'pt', 'E-mail alterado', 'Oi, {{name}}. Queremos informar que seu e-mail foi alterado para {{newemail}} do seu painel de clientes.', ''),
	(92, 'PASSWORD_FORGOT', 'Recuperar senha - OpenSupports', 'pt', 'Recuperar senha', 'Olá, {{name}}. Você solicitou a recuperação da sua senha.', 'Use este código em {{url}}/recover-password?email={{to}}&token={{token}} ou clique no botão abaixo.'),
	(93, 'USER_INVITE', 'Você foi convidado - OpenSupports', 'pt', 'Você foi convidado', 'Oi, {{name}}. Você foi convidado a participar do nosso centro de suporte.', 'Use este código em {{url}}/recover-password?email={{to}}&token={{token}}&invited=true ou clique no botão abaixo para configurar sua senha.'),
	(94, 'USER_SYSTEM_DISABLED', 'Sistema de acesso alterado - OpenSupports', 'pt', 'Sistema de acesso alterado', 'Oi, {{name}}. O sistema de acesso aos tickets mudou.', 'Você pode acessar e ver seus bilhetes usando seu e-mail eo número do bilhete.Clique no botão abaixo para ver os seus bilhetes.'),
	(95, 'USER_SYSTEM_ENABLED', 'Conta criada - OpenSupports', 'pt', 'Conta criada', 'Oi, {{name}}. Criamos uma conta onde você pode acessar os ingressos que você nos enviou.', 'Você pode acessar sua conta usando este e-mail <i>({{to}})</i> e a senha abaixo.Por favor, altere a senha assim que fizer login.'),
	(96, 'TICKET_CREATED', '#{{ticketNumber}} Ticket criado - OpenSupports', 'pt', 'Ticket criado', 'Olá, {{name}}. Você enviou um novo ticket intitulado <i>{{title}}</i> para o nosso centro de suporte.', 'Você pode acessar o bilhete pelo seu número de bilhete. Ou você pode clicar no botão abaixo.'),
	(97, 'TICKET_RESPONDED', '#{{ticketNumber}} Nova resposta - OpenSupports', 'pt', 'Ticket respondeu', 'Olá, {{name}}. Recebeu uma resposta no título do bilhete <i>{{title}}</i>.', 'Por favor, clique abaixo para ver a nova resposta.'),
	(98, 'TICKET_CLOSED', '#{{ticketNumber}} Bilhete fechado - OpenSupports', 'pt', 'Bilhete fechado', 'Olá, {{name}}. Um bilhete que você enviou intitulado <i>{{title}}</i> foi fechado.', 'Você pode acessar o bilhete pelo seu número de bilhete. Ou você pode clicar no botão abaixo.'),
	(99, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket criado - OpenSupports', 'pt', 'Ticket criado', 'O usuário {{name}} criou um novo bilhete de direito <i>{{title}}</i>.', 'Você pode acessar o bilhete pelo seu número de bilhete.'),
	(100, 'USER_SIGNUP', 'Зарегистрироваться {{to}} - OpenSupports', 'ru', 'подтвердите ваш аккаунт', 'Добро пожаловать в наш центр поддержки, {{name}}!. Нам нужно, чтобы вы подтвердили это письмо, чтобы получить доступ к вашей учетной записи.', 'Используйте этот код в {{url}}/verify-token/{{to}}/{{verificationToken}} или нажмите кнопку ниже.'),
	(101, 'USER_PASSWORD', 'Пароль изменен - OpenSupports', 'ru', 'пароль изменен', 'Здравствуй {{name}}. Мы хотим сообщить вам, что ваш пароль был изменен с вашей клиентской панели.', ''),
	(102, 'USER_EMAIL', 'Сообщение изменено - OpenSupports', 'ru', 'Yout электронная почта изменена', 'Здравствуй, {{name}}. Мы хотим сообщить вам, что ваше письмо было изменено на {{newemail}} с вашей панели клиентов.', ''),
	(103, 'PASSWORD_FORGOT', 'Восстановить пароль - OpenSupports', 'ru', 'Восстановить пароль', 'Здравствуй, {{name}}. Вы запросили восстановить пароль.', 'Используйте этот код в {{url}}/recover-password?email={{to}}&token={{token}} или нажмите кнопку ниже.'),
	(104, 'USER_INVITE', 'Вы были приглашены - OpenSupports', 'ru', 'Вы были приглашены', 'Здравствуй, {{name}}. Вас пригласили присоединиться к нашему центру поддержки.', 'Используйте этот код в {{url}}/recover-password?email={{to}}&token={{token}}&invited=true или нажмите кнопку ниже, чтобы установить пароль.'),
	(105, 'USER_SYSTEM_DISABLED', 'Система доступа изменена - OpenSupports', 'ru', 'Система доступа изменена', 'Здравствуйте, {{name}}. Система доступа к билетам изменилась.', 'Вы можете получить доступ к своим билетам и посмотреть их, используя свою электронную почту и номер билета.Нажмите кнопку ниже, чтобы увидеть свои билеты.'),
	(106, 'USER_SYSTEM_ENABLED', 'Аккаунт создан - OpenSupports', 'ru', 'Аккаунт создан', 'Здравствуйте, {{name}}. Мы создали учетную запись, где вы можете получить доступ к билетам, которые вы нам отправили.', 'Вы можете получить доступ к своей учетной записи, используя это электронное письмо <i>({{to}})</i> и пароль ниже.Измените пароль, как только вы войдете в систему.'),
	(107, 'TICKET_CREATED', '#{{ticketNumber}} Создан билет - OpenSupports', 'ru', 'Создан билет', 'Здравствуйте, {{name}}. Вы отправили новый билет с названием <i>{{title}}</i> в наш центр поддержки.', 'Вы можете получить доступ к билету по его номеру билета. Или вы можете нажать на кнопку ниже.'),
	(108, 'TICKET_RESPONDED', '#{{ticketNumber}} Новый ответ - OpenSupports', 'ru', 'Отправлен билет', 'Здравствуйте, {{name}}. Вы получили ответ в названии билета <i>{{title}}</i>.', 'Нажмите ниже, чтобы увидеть новый ответ.'),
	(109, 'TICKET_CLOSED', '#{{ticketNumber}} Билет закрыт - OpenSupports', 'ru', 'Билет закрыт', 'Здравствуйте, {{name}}. Билет, который вы отправили под названием <i>{{title}}</i>, был закрыт.', 'Вы можете получить доступ к билету по его номеру билета. Или вы можете нажать на кнопку ниже.'),
	(110, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Создан билет - OpenSupports', 'ru', 'Создан билет', 'Пользователь {{name}} создал новый билет под названием <i>{{title}}</i>.', 'Вы можете получить доступ к билету по его номеру билета.'),
	(111, 'USER_SIGNUP', 'kaydol {{to}} - OpenSupports', 'tr', 'Hesabınızı doğrulayın', 'Destek merkezimize hoş geldiniz, {{name}}!. Hesabınıza erişebilmek için bu e-postayı doğrulamanız gerekiyor.', 'Bu kodu şu adreste kullanın {{url}}/verify-token/{{to}}/{{verificationToken}} veya aşağıdaki butona tıklayın.'),
	(112, 'USER_PASSWORD', 'Şifre düzenlendi - OpenSupports', 'tr', 'şifre değişti', 'Merhaba, {{name}}. Şifrenizin müşteri panelinizden değiştirildiğini size bildirmek istiyoruz.', ''),
	(113, 'USER_EMAIL', 'E-posta düzenlendi - OpenSupports', 'tr', 'E-posta değişti', 'Merhaba, {{name}}. E-postanızın müşteri panelinizden {{newemail}} olarak değiştiğini bildirmek istiyoruz.', ''),
	(114, 'PASSWORD_FORGOT', 'Şifre kurtarma - OpenSupports', 'tr', 'Şifre kurtarma', 'Merhaba, {{name}}. Şifrenizi geri yüklemenizi istediniz.', 'Bu kodu şu adreste kullanın {{url}}/recover-password?email={{to}}&token={{token}} veya aşağıdaki butona tıklayın.'),
	(115, 'USER_INVITE', 'Davet edildin - OpenSupports', 'tr', 'Davet edildin', 'Merhaba, {{name}}. Destek merkezimize katılmaya davet edildiniz.', 'Bu kodu {{url}}/recover-password?email={{to}}&token={{token}}&invited=true veya şifrenizi ayarlamak için aşağıdaki butona tıklayın.'),
	(116, 'USER_SYSTEM_DISABLED', 'Erişim sistemi değiştirildi - OpenSupports', 'tr', 'Erişim sistemi değiştirildi', 'Merhaba, {{name}}. Biletleri erişmek için sistem değişti.', 'E-posta adresinizi ve bilet numaranızı kullanarak biletinize erişebilir ve biletlerini görebilirsiniz.Biletlerini görmek için aşağıdaki butona tıklayın.'),
	(117, 'USER_SYSTEM_ENABLED', 'Hesap oluşturuldu - OpenSupports', 'tr', 'Hesap oluşturuldu', 'Merhaba, {{name}}. Bize gönderdiğiniz bilete erişebileceğiniz bir hesap oluşturduk.', 'Hesabınıza, <i>({{to}})</i> e-posta adresini kullanarak ve aşağıdaki şifreyle erişebilirsiniz.Lütfen giriş yaptığınızda şifreyi değiştirin.'),
	(118, 'TICKET_CREATED', '#{{ticketNumber}} Bilet oluşturuldu - OpenSupports', 'tr', 'Bilet oluşturuldu', 'Merhaba, {{name}}. Destek merkezimize <i>{{title}}</i> başlıklı yeni bir bilet gönderdiniz.', 'Bilete bilet numarasından erişebilirsiniz. Ya da aşağıdaki düğmeyi tıklayabilirsiniz.'),
	(119, 'TICKET_RESPONDED', '#{{ticketNumber}} Yeni yanıt - OpenSupports', 'tr', 'Bilet yanıtladı', 'Merhaba, {{name}}. <i>{{title}}</i> başlıklı biletten bir cevap aldınız.', 'Yeni yanıtı görmek için lütfen aşağıya tıklayınız.'),
	(120, 'TICKET_CLOSED', '#{{ticketNumber}} Bilet kapalı - OpenSupports', 'tr', 'Bilet kapandı', 'Merhaba, {{name}}. Başlık gönderdiğiniz bir bilet <i>{{title}}</i> kapatıldı.', 'Bilete bilet numarasından erişebilirsiniz. Ya da aşağıdaki düğmeyi tıklayabilirsiniz.'),
	(121, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Bilet oluşturuldu - OpenSupports', 'tr', 'Bilet oluşturuldu', 'Kullanıcı {{name}} başlıklı yeni bir bilet yarattı <i>{{title}}</i> .', 'Bilete bilet numarasından erişebilirsiniz.'),
	(122, 'USER_SIGNUP', 'Inscrever-se {{to}} - OpenSupports', 'br', 'Verifique sua conta', 'Bem-vindo ao nosso centro de suporte, {{name}}!. Precisamos que você verifique este e-mail para acessar sua conta.', 'Use este código em {{url}}/verify-token/{{to}}/{{verificationToken}} ou clique no botão abaixo.'),
	(123, 'USER_PASSWORD', 'Senha editada - OpenSupports', 'br', 'Senha alterada', 'Olá, {{name}}. Queremos informá-lo de que sua senha foi alterada do seu painel de clientes.', ''),
	(124, 'USER_EMAIL', 'Email editado - OpenSupports', 'br', 'E-mail alterado', 'Oi, {{name}}. Queremos informar que seu e-mail foi alterado para {{newemail}} do seu painel de clientes.', ''),
	(125, 'PASSWORD_FORGOT', 'Recuperar senha - OpenSupports', 'br', 'Recuperar senha', 'Olá, {{name}}. Você solicitou a recuperação da sua senha.', 'Use este código em {{url}}/recover-password?email={{to}}&token={{token}} ou clique no botão abaixo.'),
	(126, 'USER_INVITE', 'Você foi convidado - OpenSupports', 'br', 'Você foi convidado', 'Oi, {{name}}. Você foi convidado a participar do nosso centro de suporte.', 'Use este código em {{url}}/recover-password?email={{to}}&token={{token}}&invited=true ou clique no botão abaixo para configurar sua senha.'),
	(127, 'USER_SYSTEM_DISABLED', 'Sistema de acesso alterado - OpenSupports', 'br', 'Sistema de acesso alterado', 'Oi, {{name}}. O sistema de acesso aos tickets mudou.', 'Você pode acessar e ver seus bilhetes usando seu e-mail eo número do bilhete.Clique no botão abaixo para ver os seus bilhetes.'),
	(128, 'USER_SYSTEM_ENABLED', 'Conta criada - OpenSupports', 'br', 'Conta criada', 'Oi, {{name}}. Criamos uma conta onde você pode acessar os ingressos que você nos enviou.', 'Você pode acessar sua conta usando este e-mail <i>({{to}})</i> e a senha abaixo.Por favor, altere a senha assim que fizer login.'),
	(129, 'TICKET_CREATED', '#{{ticketNumber}} Ticket criado - OpenSupports', 'br', 'Ticket criado', 'Olá, {{name}}. Você enviou um novo ticket intitulado <i>{{title}}</i> para o nosso centro de suporte.', 'Você pode acessar o bilhete pelo seu número de bilhete. Ou você pode clicar no botão abaixo.'),
	(130, 'TICKET_RESPONDED', '#{{ticketNumber}} Nova resposta - OpenSupports', 'br', 'Ticket respondeu', 'Olá, {{name}}. Recebeu uma resposta no título do bilhete <i>{{title}}</i>.', 'Por favor, clique abaixo para ver a nova resposta.'),
	(131, 'TICKET_CLOSED', '#{{ticketNumber}} Bilhete fechado - OpenSupports', 'br', 'Bilhete fechado', 'Olá, {{name}}. Um bilhete que você enviou intitulado <i>{{title}}</i> foi fechado.', 'Você pode acessar o bilhete pelo seu número de bilhete. Ou você pode clicar no botão abaixo.'),
	(132, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Ticket criado - OpenSupports', 'br', 'Ticket criado', 'O usuário {{name}} criou um novo bilhete de direito <i>{{title}}</i>.', 'Você pode acessar o bilhete pelo seu número de bilhete.'),
	(133, 'USER_SIGNUP', 'Εγγραφή {{to}} - OpenSupports', 'gr', 'Επιβεβαιώστε το λογαριασμό σας', 'Καλώς ήρθατε στο κέντρο υποστήριξης {{name}} !. Πρέπει να επαληθεύσετε αυτό το μήνυμα ηλεκτρονικού ταχυδρομείου για να αποκτήσετε πρόσβαση στο λογαριασμό σας.', 'Χρησιμοποιήστε αυτόν τον κωδικό στο {{url}}/verify-token/{{to}}/{{verificationToken}} ή κάντε κλικ στο παρακάτω κουμπί.'),
	(134, 'USER_PASSWORD', 'Ο κωδικός επεξεργασίας τροποποιήθηκε- OpenSupports', 'gr', 'Ο κωδικός άλλαξε', 'Γεια σου, {{name}}. Θέλουμε να σας ενημερώσουμε ότι ο κωδικός πρόσβασής σας έχει αλλάξει από τον πίνακα πελατών σας.', ''),
	(135, 'USER_EMAIL', 'Email επεξεργασμένο - OpenSupports', 'gr', 'Το ηλεκτρονικό ταχυδρομείο άλλαξε', 'Γεια σου, {{name}}. Θέλουμε να σας ενημερώσουμε ότι το email σας έχει αλλάξει σε {{newemail}} από την ομάδα πελατών σας.', ''),
	(136, 'PASSWORD_FORGOT', 'Ανάκτηση κωδικού πρόσβασης - OpenSupports', 'gr', 'Ανάκτηση κωδικού πρόσβασης', 'Γεια σου, {{name}}. Ζητήσατε να ανακτήσετε τον κωδικό πρόσβασής σας.', 'Χρησιμοποιήστε αυτόν τον κωδικό στο {{url}} / recover-password? Email = {{to}} & token = {{token}} ή κάντε κλικ στο παρακάτω κουμπί.'),
	(137, 'USER_INVITE', 'Έχετε προσκληθεί - OpenSupports', 'gr', 'Έχετε προσκληθεί', 'Γεια σου, {{name}}. Έχετε προσκληθεί να συμμετάσχετε στο κέντρο υποστήριξής μας.', 'Χρησιμοποιήστε αυτόν τον κωδικό στο {{url}}/recover-password?email={{to}}&token={{token}}&invited=true ή κάντε κλικ στο παρακάτω κουμπί για να ρυθμίσετε τον κωδικό πρόσβασής σας.'),
	(138, 'USER_SYSTEM_DISABLED', 'Το σύστημα πρόσβασης άλλαξε - OpenSupports', 'gr', 'Το σύστημα πρόσβασης άλλαξε', '«Γεια σας, {{name}}. Το σύστημα πρόσβασης στα εισιτήρια έχει αλλάξει. ', 'Μπορείτε να έχετε πρόσβαση και να δείτε τα εισιτήριά σας χρησιμοποιώντας το email σας και τον αριθμό του εισιτηρίου.Κάντε κλικ στο κουμπί παρακάτω για να δείτε τα εισιτήριά σας.'),
	(139, 'USER_SYSTEM_ENABLED', 'Δημιουργία λογαριασμού - OpenSupports', 'gr', 'Λογαριασμός που δημιουργήθηκε', '«Γεια σας, {{name}}. Δημιουργήσαμε ένα λογαριασμό στον οποίο μπορείτε να έχετε πρόσβαση στα εισιτήρια που μας έχετε στείλει. ', 'Μπορείτε να αποκτήσετε πρόσβαση στο λογαριασμό σας χρησιμοποιώντας αυτό το μήνυμα ηλεκτρονικού ταχυδρομείου <i> ({{to}}) </ i> και τον κωδικό πρόσβασης παρακάτω.Παρακαλώ αλλάξτε τον κωδικό πρόσβασης μόλις συνδεθείτε.'),
	(140, 'TICKET_CREATED', '#{{ticketNumber}} Δημιουργήθηκε εισιτήριο - OpenSupports', 'gr', 'Δημιουργήθηκε εισιτήριο', 'Χαίρετε, {{name}}.Έχετε στείλει ένα νέο εισιτήριο με τίτλο <i> {{title}} </ i> στο κέντρο υποστήριξης.', 'Μπορείτε να έχετε πρόσβαση στο εισιτήριο με τον αριθμό εισιτηρίου του ή μπορείτε να κάνετε κλικ στο παρακάτω κουμπί.'),
	(141, 'TICKET_RESPONDED', '#{{ticketNumber}} Νέα απάντηση- OpenSupports', 'gr', 'Reactie op incident ', 'Hallo, {{name}}. Er is een reactie geplaats bij het incident met onderwerp <i>{{title}}</i>.', 'Klik hieronder om de reactie te bekijken.'),
	(142, 'TICKET_CLOSED', '#{{ticketNumber}} Το εισιτήριο έκλεισε - OpenSupports', 'gr', 'Το εισιτήριο έκλεισε', 'Χαίρετε, {{name}}.Ένα εισιτήριο που έχετε στείλει με τον τίτλο <i> {{title}} </ i> έχει κλείσει.', 'Μπορείτε να έχετε πρόσβαση στο εισιτήριο με τον αριθμό εισιτηρίου του. Ή μπορείτε να κάνετε κλικ στο παρακάτω κουμπί.'),
	(143, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Δημιουργήθηκε εισιτήριο- OpenSupports', 'gr', 'Incident aangemaakt', 'Gebruiker {{name}} heeft een nieuw incident aangemaakt met onderwerp <i>{{title}}</i>.', 'Bekijk dit incident via het incidentnummer.'),
	(144, 'USER_SIGNUP', 'Aanmelden {{to}} - OpenSupports', 'nl', 'Verifieer uw account', 'Welkom bij het Support Center, {{name}}!. U moet uw account verifiëren om toegang te krijgen tot het systeem.', 'Use this code in {{url}}/verify-token/{{to}}/{{verificationToken}} or click the button below.'),
	(145, 'USER_PASSWORD', 'Wachtwoord is aangepast - OpenSupports', 'nl', 'Wachtwoord is gewijzigd', 'Hallo, {{name}}. Uw wachtwoord is gewijzigd voor het klantenportaal.', ''),
	(146, 'USER_EMAIL', 'E-mailadres is aangepast - OpenSupports', 'nl', 'Email adres gewijzigd', 'Hallo, {{name}}. Uw email adres is gewijzigd naar {{newemail}} in het klantenportaal.', ''),
	(147, 'PASSWORD_FORGOT', 'Herstel wachtwoord - OpenSupports', 'nl', 'Reset wachtwoord', 'Hallo, {{name}}. U heeft een verzoek gedaan om uw wachtwoord te resetten.', 'Gebruik deze code {{url}}/recover-password?email={{to}}&token={{token}} of klik op de knop hieronder.'),
	(148, 'USER_INVITE', 'Je bent uitgenodigd - OpenSupports', 'nl', 'Je bent uitgenodigd', 'Hallo, {{name}}. U bent uitgenodigd om lid te worden van ons ondersteuningscentrum.', 'Gebruik deze code in {{url}}/recover-password?email={{to}}&token={{token}}&invited=true of klik op de onderstaande knop om uw wachtwoord in te stellen.'),
	(149, 'USER_SYSTEM_DISABLED', 'Toegangssysteem gewijzigd - OpenSupports', 'nl', 'Toegang tot incidenten is gewijzigd', 'Hallo, {{name}}. De toegang tot incidenten is gewijzigd.', 'U kunt uw incidenten bekijken d.m.v. uw email en het incident nummer.Klik op de knop hieronder om uw tickets te bekijken.'),
	(150, 'USER_SYSTEM_ENABLED', 'Account is aangemaakt - OpenSupports', 'nl', 'Account Aangemaakt', 'Hallo, {{name}}. We hebben een account voor u aangemaakt waarmee u uw incidenten kunt bekijken.', 'U kunt inloggen met dit email adres <i>({{to}})</i> en onderstaande wachtwoord.Verander alstublieft het wachtwoord na het inloggen.'),
	(151, 'TICKET_CREATED', '#{{ticketNumber}} Incident aangemaakt - OpenSupports', 'nl', 'Incident aangemaakt', 'Hallo, {{name}}. U heeft zojuist een incident aangemaakt met onderwerp <i>{{title}}</i> in ons support center.', 'U kunt dit incident bekijken via het incidentnummer of via de knop hieronder.'),
	(152, 'TICKET_RESPONDED', '#{{ticketNumber}} Nieuw antwoord - OpenSupports', 'nl', 'Nieuw antwoord', 'Hallo, {{name}}. Een incident met onderwerp <i>{{title}}</i> heeft eeb nieuw antwoord.', 'U kunt dit incident bekijken via het incidentnummer. Of klik op de knop hieronder.'),
	(153, 'TICKET_CLOSED', '#{{ticketNumber}} Incident gesloten - OpenSupports', 'nl', 'Incident is gesloten', 'Hallo, {{name}}. Een incident met onderwerp <i>{{title}}</i> is gesloten.', 'U kunt dit incident bekijken via het incidentnummer. Of klik op de knop hieronder.'),
	(154, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Incident aangemaakt - OpenSupports', 'nl', 'Incident is gesloten', 'Hallo, {{name}}. Een incident met onderwerp <i>{{title}}</i> is gesloten.', 'U kunt dit incident bekijken via het incidentnummer. Of klik op de knop hieronder.'),
	(155, 'USER_SIGNUP', 'Signup {{to}} - OpenSupports', 'pl', 'Zweryfikuj swoje konto', 'Witamy w naszym centrum pomocy, {{name}}!. Musisz zweryfikować tego maila, aby uzyskać dostęp do swojego konta.', 'Użyj kodu weryfikacyjnego{{url}}/tokena weryfikacji/{{to}}/{{verificationToken}} lub kliknij przycisk poniżej.'),
	(156, 'USER_PASSWORD', 'Edycja hasła - OpenSupports', 'pl', 'Hasło zostało zmienione', 'Hej, {{name}}. Twoje hasło zostało zmienione w panelu Klienta.', ''),
	(157, 'USER_EMAIL', 'Edycja e-mail - OpenSupports', 'pl', 'Mail został zmieniony', 'Hej, {{name}}. Twój adres e-mail został zmieniony na {{newemail}} w panelu Klienta.', ''),
	(158, 'PASSWORD_FORGOT', 'Odzyskaj hasło - OpenSupports', 'pl', 'Hasło odzyskane', 'Hej, {{name}}. Zażądałeś odzyskania hasła.', 'Użyj tego linka {{url}}/recover-password?email={{to}}&token={{token}} lub kliknij przycisk poniżej.'),
	(159, 'USER_INVITE', 'Zostałeś zaproszony - OpenSupports', 'pl', 'Zostałeś zaproszony', 'Hej, {{name}}. Zaproszono Cię do dołączenia do naszego centrum wsparcia.', 'Użyj tego kodu w {{url}}/recover-password?email={{to}}&token={{token}}&invited=true lub kliknij przycisk poniżej, aby ustawić hasło.'),
	(160, 'USER_SYSTEM_DISABLED', 'Zmieniono dostęp do systemu - OpenSupports', 'pl', 'Zmieniono dostęp do systemu', 'Hello, {{name}}. System dostępu do zgłoszeń uległ zmianie', 'Możesz uzyskać dostęp do swoich zgoszeń i sprawdzić je, używając adresu e-mail i numeru zgłoszenia. Kliknij poniższy przyciś, aby zobaczyć swoje zgłoszenia.'),
	(161, 'USER_SYSTEM_ENABLED', 'Twporzenie konta - OpenSupports', 'pl', 'Konto zostało utworzone', 'Hello, {{name}}. Stworzyliśmy konto, na którym możesz uzyskać dostęp do wysłanych przez Ciebie zgłoszeń.', 'Możesz uzyskać dostęp do swojego konta za pomocą tego e-maila <i>({{to}})</i> i hasła poniżej. Zmień hasło zaraz po zalogowaniu'),
	(162, 'TICKET_CREATED', '#{{ticketNumber}} Tworzenie zgłoszenia - OpenSupports', 'pl', 'Zgłoszenie utworzono', 'Hello, {{name}}. Wysłałeś nowe zgłoszenie zatytułowane <i>{{title}}</i> do naszego centrum pomocy.', 'Możesz uzyskać dostęp do zgłoszenia poprzez jego numer lub kliknij w przycisk poniżej.'),
	(163, 'TICKET_RESPONDED', '#{{ticketNumber}} Nowa odpowiedź - OpenSupports', 'pl', 'Odpowiedź na zgłoszenie', 'Hello, {{name}}. Otrzymałeś odpowiedź na zgłoszenie zatytułowane <i>{{title}}</i>.', 'Kliknij poniżej, aby zobaczyć nową odpowiedź.'),
	(164, 'TICKET_CLOSED', '#{{ticketNumber}} Zamknięcie zgłoszenia - OpenSupports', 'pl', 'Zgłoszenie zamknięto', 'Hello, {{name}}. Zgłoszenie pod tytułem <i>{{title}}</i> zostało zamknięte.', 'Możesz uzyskać dostęp do zgłoszenia poprzez jego numer lub kliknij w przycisk poniżej.'),
	(165, 'TICKET_CREATED_STAFF', '#{{ticketNumber}} Utworzono zgłoszenie - OpenSupports', 'pl', 'Zgłoszenie utworzono', 'Użytkownik {{name}} utworzył nowe zgłoszenie pod tytułem <i>{{title}}</i>.', 'Możesz uzyskać dostęp do zgłoszenia po jego numerze.');
/*!40000 ALTER TABLE `mailtemplate` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.recoverpassword
CREATE TABLE IF NOT EXISTS `recoverpassword` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.recoverpassword: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `recoverpassword` DISABLE KEYS */;
INSERT INTO `recoverpassword` (`id`, `email`, `token`, `staff`) VALUES
	(1, 'test@test.com', '37bcff221655052b85709aed4e16cb01', 0),
	(2, 'admin2@gmail.com', '9bfa10867b3ae47e948a7252b39d3e94', 1);
/*!40000 ALTER TABLE `recoverpassword` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.sessioncookie
CREATE TABLE IF NOT EXISTS `sessioncookie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creation_date` double DEFAULT NULL,
  `expiration_date` double DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_sessioncookie_user` (`user_id`),
  CONSTRAINT `c_fk_sessioncookie_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.sessioncookie: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sessioncookie` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessioncookie` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.setting: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `name`, `value`) VALUES
	(1, 'language', 'en'),
	(2, 'recaptcha-public', ''),
	(3, 'recaptcha-private', ''),
	(4, 'server-email', ''),
	(5, 'imap-host', NULL),
	(6, 'imap-user', NULL),
	(7, 'imap-pass', NULL),
	(8, 'smtp-host', ''),
	(9, 'smtp-user', ''),
	(10, 'smtp-pass', ''),
	(11, 'maintenance-mode', '0'),
	(12, 'layout', 'boxed'),
	(13, 'allow-attachments', '1'),
	(14, 'max-size', '100'),
	(15, 'title', 'Userpanel Support'),
	(16, 'url', 'http://localhost/userpanel/ticket'),
	(17, 'registration', '1'),
	(18, 'last-stat-day', '202201301812'),
	(19, 'ticket-gap', '604349'),
	(20, 'ticket-first-number', '855927'),
	(21, 'session-prefix', 'opensupports-77d27c0b8671202a8614fa69f7f612cc_'),
	(22, 'mail-template-header-image', 'https://s3.amazonaws.com/opensupports/logo.png'),
	(23, 'default-department-id', '1'),
	(24, 'default-is-locked', '0'),
	(25, 'imap-token', ''),
	(26, 'mandatory-login', '1');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) unsigned DEFAULT NULL,
  `send_email_on_new_ticket` int(11) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_token` tinyint(1) unsigned DEFAULT NULL,
  `disabled` tinyint(1) unsigned DEFAULT NULL,
  `last_login` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.staff: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `level`, `send_email_on_new_ticket`, `name`, `email`, `password`, `profile_pic`, `verification_token`, `disabled`, `last_login`) VALUES
	(1, 3, 1, 'admin', 'admin@admin.com', '$2y$10$ixhMtMxuuYNye4/zjOV0juiFLlbr5Nz7iy6Y2aix1ziK8QqHHyBvy', '', NULL, NULL, 202202111928),
	(2, 3, 0, 'admin2', 'admin2@gmail.com', '$2y$10$Dr4k0Jb3XAXoAOIlUF8LAObok9awyT/r6NekEC4t5s7C0mcqMvo4i', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.staff_ticket
CREATE TABLE IF NOT EXISTS `staff_ticket` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) unsigned DEFAULT NULL,
  `staff_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_8a53d6ad25611e7060ab030785c3c0cef48bc533` (`staff_id`,`ticket_id`),
  KEY `index_foreignkey_staff_ticket_ticket` (`ticket_id`),
  KEY `index_foreignkey_staff_ticket_staff` (`staff_id`),
  CONSTRAINT `c_fk_staff_ticket_staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c_fk_staff_ticket_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.staff_ticket: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `staff_ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_ticket` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.tag
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.tag: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.tag_ticket
CREATE TABLE IF NOT EXISTS `tag_ticket` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) unsigned DEFAULT NULL,
  `ticket_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_79dc4901a5620abff6d65219e6aef86fe9ab63bc` (`tag_id`,`ticket_id`),
  KEY `index_foreignkey_tag_ticket_tag` (`tag_id`),
  KEY `index_foreignkey_tag_ticket_ticket` (`ticket_id`),
  CONSTRAINT `c_fk_tag_ticket_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c_fk_tag_ticket_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.tag_ticket: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tag_ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_ticket` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_number` int(11) unsigned DEFAULT NULL,
  `unread` tinyint(1) unsigned DEFAULT NULL,
  `unread_staff` tinyint(1) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` double DEFAULT NULL,
  `closed` tinyint(1) unsigned DEFAULT NULL,
  `author_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) unsigned DEFAULT NULL,
  `author` tinyint(1) unsigned DEFAULT NULL,
  `author_id` int(11) unsigned DEFAULT NULL,
  `author_staff` tinyint(1) unsigned DEFAULT NULL,
  `author_staff_id` int(11) unsigned DEFAULT NULL,
  `owner_id` int(11) unsigned DEFAULT NULL,
  `owner` tinyint(1) unsigned DEFAULT NULL,
  `edited_content` tinyint(1) unsigned DEFAULT NULL,
  `edited_title` tinyint(1) unsigned DEFAULT NULL,
  `total_departments` tinyint(1) unsigned DEFAULT NULL,
  `total_owners` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_ticket_department` (`department_id`),
  KEY `index_foreignkey_ticket_author` (`author_id`),
  KEY `index_foreignkey_ticket_author_staff` (`author_staff_id`),
  KEY `index_foreignkey_ticket_owner` (`owner_id`),
  CONSTRAINT `c_fk_ticket_author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_ticket_author_staff_id` FOREIGN KEY (`author_staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_ticket_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_ticket_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.ticket: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`id`, `ticket_number`, `unread`, `unread_staff`, `title`, `content`, `language`, `file`, `date`, `closed`, `author_email`, `author_name`, `department_id`, `author`, `author_id`, `author_staff`, `author_staff_id`, `owner_id`, `owner`, `edited_content`, `edited_title`, `total_departments`, `total_owners`) VALUES
	(1, 855927, 0, 1, 'Antirol in 24/7', '<p>Help!!! xd</p>', 'en', 't855927_7ca005_pngwing.com__11_.png', 202202111816, 0, '', '', 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
	(2, 264625, 0, 1, 'Test for video (ticket user)', '<p class="ql-align-center"><strong>test test</strong></p>', 'en', NULL, 202202111932, 0, '', '', 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
	(3, 868974, 0, 1, 'Test create ticket', '<p>asdasd</p>', 'en', NULL, 202202112304, 0, '', '', 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.ticketevent
CREATE TABLE IF NOT EXISTS `ticketevent` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` double DEFAULT NULL,
  `ticket_id` int(11) unsigned DEFAULT NULL,
  `author_staff_id` int(11) unsigned DEFAULT NULL,
  `file` tinyint(1) unsigned DEFAULT NULL,
  `private` int(11) unsigned DEFAULT NULL,
  `author_user_id` int(11) unsigned DEFAULT NULL,
  `edited_content` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_ticketevent_ticket` (`ticket_id`),
  KEY `index_foreignkey_ticketevent_author_staff` (`author_staff_id`),
  KEY `index_foreignkey_ticketevent_author_user` (`author_user_id`),
  CONSTRAINT `c_fk_ticketevent_author_staff_id` FOREIGN KEY (`author_staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_ticketevent_author_user_id` FOREIGN KEY (`author_user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `c_fk_ticketevent_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.ticketevent: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `ticketevent` DISABLE KEYS */;
INSERT INTO `ticketevent` (`id`, `type`, `content`, `date`, `ticket_id`, `author_staff_id`, `file`, `private`, `author_user_id`, `edited_content`) VALUES
	(1, 'COMMENT', '<p>Test response xd</p>', 202202111817, 1, 1, NULL, 0, NULL, NULL),
	(2, 'COMMENT', '<p>test for video.</p>', 202202111920, 1, NULL, NULL, 0, 2, NULL),
	(3, 'COMMENT', '<p>test for video</p>', 202202111929, 1, 1, NULL, 0, NULL, NULL),
	(4, 'COMMENT', '<p>test for video</p>', 202202111931, 1, NULL, NULL, 0, 2, NULL),
	(5, 'COMMENT', '<p>test for video</p>', 202202112304, 1, NULL, NULL, 0, 2, NULL);
/*!40000 ALTER TABLE `ticketevent` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.ticket_user
CREATE TABLE IF NOT EXISTS `ticket_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_f73b0a7296c1f9101e14c7c4bd6476b9f9a6a2b7` (`ticket_id`,`user_id`),
  KEY `index_foreignkey_ticket_user_ticket` (`ticket_id`),
  KEY `index_foreignkey_ticket_user_user` (`user_id`),
  CONSTRAINT `c_fk_ticket_user_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c_fk_ticket_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.ticket_user: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_user` DISABLE KEYS */;
INSERT INTO `ticket_user` (`id`, `ticket_id`, `user_id`) VALUES
	(1, 1, 2),
	(2, 2, 2),
	(3, 3, 2);
/*!40000 ALTER TABLE `ticket_user` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.topic: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Volcando estructura para tabla ticket.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_date` double DEFAULT NULL,
  `tickets` int(11) unsigned DEFAULT NULL,
  `verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` int(11) unsigned DEFAULT NULL,
  `not_registered` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ticket.user: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `password`, `name`, `signup_date`, `tickets`, `verification_token`, `disabled`, `not_registered`) VALUES
	(1, 'test@test.com', '$2y$10$cSq8DZPKR6dAEFifRGvTt.coRV3diYJ4WCf67x2nDQSJCnfyiGwwe', 'test', 202202111813, 0, NULL, NULL, NULL),
	(2, 'user@user.com', '$2y$10$BjJBNFFEcKdM/YbWpeZQYOrXi.pjMjdhreBPnc0I9o4s7Ws6sge8K', 'user', 202202111815, 3, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
