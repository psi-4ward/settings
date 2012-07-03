-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_registry`
-- 

CREATE TABLE `tl_registry` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `category` varchar(255) NOT NULL default '',
  `param` varchar(255) NOT NULL default '',
  `value` text NULL,
  `useUserOverwrite` char(1) NOT NULL default '',
  `userOverwrite` blob NULL,
  `userValue` text NULL,
  `useGroupOverwrite` char(1) NOT NULL default '',
  `groupOverwrite` blob NULL,
  `groupValue` text NULL,
  `useHostOverwrite` char(1) NOT NULL default '',
  `hostOverwrite` blob NULL,
  `hostValue` text NULL,
  PRIMARY KEY  (`id`),
  KEY `param` (`param`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;