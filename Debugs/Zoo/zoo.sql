DROP DATABASE if EXISTS zoo;
CREATE DATABASE zoo;
USE zoo;





CREATE TABLE employee /*сотрудник*/ 
(
	id_employee   INT AUTO_INCREMENT PRIMARY KEY,
	name          VARCHAR(255) NOT NULL,
	post          VARCHAR(30) NOT NULL,
	salary        INT NOT NULL,
	birth         VARCHAR(30) NOT NULL,
	address       VARCHAR(255) NOT NULL,
	about         TEXT		 
);





CREATE TABLE employee_phone /*телефон сотрудника*/ 
(
	id_employee  INT NOT NULL,
	phone        VARCHAR(50) NOT NULL,
		FOREIGN KEY (id_employee) REFERENCES employee (id_employee) ON DELETE CASCADE ON UPDATE CASCADE
);





CREATE TABLE class /*классификация*/ 
(
	id_class      INT AUTO_INCREMENT PRIMARY KEY,
	class_name    VARCHAR(50) NOT NULL
);





CREATE TABLE class_food /*еда класса*/
(
	id            INT AUTO_INCREMENT PRIMARY KEY,
	id_class      INT NOT NULL,
	food          VARCHAR(30),
	seller_name   VARCHAR(30) NOT NULL,  
	seller_adress VARCHAR(255),
	seller_phone  VARCHAR(30),
		FOREIGN KEY (id_class) REFERENCES class (id_class)
);







CREATE TABLE animal /*животное*/ 
(
	id_animal     INT AUTO_INCREMENT PRIMARY KEY,
	name          VARCHAR(30) NOT NULL,
	breed         VARCHAR(30) NOT NULL,
	animal_class  INT NOT NULL,
	birth_date    VARCHAR(30) NOT NULL,
	birth_place   VARCHAR(255) NOT NULL,
	id_employee   INT NOT NULL,
	photo_dir     VARCHAR(255),
	id_parent1    INT,
	id_parent2    INT,
	about         TEXT,  
		FOREIGN KEY (animal_class) REFERENCES class (id_class),
		FOREIGN KEY (id_employee) REFERENCES employee (id_employee)
);





CREATE TABLE medical /*мед карта*/ 
(
	id_animal    INT PRIMARY KEY,
	weight       INT NOT NULL,
	height       INT NOT NULL,
	last_seen    VARCHAR(30) NOT NULL,
	diagnosis    TEXT,  
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE
);







