USE chess_society_db;

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE event(
      id INTEGER PRIMARY KEY AUTO_INCREMENT,
      time DATETIME NOT NULL,
      location VARCHAR(255) NOT NULL,
      expires DATETIME
);

INSERT into event(time, location, expires) VALUES ('2015-11-05 14:29:36', 'House', '2018-11-05 14:29:36')