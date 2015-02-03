CREATE TABLE IF NOT EXISTS `#__video4you_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `text` TEXT NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT '0',
  `image` varchar(256) NOT NULL,
  `video480p` varchar(256) NOT NULL,
  `video720p` varchar(256) NOT NULL,
  `video1080p` varchar(256) NOT NULL,
  `user_created` int(11) NOT NULL DEFAULT '0',
  `user_modified` int(11) NOT NULL DEFAULT '0',
  `date_created` DATETIME NOT NULL,
  `date_modified` DATETIME NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` DATETIME NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;