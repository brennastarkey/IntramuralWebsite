/* Name: Brenna Starkey & Luke Mason
Date: October 20, 2020
File: proj4.sql
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
team_one_score VARCHAR(60),
team_two_score VARCHAR(60),
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
leauge_ID INT UNSIGNED,
PRIMARY KEY (team_n),
FOREIGN KEY (team_n) REFERENCES team(team_n),
FOREIGN KEY (leauge_ID) REFERENCES league(league_ID)
);


-- populating tables
-- User
INSERT INTO user VALUES (54013911, 'Brenna Starkey', 0), (123456, 'Luke Mason', 1),
(753293, 'Shawn Bowers', 0);

-- Team
INSERT INTO team VALUES ('Team 1', 5, 4, 0) , ('Team 2', 0, 1, 0), ('Team 3', 6, 1, 0);

-- Tournament
INSERT INTO tournament VALUES ('Basketball Tournament', 20201020080000), ('Soccer Tournament', 20201020080000);

-- Schedule
INSERT INTO schedule VALUES ('Team 1', 'Team 3', 20201024073000 , 'McCarthy'),
('Team 2', 'Team 1', 20201024080000, 'Rudolf Fitness Center');

-- League
INSERT INTO league VALUES (101, 'No Club Players', 10, 'Beginner', 'Coed', 'Basketball'),
(102, NULL, 15, 'Intermediate', 'Male', 'Football'), (103, 'Experienced players only',
15, 'Advanced', 'Female', 'Softball');

-- Results
INSERT INTO results VALUES ('Team 1', 'Team 3', 20201024073000, '24', '30'), ('Team 2', 'Team 1', 20201024080000, '45', '40');

-- User on Team
INSERT INTO userOnTeam VALUES (54013911, 'Team 1', 1), (123456, 'Team 1', 0), (753293, 'Team 2', 1);

-- Team in Tournament
INSERT INTO teamInTournament VALUES ('Team 1', 'Basketball Tournament'), ('Team 2', 'Basketball Tournament'), ('Team 3', 'Soccer Tournament');

-- Team in League
INSERT INTO teamInLeague VALUES ('Team 1', 101), ('Team 2', 101), ('Team 3', 103);










