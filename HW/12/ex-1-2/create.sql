CREATE TABLE store (
  store_id int NOT NULL AUTO_INCREMENT,
  ZIP int NOT NULL UNIQUE,
  Establishment date ,
  city varchar(255) NOT NULL,
  PRIMARY KEY (store_id)
);

CREATE TABLE management (
  `management_id` int  NOT NULL AUTO_INCREMENT,
  `name_management` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `store_id` int NOT NULL,
  PRIMARY KEY (`management_id`),
  FOREIGN KEY (`store_id`) REFERENCES `store`(`store_id`)
	  FOREIGN KEY (`employee_id`) REFERENCES `store`(`employee_id`)
);

CREATE TABLE `employee` (
  `employee_id` int  NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `Salary` int NOT NULL,
  `Description` varchar(255) ,
  `management_id` int,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`management_id`) REFERENCES `management`(`management_id`)
);

