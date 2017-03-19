delimiter |
CREATE PROCEDURE CreateUserTables ()
   BEGIN
      CREATE TABLE Student
	(
	username CHAR(50),
	password CHAR(127),
	PRIMARY KEY (username)
	);
    
    CREATE TABLE Admin
	(
	username CHAR(50),
	password CHAR(127),
	PRIMARY KEY (username)
	);
    
    CREATE TABLE SuperAdmin
	(
	username CHAR(50),
	password CHAR(127),
	PRIMARY KEY (username)
	);
	
	CREATE TABLE AllUsers
	(
	username CHAR(50),
	password CHAR(127),
	userClass CHAR(15),
	PRIMARY KEY (username)
	);
	
	CREATE TABLE location
	(
	name VARCHAR(50),
	latitude VARCHAR(100),
	longitude VARCHAR(100)
	);
	
	CREATE TABLE project.Events
	(
	event_id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255),
	description VARCHAR(500),
	location VARCHAR(100),
	time datetime,
	category VARCHAR(50),
	contact_phone VARCHAR(12),
	contact_email VARCHAR(100),
	view VARCHAR(20),
	PRIMARY KEY(event_id),
	FOREIGN KEY (location) references project.location (name)
	);
	
	CREATE TABLE EventAdmin
	(
	username CHAR(50),
	event_id INT NOT NULL,
	FOREIGN KEY (event_id) references project.Events (event_id) ON DELETE CASCADE,
	FOREIGN KEY (username) references project.Admin (username) 
	)
      ENGINE=InnoDB DEFAULT CHARSET=utf8;
   END;
