CREATE TABLE sports(
id INT PRIMARY KEY NOT NULL,
label VARCHAR(100) NOT NULL,
img VARCHAR(100) NOT NULL
);

CREATE TABLE countries(
    id INT PRIMARY KEY NOT NULL,
    label VARCHAR(100) NOT NULL,
    img VARCHAR(100) NOT NULL
);

CREATE TABLE competitions(
id INT PRIMARY KEY NOT NULL,
label VARCHAR(100) NOT NULL,
img VARCHAR(100) NOT NULL,
sport_id int NOT NULL,
country_id int NOT NULL,
FOREIGN KEY (sport_id) REFERENCES sport(id),
FOREIGN KEY (country_id) REFERENCES country(id)
);

CREATE TABLE days(
    id INT PRIMARY KEY NOT NULL,
    label VARCHAR(100) NOT NULL
);

CREATE TABLE teams(
id INT PRIMARY KEY NOT NULL,
label VARCHAR(100) NOT NULL,
city VARCHAR(100) NOT NULL,
stadium VARCHAR(100) NOT NULL
);

CREATE TABLE matches(
    id INT PRIMARY KEY NOT NULL,
    home_team_id INT NOT NULL,
    visitor_team_id INT NOT NULL,
    home_team_odds INT NOT NULL,
    visitor__team_odds INT NOT NULL,
    home_team_score INT NOT NULL,
    visitor_team_score INT NULL,
    day_id INT NOT NULL,
    status INT NOT NULL,
    FOREIGN KEY home_team_id REFERENCES teams(id),
    FOREIGN KEY visitor_team_id REFERENCES teams(id),
    FOREIGN KEY day_id REFERENCES days(id)
);

CREATE TABLE users(
    id INT PRIMARY KEY NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    zip VARCHAR(100) NOT NULL,
    balance int NOT NULL,
    freebets INT NOT NULL
);

CREATE TABLE bets(
id INT PRIMARY KEY NOT NULL,
bet float NOT NULL,
win float NOT NULL,
user_id int NOT NULL,
match_id int NOT NULL,
status int NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (match_id) REFERENCES matches(id)
);

API REQUEST:

Afficher tous les prochains matches

"http://api.football-data.org/v2/matches?dateFrom=[TODAY]&dateTo=[TODAY + 10]"

////////////////////////////////////////////////////////////////////////////

Afficher tous les prochains matches selon la ligue :

"http://api.football-data.org/v2/competitions/{id}/matches"