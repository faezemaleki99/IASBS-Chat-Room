CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` text,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
