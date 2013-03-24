DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS person_roles;

-- Individuals Table
---- This is the core of the system, and almost all other tables will reference
---- an individual (a 'person') by their ID number.
CREATE TABLE IF NOT EXISTS person (
       id            INT NOT NULL AUTO_INCREMENT,
       name_first    VARCHAR(128) NOT NULL, -- first name cannot be null
       name_last     VARCHAR(128),
       date_created  DATE NOT NULL,
       phone_cell    CHAR(20),
       phone_home    CHAR(20),
       addr_first    VARCHAR(128),
       addr_second   VARCHAR(128),
       addr_city     VARCHAR(128),
       addr_state    VARCHAR(128),
       addr_zip      VARCHAR(128),
       addr_country  VARCHAR(128),
       facebook      BOOLEAN,
       -- foreign keys
       family_id     INT,
       smallgroup_id INT,
       leader_id     INT,
       -- indexes
       PRIMARY KEY (id),
       UNIQUE (id),
       KEY full_name (name_first, name_last)
       );

-- Roles
---- This table lists the possible roles for a person
---- E.g. "Leader", "Member", "Guest", etc.
CREATE TABLE IF NOT EXISTS roles (
       id            INT NOT NULL AUTO_INCREMENT,	
       role_name     VARCHAR(128),
       PRIMARY KEY (id)
       );

-- People Roles
---- This table lists the roles for each person in the church 
---- E.g. One person may be a "Leader" and a "Member" so they will get two rows
---- in this table.
CREATE TABLE IF NOT EXISTS person_roles (
       id            INT NOT NULL AUTO_INCREMENT,
       person_id     INT NOT NULL,
       role_id	     INT NOT NULL,
       PRIMARY KEY (id),
       UNIQUE (id, person_id, role_id),
       KEY person_id (person_id),
       KEY role_id (role_id)
       );
