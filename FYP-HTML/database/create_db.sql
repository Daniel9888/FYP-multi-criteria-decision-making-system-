CREATE TABLE `pen` (
  `id` int(11) NOT NULL,
  `brend` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nib` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `writing-style` varchar(255) NOT NULL,
  `ink-system` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `specification` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `pen`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;