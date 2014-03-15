-- This file contains an (incomplete) set of SQL commands that when executed
-- populate the database with the fields needed for Hope Church North Park
-- NB: some of these commands may need to be prefixed with:
-- SET foreign_key_checks = 0;

---- Age Groups
INSERT INTO age (name, lower, upper) VALUES
       ('Adult', 18, NULL),('Youth', 13, 17),('Child', 4, 12),('Infant', 0, 3);

---- Discipleship Stages and Mentor Roles
INSERT INTO dstage (name) VALUES
       ('Sunday Gathering'),('Community Group'),('Membership'),
       ('Application'),('Re-establish Contact');
INSERT INTO dstage_role (discipleshipstage_id, role_id) VALUES
       (1,2),(2,9),(3,7),(3,2),(3,3),(3,8),(4,7),(4,2),(4,3),(4,8),(5,2);
