/* Name: Brenna Starkey & Luke Mason
Date: October 20, 2020
File: proj5.sql
Class: CPSC 321, Bowers
Description: */

SET sql_mode = STRICT_ALL_TABLES;

DROP TABLE IF EXISTS results, schedule, userOnTeam,teamInLeague, teamInTournament, tournament, team, user, league;

-- User entity
CREATE TABLE user(
GU_ID INT UNSIGNED,
user_n VARCHAR(60),
is_admin BOOLEAN,
PRIMARY KEY(GU_ID)
);

-- Team entity
CREATE TABLE team(
team_n VARCHAR(60),
wins INT UNSIGNED,
losses INT UNSIGNED,
ties INT UNSIGNED,
sportsmanship_rating INT UNSIGNED,
PRIMARY KEY (team_n)
);

-- Tournament entity
CREATE TABLE tournament(
tourney_n VARCHAR(60),
tourney_date DATETIME,
PRIMARY KEY (tourney_n)
);

-- Schedule of games entity to be played
CREATE TABLE schedule (
team_one VARCHAR(60),
team_two VARCHAR(60),
date_of_game DATETIME,
game_location VARCHAR(60),
PRIMARY KEY (team_one, team_two, date_of_game),
FOREIGN KEY (team_one) REFERENCES team (team_n),
FOREIGN KEY (team_two) REFERENCES team (team_n)
);

-- League entity that teams can join
CREATE TABLE league (
league_ID INT UNSIGNED,
rule VARCHAR(60),
max_players INT UNSIGNED,
league_level VARCHAR(60),
gender VARCHAR(60),
sport VARCHAR(60),
PRIMARY KEY (league_ID)
);

-- Results of games that are played
CREATE TABLE results (
team_one VARCHAR(60),
team_two VARCHAR(60),
date_of_game DATETIME,
team_one_score INT,
team_two_score INT,
PRIMARY KEY (team_one, team_two, date_of_game),
FOREIGN KEY (team_one, team_two, date_of_game) 
	REFERENCES schedule(team_one, team_two, date_of_game)
);

-- User on team relational table
CREATE TABLE userOnTeam (
GU_ID INT UNSIGNED,
team_n VARCHAR(60),
is_captain BOOLEAN,
PRIMARY KEY (GU_ID),
FOREIGN KEY (GU_ID) REFERENCES user(GU_ID),
FOREIGN KEY (team_n) REFERENCES team(team_n)
);

-- Team in tournament relational table
CREATE TABLE teamInTournament (
team_n VARCHAR(60),
tourney_n VARCHAR(60),
PRIMARY KEY (team_n, tourney_n),
FOREIGN KEY (team_n) REFERENCES team(team_n),
FOREIGN KEY (tourney_n) REFERENCES tournament(tourney_n)
);

-- Team in league relational table
CREATE TABLE teamInLeague (
team_n VARCHAR(60),
league_ID INT UNSIGNED,
PRIMARY KEY (team_n),
FOREIGN KEY (team_n) REFERENCES team(team_n),
FOREIGN KEY (league_ID) REFERENCES league(league_ID)
);


-- Insert Statements
-- User
INSERT INTO user VALUES (54013911, 'Brenna Starkey', 1), (123456, 'Luke Mason', 1),
(753293, 'Shawn Bowers', 0), (324313, 'Grace Tompkins', 0), (6583928, 'Anna Kenyon', 0),
(637562, 'Sophie Landers', 0), (233901, 'Mia Scelfo', 0), (727349, 'Kerynica Keyes', 0),
(129402, 'Ben Hogan', 0), (324628, 'Bob Smith', 0), (392017, 'Alice Anders', 0),
(345921, 'Dan Humphrey', 0), (952619, 'Andrew Ray', 0), (888372, 'Yacine Guermali', 0), 
(333288, 'Cullen McEachern', 0), (224771, 'Sam McCloughan', 0);

-- Team
INSERT INTO team VALUES ('Team 1', 4, 0, 1, 4) , ('Team 2', 1, 0, 3, 3),
('Team 3', 6, 1, 0, 3), ('The Rockets', 5, 4, 2, 4), ('Laker Nation', 2, 2, 0, 5),
('Sluggers', 1, 2, 0, 4), ('Lightning Bolts', 0, 4, 0, 3), ('Ballers', 3, 3, 0, 4),
('Big Cats', 4, 4, 0, 3), ('Tiger Kings', 3, 2, 0, 2);

-- Tournament
INSERT INTO tournament VALUES ('Basketball Tournament', 20201020080000), ('Soccer Tournament', 20201020080000),
('World Cup', 20201203073000), ('Softball Tournament', 20201108103000);

-- Schedule
INSERT INTO schedule VALUES ('Team 1', 'Team 3', 20201024073000 , 'McCarthy'),
('Team 2', 'Team 1', 20201024080000, 'Rudolf Fitness Center'), ('The Rockets', 'Laker Nation',
20201027091500, 'Rudolf Fitness Center'), ('Sluggers', 'Lightning Bolts', 20201113120000, 'Mulligan Field'),
('Tiger Kings', 'Big Cats', 20201114123000, 'Mulligan Field'), ('Ballers', 'Team 1', 20201221083000, 'McCarthy'),
('Team 1', 'Team 3', 20201113042500,'Rudolf Fitness Center'), ('Ballers', 'Team 1', 20201225083000, 'McCarthy');

-- League
INSERT INTO league VALUES (101, 'No Club Players', 10, 'Beginner', 'Coed', 'Basketball'),
(102, NULL, 15, 'Intermediate', 'Male', 'Football'), (103, 'Experienced players only',
15, 'Advanced', 'Female', 'Softball');

-- Results
INSERT INTO results VALUES ('Team 1', 'Team 3', 20201024073000, 24, 30), ('Team 2', 'Team 1', 20201024080000, 45, 40),
('The Rockets', 'Laker Nation', 20201027091500, 36, 38), ('Sluggers', 'Lightning Bolts', 20201113120000, 38, 38),
('Tiger Kings', 'Big Cats', 20201114123000, 40, 41), ('Ballers', 'Team 1', 20201225083000, 23, 35),
('Ballers', 'Team 1', 20201221083000, 34, 45), ('Team 1', 'Team 3', 20201113042500, 50, 51);

-- User on Team
INSERT INTO userOnTeam VALUES (54013911, 'Team 1', 1), (123456, 'Team 1', 0), (753293, 'Team 2', 1),
(324313, 'Team 3', 0), (6583928, 'Team 3', 1), (637562, 'Team 3', 0), (233901, 'Team 3', 0),
(727349, 'The Rockets', 1), (129402, 'The Rockets', 0), (324628, 'Laker Nation', 0),
(392017, 'Laker Nation', 1), (345921, 'Lightning Bolts', 0), (952619, 'Ballers', 1);

-- Team in Tournament
INSERT INTO teamInTournament VALUES ('Team 1', 'Basketball Tournament'), ('Team 2', 'Basketball Tournament'),
('Team 3', 'Soccer Tournament');

-- Team in League
INSERT INTO teamInLeague VALUES ('Team 1', 101), ('Team 2', 101), ('Team 3', 103);


-- Query Statements
-- 1. Get all users that are admin
SELECT u.user_n AS 'Name', u.GU_ID
FROM user u
WHERE u.is_admin = 1;

-- 2. Get all teams above a specific win value
SELECT t.team_n AS 'Team Name', t.wins, t.losses
FROM team t
WHERE t.wins > 4;

-- 3. Get all games that are in a certain date range
SELECT s.team_one, s.team_two, s.date_of_game
FROM schedule s
WHERE s.date_of_game BETWEEN 20201001000000 AND 20201031235959;

-- 4. Get all leagues that are a certain gender
SELECT l.league_ID, l.league_level, l.sport, l.gender
FROM league l
WHERE l.gender = "Female";

-- 5. Get all leagues that are a certain level
SELECT l.league_ID, l.league_level, l.sport, l.gender
FROM league l
WHERE l.league_level = "Beginner";

-- 6. Get all names on a specific team
SELECT u1.user_n AS 'Captain', u2.team_n AS 'Team Name'
FROM user u1 JOIN userOnTeam u2 USING (GU_ID)
WHERE u2.team_n = "Team 1";

-- 7. Get all users that aren't on a team
(SELECT u1.user_n AS 'Name', u1.GU_ID
FROM user u1)
EXCEPT
(SELECT u1.user_n, u1.GU_ID
FROM user u1 JOIN userOnTeam u2 USING (GU_ID));

-- 8. Get all the teams in a specific tournament
SELECT t1.team_n, t1.tourney_n
FROM teamInTournament t1
WHERE t1.tourney_n = "Basketball Tournament";

-- 9. Get all the teams in a specific league
SELECT t1.team_n, l1.league_ID
FROM teamInLeague t1 JOIN league l1 USING (league_ID)
WHERE l1.league_ID = 101;

-- 10. Get all the wins and losses of all the teams in a league
SELECT t1.team_n, t1.wins, t1.losses, t1.ties, l1.league_ID
FROM team t1 JOIN teamInLeague l1 USING (team_n)
WHERE l1.league_ID = 101;

-- 11. Count all the games a specific team has played
SELECT t1.team_n, COUNT(*)
FROM team t1 JOIN schedule s1
WHERE t1.team_n = s1.team_one OR t1.team_n = s1.team_two;

-- 12. Count all the times two specific teams have played each other
SELECT t1.team_n, t2.team_n, COUNT(*)
FROM schedule s1, team t1, team t2
WHERE (t1.team_n = s1.team_one AND t2.team_n = s1.team_two) OR
		(t1.team_n = s1.team_two AND t2.team_n = s1.team_one);

-- 13. Get all the rules for every league and put it into another table
SELECT l1.league_ID, l1.rule
FROM league l1;

-- 14. Get all sports that have a specific max-player minimum
SELECT l1.league_ID, l1.sport
FROM  league l1
WHERE l1.max_players > 5;







