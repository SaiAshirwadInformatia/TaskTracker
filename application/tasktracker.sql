-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2016 at 11:27 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tasktracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `key` varchar(128) NOT NULL,
  `color` varchar(64) NOT NULL,
  `start_date` date NOT NULL,
  `access_token` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastmodified_ts` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `key`, `color`, `start_date`, `access_token`, `is_active`, `creation_ts`, `lastmodified_ts`) VALUES
(1, 'Android', '<p><strong>Android</strong>&nbsp;is a&nbsp;<a href="https://en.wikipedia.org/wiki/Mobile_operating_system">mobile operating system</a>&nbsp;(OS) currently developed by&nbsp;<a href="https://en.wikipedia.org/wiki/Google">Google</a>, based on the&nbsp;<a href="https://en.wikipedia.org/wiki/Linux_kernel">Linux kernel</a>&nbsp;and designed primarily for&nbsp;<a href="https://en.wikipedia.org/wiki/Touchscreen">touchscreen</a>&nbsp;mobile devices such as&nbsp;<a href="https://en.wikipedia.org/wiki/Smartphone">smartphones</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Tablet_computer">tablets</a>. Android&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/User_interface">user interface</a>&nbsp;is mainly based on&nbsp;<a href="https://en.wikipedia.org/wiki/Direct_manipulation_interface">direct manipulation</a>, using touch gestures that loosely correspond to real-world actions, such as swiping, tapping and pinching, to manipulate on-screen objects, along with a&nbsp;<a href="https://en.wikipedia.org/wiki/Virtual_keyboard">virtual keyboard</a>&nbsp;(or a physical one, on older Android devices) for text input. In addition to touchscreen devices, Google has further developed&nbsp;<a href="https://en.wikipedia.org/wiki/Android_TV">Android TV</a>&nbsp;for televisions,&nbsp;<a href="https://en.wikipedia.org/wiki/Android_Auto">Android Auto</a>&nbsp;for cars, and&nbsp;<a href="https://en.wikipedia.org/wiki/Android_Wear">Android Wear</a>&nbsp;for wrist watches, each with a specialized user interface. Variants of Android are also used on&nbsp;<a href="https://en.wikipedia.org/wiki/Laptop">notebooks</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Video_game_console">game consoles</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Digital_camera">digital cameras</a>, and other electronics. As of 2015, Android has the largest&nbsp;<a href="https://en.wikipedia.org/wiki/Installed_base">installed base</a>&nbsp;of all operating systems.<a href="https://en.wikipedia.org/wiki/Android_(operating_system)#cite_note-manjoomurky-13">[11]</a></p>\r\n', 'A', '#1827a5', '2016-02-10', '', 1, '2016-02-07 01:28:06', '2016-02-09 20:32:12'),
(2, 'Java', '<p>This is JAVA</p>\r\n', 'J', '#e20606', '2016-02-08', '', 0, '2016-02-08 14:27:46', NULL),
(7, 'OAracle', '<p>The&nbsp;<strong>Oracle Corporation</strong>&nbsp;is an American&nbsp;<a href="https://en.wikipedia.org/wiki/Multinational_corporation">global</a>&nbsp;computer technology corporation, headquartered in<a href="https://en.wikipedia.org/wiki/Redwood_City,_California">Redwood City, California</a>. The company primarily specializes in developing and marketing&nbsp;<a href="https://en.wikipedia.org/w/index.php?title=Database_software_and_technology&amp;action=edit&amp;redlink=1">database software and technology</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Computer_hardware">computer hardware</a>&nbsp;systems and&nbsp;<a href="https://en.wikipedia.org/wiki/Enterprise_software">enterprise software</a>&nbsp;products &ndash; particularly&nbsp;<a href="https://en.wikipedia.org/wiki/Oracle_Database">its own brands of database management systems</a>. In 2011 Oracle was the&nbsp;<a href="https://en.wikipedia.org/wiki/List_of_the_largest_software_companies">second-largest software maker</a>by revenue, after&nbsp;<a href="https://en.wikipedia.org/wiki/Microsoft">Microsoft</a>.<a href="https://en.wikipedia.org/wiki/Oracle_Corporation#cite_note-4">[4]</a></p>\r\n\r\n<p>The company also develops and builds tools for&nbsp;<a href="https://en.wikipedia.org/wiki/Database">database</a>&nbsp;development and systems of middle-tier software,&nbsp;<a href="https://en.wikipedia.org/wiki/Enterprise_resource_planning">enterprise resource planning</a>&nbsp;(ERP) software,&nbsp;<a href="https://en.wikipedia.org/wiki/Customer_relationship_management">customer relationship management</a>&nbsp;(CRM) software and&nbsp;<a href="https://en.wikipedia.org/wiki/Supply_chain_management">supply chain management</a>&nbsp;(SCM) software.</p>\r\n', 'O', '#d88484', '2016-03-16', '', 1, '2016-02-08 15:24:33', '2016-02-09 03:32:15'),
(8, 'Toshiba', '<p><strong>Toshiba Corporation</strong>&nbsp;(??????&nbsp;<em>Kabushiki-gaisha T?shiba</em><a href="https://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets"><strong>?</strong></a>,&nbsp;<small>English</small>&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/t???i?b?,&nbsp;t?-,&nbsp;to?-/</a><a href="https://en.wikipedia.org/wiki/Toshiba#cite_note-2">[2]</a>)&nbsp;(commonly referred to as&nbsp;<strong>Toshiba</strong>, stylized as&nbsp;<strong>TOSHIBA</strong>) is a Japanese&nbsp;<a href="https://en.wikipedia.org/wiki/Multinational_corporation">multinational</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Conglomerate_(company)">conglomerate</a>&nbsp;corporation headquartered in&nbsp;<a href="https://en.wikipedia.org/wiki/Tokyo">Tokyo</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Japan">Japan</a>. Its diversified products and services include information technology and communications equipment and systems, electronic components and materials, power systems, industrial and social infrastructure systems, consumer electronics, household appliances, medical equipment, office equipment, lighting and logistics.</p>\r\n', 'V', '#113566', '2016-02-25', '$2y$10$DLwG7K./a0HIrI82Wf9xhublfTs38wGX6KZu/iEsBfxigAnRBlN5K', 1, '2016-02-09 12:00:46', NULL),
(11, 'ADminLTE', '<p><strong>AdminLTE</strong>&nbsp;is a popular open source WebApp template for admin dashboards and control panels. It is a responsive HTML template that is based on the CSS framework Bootstrap 3. It utilizes all of the Bootstrap components in its design and re-styles many commonly used plugins to create a consistent design that can be used as a user interface for backend applications. AdminLTE is based on a modular design, which allows it to be easily customized and built upon. This documentation will guide you through installing the template and exploring the various components that are bundled with the template.</p>\r\n\r\n<h2>&nbsp;</h2>\r\n', 'LTE', '#132458', '2016-02-09', '$2y$10$zIQeNXXVjmNrR.lBEFHw0e/ZXTK48hekAUuzTw1W/7fodow4Ruyti', 1, '2016-02-09 12:45:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `releases`
--

CREATE TABLE IF NOT EXISTS `releases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `estimated_release_date` date NOT NULL,
  `actual_release_date` date NOT NULL,
  `is_released` int(11) NOT NULL DEFAULT '0',
  `access_token` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastmodified_ts` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `releases`
--

INSERT INTO `releases` (`id`, `name`, `description`, `project_id`, `start_date`, `estimated_release_date`, `actual_release_date`, `is_released`, `access_token`, `is_active`, `creation_ts`, `lastmodified_ts`) VALUES
(1, 'Android 1.1', '', 1, '2003-08-22', '2005-05-25', '0000-00-00', 0, '', 0, '2016-01-30 03:35:58', '2016-02-09 20:32:47'),
(2, 'Android 1.2', '', 1, '2016-02-26', '2016-02-12', '0000-00-00', 0, '', 0, '2016-02-06 15:44:05', '2016-02-09 20:32:58'),
(3, 'Google', '<p>This is google</p>\r\n', 2, '2016-02-19', '2016-02-18', '0000-00-00', 0, '$2y$10$JERa5FOXHMaXQiYeymNjc..tJ8jtlT72XfzGyOIxUn.MPFKiGbt16', 1, '2016-02-07 04:54:22', NULL),
(4, 'Android 1.3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis suscipit non sapien et fermentum. Donec lectus lacus, aliquet eget ullamcorper at, aliquet sagittis purus. Proin vulputate sapien sem, eget luctus ligula lacinia at. Pellentesque vehicula metus eget augue suscipit, ac tristique massa volutpat. Fusce semper tempus neque, ac ultricies mauris pharetra et. Phasellus arcu lectus, dapibus vitae feugiat vel, commodo sit amet dolor. Proin vestibulum erat sed eros sodales sagittis. Ut fermentum iaculis leo quis elementum.</p>\r\n', 1, '2016-02-09', '2016-02-18', '0000-00-00', 0, '$2y$10$KYkYhAY/Q1euGbWO10Jw5eILWUO6mG6im9cuBnxR/O2Fu6ZFBQ2xK', 1, '2016-02-09 15:00:48', '2016-02-09 20:32:11'),
(5, 'Android 5.0', '<p><strong>Android Lollipop</strong>&nbsp;is a version of the&nbsp;<a href="https://en.wikipedia.org/wiki/Android_(operating_system)">Android</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Mobile_operating_system">mobile operating system</a>&nbsp;developed by&nbsp;<a href="https://en.wikipedia.org/wiki/Google">Google</a>, spanning versions between 5.0 and 5.1.1.<a href="https://en.wikipedia.org/wiki/Android_Lollipop#cite_note-3">[3]</a>&nbsp;Unveiled on June 25, 2014, during the&nbsp;<a href="https://en.wikipedia.org/wiki/Google_I/O">Google I/O</a>&nbsp;conference, it became available through official&nbsp;<a href="https://en.wikipedia.org/wiki/Over-the-air_programming">over-the-air</a>&nbsp;(OTA) updates on November 12, 2014, for select devices that run distributions of Android serviced by Google (such as&nbsp;<a href="https://en.wikipedia.org/wiki/Google_Nexus">Nexus</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Google_Play_edition">Google Play edition</a>&nbsp;devices). Its source code was made available on November 3, 2014.</p>\r\n\r\n<p>One of the most prominent changes in the Lollipop release is a redesigned user interface built around a<a href="https://en.wikipedia.org/wiki/Design_language">design language</a>&nbsp;known as &quot;<a href="https://en.wikipedia.org/wiki/Material_design">Material design</a>&quot;. Other changes include improvements to the notifications, which can be accessed from the lockscreen and displayed within applications as top-of-the-screen banners. Google also made internal changes to the platform, with the&nbsp;<a href="https://en.wikipedia.org/wiki/Android_Runtime">Android Runtime</a>&nbsp;(ART) officially replacing<a href="https://en.wikipedia.org/wiki/Dalvik_virtual_machine">Dalvik</a>&nbsp;for improved application performance, and with changes intended to improve and optimize battery usage.</p>\r\n', 1, '2016-02-11', '2016-02-24', '0000-00-00', 0, '$2y$10$pmieL1a8fiwIWyAsJ8zGMOX2ZVeajfNF3sB.Ba9ptZaEfHPDg/sYK', 1, '2016-02-11 06:27:01', '2016-02-11 06:32:05'),
(6, 'Android 5.0.1', '<p><strong>Android Lollipop</strong>&nbsp;is a version of the&nbsp;<a href="https://en.wikipedia.org/wiki/Android_(operating_system)">Android</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Mobile_operating_system">mobile operating system</a>&nbsp;developed by&nbsp;<a href="https://en.wikipedia.org/wiki/Google">Google</a>, spanning versions between 5.0 and 5.1.1.<a href="https://en.wikipedia.org/wiki/Android_Lollipop#cite_note-3">[3]</a>&nbsp;Unveiled on June 25, 2014, during the&nbsp;<a href="https://en.wikipedia.org/wiki/Google_I/O">Google I/O</a>&nbsp;conference, it became available through official&nbsp;<a href="https://en.wikipedia.org/wiki/Over-the-air_programming">over-the-air</a>&nbsp;(OTA) updates on November 12, 2014, for select devices that run distributions of Android serviced by Google (such as&nbsp;<a href="https://en.wikipedia.org/wiki/Google_Nexus">Nexus</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Google_Play_edition">Google Play edition</a>&nbsp;devices). Its source code was made available on November 3, 2014.</p>\r\n\r\n<p>One of the most prominent changes in the Lollipop release is a redesigned user interface built around a<a href="https://en.wikipedia.org/wiki/Design_language">design language</a>&nbsp;known as &quot;<a href="https://en.wikipedia.org/wiki/Material_design">Material design</a>&quot;. Other changes include improvements to the notifications, which can be accessed from the lockscreen and displayed within applications as top-of-the-screen banners. Google also made internal changes to the platform, with the&nbsp;<a href="https://en.wikipedia.org/wiki/Android_Runtime">Android Runtime</a>&nbsp;(ART) officially replacing<a href="https://en.wikipedia.org/wiki/Dalvik_virtual_machine">Dalvik</a>&nbsp;for improved application performance, and with changes intended to improve and optimize battery usage.</p>\r\n', 1, '2016-02-19', '2016-02-29', '0000-00-00', 0, '$2y$10$UikXF2MXG9pJUu0QqEIoz.GuD1q3l3UEFIzXuYgnP7HoKCK1svhmK', 1, '2016-02-11 06:28:28', '2016-02-11 06:32:15'),
(7, 'Java 1.0', '<p>The&nbsp;<a href="https://en.wikipedia.org/wiki/Java_(programming_language)">Java language</a>&nbsp;has undergone several changes since&nbsp;<a href="https://en.wikipedia.org/wiki/Java_Development_Kit">JDK</a>&nbsp;1.0 as well as numerous additions of&nbsp;<a href="https://en.wikipedia.org/wiki/Class_(computer_science)">classes</a>&nbsp;and packages to the standard&nbsp;<a href="https://en.wikipedia.org/wiki/Library_(computer_science)">library</a>. Since J2SE 1.4, the evolution of the Java language has been governed by the&nbsp;<a href="https://en.wikipedia.org/wiki/Java_Community_Process">Java Community Process</a>&nbsp;(JCP), which uses&nbsp;<em>Java Specification Requests</em>&nbsp;(JSRs) to propose and specify additions and changes to the&nbsp;<a href="https://en.wikipedia.org/wiki/Java_platform">Java platform</a>. The language is specified by the&nbsp;<em>Java Language Specification</em>&nbsp;(JLS); changes to the JLS are managed under&nbsp;<a href="http://www.jcp.org/en/jsr/detail?id=901">JSR 901</a>.</p>\r\n', 2, '2016-02-07', '2016-02-22', '0000-00-00', 0, '$2y$10$l7SZR0pW/lDpjQ9tpM511OIVUvxudASv1g0476RB72ymkQWQp2/wu', 1, '2016-02-11 06:30:35', NULL),
(8, 'java 2.0', '<p>The&nbsp;<a href="https://en.wikipedia.org/wiki/Java_(programming_language)">Java language</a>&nbsp;has undergone several changes since&nbsp;<a href="https://en.wikipedia.org/wiki/Java_Development_Kit">JDK</a>&nbsp;1.0 as well as numerous additions of&nbsp;<a href="https://en.wikipedia.org/wiki/Class_(computer_science)">classes</a>&nbsp;and packages to the standard&nbsp;<a href="https://en.wikipedia.org/wiki/Library_(computer_science)">library</a>. Since J2SE 1.4, the evolution of the Java language has been governed by the&nbsp;<a href="https://en.wikipedia.org/wiki/Java_Community_Process">Java Community Process</a>&nbsp;(JCP), which uses&nbsp;<em>Java Specification Requests</em>&nbsp;(JSRs) to propose and specify additions and changes to the&nbsp;<a href="https://en.wikipedia.org/wiki/Java_platform">Java platform</a>. The language is specified by the&nbsp;<em>Java Language Specification</em>&nbsp;(JLS); changes to the JLS are managed under&nbsp;<a href="http://www.jcp.org/en/jsr/detail?id=901">JSR 901</a>.</p>\r\n', 2, '2016-03-09', '2016-03-16', '0000-00-00', 0, '$2y$10$X9f4eJS36f.BNgb9wfoN2eZAUBtaWVGmhq7U81JZsdb9fd7ujjOTC', 1, '2016-02-11 06:33:23', NULL),
(9, 'Java 3.0', '<p>The&nbsp;<a href="https://en.wikipedia.org/wiki/Java_(programming_language)">Java language</a>&nbsp;has undergone several changes since&nbsp;<a href="https://en.wikipedia.org/wiki/Java_Development_Kit">JDK</a>&nbsp;1.0 as well as numerous additions of&nbsp;<a href="https://en.wikipedia.org/wiki/Class_(computer_science)">classes</a>&nbsp;and packages to the standard&nbsp;<a href="https://en.wikipedia.org/wiki/Library_(computer_science)">library</a>. Since J2SE 1.4, the evolution of the Java language has been governed by the&nbsp;<a href="https://en.wikipedia.org/wiki/Java_Community_Process">Java Community Process</a>&nbsp;(JCP), which uses&nbsp;<em>Java Specification Requests</em>&nbsp;(JSRs) to propose and specify additions and changes to the&nbsp;<a href="https://en.wikipedia.org/wiki/Java_platform">Java platform</a>. The language is specified by the&nbsp;<em>Java Language Specification</em>&nbsp;(JLS); changes to the JLS are managed under&nbsp;<a href="http://www.jcp.org/en/jsr/detail?id=901">JSR 901</a>.</p>\r\n', 2, '2016-04-19', '2016-04-30', '0000-00-00', 0, '$2y$10$M1urMQ.IT0xzNCygwwDBu.5jGty9lh37AeCUMmc6F3IZ6bc7KYjum', 1, '2016-02-11 06:38:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `description` text,
  `type` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL DEFAULT 'OPEN',
  `release_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastmodified_ts` timestamp NULL DEFAULT NULL,
  `start_ts` timestamp NULL DEFAULT NULL,
  `end_ts` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `type`, `state`, `release_id`, `due_date`, `creation_ts`, `lastmodified_ts`, `start_ts`, `end_ts`, `user_id`, `assigned_id`) VALUES
(1, 'Hello Task 1', '', 'bug', 'OPEN', 1, '2016-03-22', '2016-01-24 06:10:06', '2016-02-11 06:32:16', NULL, NULL, 1, 5),
(2, 'My task 2', 'This is for Android 2', 'Discussion', 'assigned', 1, '0000-00-00', '2016-02-01 14:56:42', NULL, NULL, NULL, 1, 5),
(3, 'Task 1', '<p>This is newly created task</p>\r\n', 'story', 'OPEN', 1, '0000-00-00', '0000-00-00 00:00:00', NULL, NULL, NULL, 1, 5),
(4, 'Task 2.1', '<p>This is for android 1.2&nbsp;</p>\r\n', 'bug', 'OPEN', 4, '2016-02-29', '2016-02-10 10:12:52', '2016-02-11 06:32:09', NULL, NULL, 5, 5),
(5, 'Task 3', '<p>This sub tassk of Reality task</p>\r\n', 'sub', 'OPEN', 4, '2016-02-12', '2016-02-10 11:05:58', '2016-02-11 06:32:43', NULL, NULL, 5, 5),
(6, 'Task 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et quam sit amet turpis auctor condimentum non vitae nisi. Aliquam ullamcorper arcu erat, faucibus condimentum justo pellentesque in. Donec vitae erat pretium, iaculis odio et, egestas sem. Quisque at leo consequat est tempor pretium eget in neque. Curabitur cursus porttitor nisi, aliquam dapibus nibh vulputate quis. Nulla congue mi tellus, ac tristique elit vehicula id. Mauris a magna id diam tristique tempor vel ut risus. Suspendisse lorem eros, scelerisque id eros eget, porta varius dolor. Sed nec aliquam dui. Duis id consequat arcu. Maecenas quis enim in purus maximus convallis hendrerit aliquet diam.</p>\r\n\r\n<p>Donec tempus enim ut dolor hendrerit, in luctus ex euismod. Maecenas a scelerisque risus, in ultrices sem. Proin eu gravida mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed felis neque, dapibus vel condimentum vitae, gravida eu orci. Aliquam varius nisi mauris, eu pellentesque augue mollis quis. Nullam aliquam massa sit amet mauris pulvinar commodo.</p>\r\n', 'discussion', 'closed', 2, '2016-02-27', '2016-02-11 06:17:04', '2016-02-11 06:32:40', NULL, NULL, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_comments`
--

CREATE TABLE IF NOT EXISTS `tasks_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks_history`
--

CREATE TABLE IF NOT EXISTS `tasks_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `action` varchar(32) NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks_relations`
--

CREATE TABLE IF NOT EXISTS `tasks_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `relation_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastmodified_ts` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `access_token` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `access_token` (`access_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`, `phone`, `creation_ts`, `lastmodified_ts`, `is_active`, `access_token`) VALUES
(1, 'Akshay', 'Mane', 'mane.akshay1997@gmail.com', 'akshay', '$2y$10$cjH1InudIfIqBuLx9dR2NedfAMxeDs.ONSk6kud1LYUJQM10ZSa7S', '2147483647', '2016-02-06 16:28:52', NULL, 0, ''),
(5, 'Anuj', 'khairnar', 'anujkhairnar5@gmail.com', 'anujk', '$2y$10$cjH1InudIfIqBuLx9dR2NedfAMxeDs.ONSk6kud1LYUJQM10ZSa7S', '98765432', '2016-02-11 06:21:36', NULL, 1, 'asdfkjakdjfhbaskfjn skjvvn'),
(6, 'Brayan', 'Munis', 'brayanmunis2@gmail.com', 'brayan', '$2y$10$0CopaephTgtTOWZ67/3sOOks6aOF7TUYow4IdgsGr4qqceB5maEXS', '7895642130', '2016-02-11 16:37:27', NULL, 0, '$2y$10$Dr.H55SnW143s5G3v4Tds.WJc0xWr9xFeU2HEmJ7nvlwuywATjite');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
