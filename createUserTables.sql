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
	
	CREATE TABLE project.Events
	(
	event_id INT NOT NULL AUTO_INCREMENT,
	id INTEGER,
	title VARCHAR(255),
	subtitle VARCHAR(255),
	description VARCHAR(500),
	location VARCHAR(100),
	location_url VARCHAR(255),
	starts VARCHAR(50),
	ends VARCHAR(50),
	ongoing BOOLEAN,
	category VARCHAR(50),
	tags VARCHAR(255),
	contact_name VARCHAR(75),
	contact_phone VARCHAR(12),
	contact_email VARCHAR(100),
	url VARCHAR(255),
	view VARCHAR(20),
	PRIMARY KEY(event_id)
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
