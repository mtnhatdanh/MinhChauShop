CREATE TABLE `counter` (
  `cnt` bigint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `counter`
-- 

INSERT INTO `counter` VALUES (34);

-- --------------------------------------------------------

-- 
-- Table structure for table `online`
-- 

CREATE TABLE `online` (
  `id` varchar(50) NOT NULL,
  `lastvisit` int(14) NOT NULL,
  `user` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;