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
	PRIMARY KEY (username)
	)
      ENGINE=InnoDB DEFAULT CHARSET=utf8;
   END;
