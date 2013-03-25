-- DEBUG
DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS role;
DROP TABLE IF EXISTS person_role;
DROP TABLE IF EXISTS person_role;
DROP TABLE IF EXISTS family;
DROP TABLE IF EXISTS smallgroup;
DROP TABLE IF EXISTS action;
DROP TABLE IF EXISTS action_required;

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
       email         VARCHAR(128),
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
CREATE TABLE IF NOT EXISTS role (
       id            INT NOT NULL AUTO_INCREMENT,	
       role_name     VARCHAR(128),
       PRIMARY KEY (id)
       );

-- People Roles
---- This table lists the roles for each person in the church 
---- E.g. One person may be a "Leader" and a "Member" so they will get two rows
---- in this table.
CREATE TABLE IF NOT EXISTS person_role (
       id            INT NOT NULL AUTO_INCREMENT,
       person_id     INT NOT NULL,
       role_id	     INT NOT NULL,
       PRIMARY KEY (id),
       UNIQUE (id, person_id, role_id),
       KEY person_id (person_id),
       KEY role_id (role_id)
       );

-- Families
---- A Person *may* have an associated Family, which will allow us to group
---- people based on their family allegiances (esp. for mail-outs). It will also
---- allow a 'fill' of information that we have for the family, but not for say,
---- a baby.
CREATE TABLE IF NOT EXISTS family (
       id            INT NOT NULL AUTO_INCREMENT,
       name          VARCHAR(128) NOT NULL, -- family name cannot be null
       date_created  DATE NOT NULL,
       phone_cell    CHAR(20),
       phone_home    CHAR(20),
       addr_first    VARCHAR(128),
       addr_second   VARCHAR(128),
       addr_city     VARCHAR(128),
       addr_state    VARCHAR(128),
       addr_zip      VARCHAR(128),
       addr_country  VARCHAR(128),
       -- foreign keys
       smallgroup_id INT,
       leader_id     INT,
       -- indexes
       PRIMARY KEY (id),
       UNIQUE (id)
       );

-- Small Group
---- Represents a Small Group. A person may (and hopefully will) have ONE
---- associated Small Group. This allows us to manage lists of small group
---- members.
CREATE TABLE IF NOT EXISTS smallgroup (
       id            INT NOT NULL AUTO_INCREMENT,
       group_name    VARCHAR(128) NOT NULL, -- family name cannot be null
       date_created  DATE NOT NULL,
       meet_time     DATETIME,
       meet_location TEXT,
       -- ak isn't sure that address is necessary, but might be nice for
       -- generating 'welcome' type letters?
       addr_first    VARCHAR(128),
       addr_second   VARCHAR(128),
       addr_city     VARCHAR(128),
       addr_state    VARCHAR(128),
       addr_zip      VARCHAR(128),
       addr_country  VARCHAR(128),
       -- foreign keys
       leader_id     INT,
       -- indexes
       PRIMARY KEY (id),
       UNIQUE (id)
       );

-- Action Types
---- These capture the types of things that a person is 'waiting' for (even
---- though they may not know they are)
CREATE TABLE IF NOT EXISTS action (
       id            INT NOT NULL AUTO_INCREMENT,	
       action_name   VARCHAR(128),
       priority      ENUM('info', 'low', 'medium', 'high', 'critical'),
       PRIMARY KEY (id)
       );

-- Actions Required
---- This table records the actual things that a person is waiting for, by using
---- the Action Types
CREATE TABLE IF NOT EXISTS action_required (
       id            INT NOT NULL AUTO_INCREMENT,
       person_id     INT NOT NULL,
       action_id     INT NOT NULL,
       PRIMARY KEY (id),
       UNIQUE (id, person_id, action_id),
       KEY person_id (person_id),
       KEY action_id (action_id)
       );

-- Attendance Type (Event)
---- These capture the types of attendance records we keep. The most important
---- one is Sunday Church attendance, but also Small Group attendance. And we
---- might be able to imagine others, say "All Campus" events etc.
---- AK thinks we could extend this later to include a 'date' to capture one-off
---- events. Say, the Easter Morning service
CREATE TABLE IF NOT EXISTS event (
       id            INT NOT NULL AUTO_INCREMENT,	
       event_name    VARCHAR(128),
       PRIMARY KEY (id)
       );

-- Attendance
---- Used to record the actual date and type of 'event' that a person attended
CREATE TABLE IF NOT EXISTS attendance (
       id            INT NOT NULL AUTO_INCREMENT,
       date          DATE NOT NULL,
       person_id     INT NOT NULL,
       event_id      INT NOT NULL,
       PRIMARY KEY (id),
       UNIQUE (id, date, person_id, event_id),
       KEY date (date),
       KEY person_id (person_id),
       KEY event_id (event_id)
       );
