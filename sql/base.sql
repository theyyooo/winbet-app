CREATE TABLE sports(
id INT PRIMARY KEY NOT NULL,
label VARCHAR(100) NOT NULL,
img VARCHAR(100) NOT NULL
);

CREATE TABLE matchs(
    id INT PRIMARY KEY NOT NULL,
    home_team_score INT NOT NULL,
    visitor_team_score INT NULL,
    home_team_label VARCHAR(100) NOT NULL,
    visitor_team_label VARCHAR(100) NOT NULL,
    status INT NOT NULL
);

CREATE TABLE users(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    balance int NOT NULL
);

CREATE TABLE bets(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
bet float NOT NULL,
odds float NOT NULL,
user_id int NOT NULL,
match_id int NOT NULL,
status int NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (match_id) REFERENCES matchs(id)
);

API REQUEST:

Afficher tous les prochains matches

"http://api.football-data.org/v2/matches?dateFrom=[TODAY]&dateTo=[TODAY + 10]"

////////////////////////////////////////////////////////////////////////////

Afficher tous les prochains matches selon la ligue :

"http://api.football-data.org/v2/competitions/{id}/matches"