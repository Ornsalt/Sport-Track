DROP TABLE IF EXISTS Data;
DROP TABLE IF EXISTS Activity;
DROP TABLE IF EXISTS User;

CREATE TABLE IF NOT EXISTS User (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    lastName TEXT NOT NULL,
    birthDay TEXT NOT NULL,
    sex TEXT NOT NULL CHECK(sex IN('♂', '♀', '?')),
    height REAL NOT NULL,
    weight REAL NOT NULL,
    email TEXT NOT NULL UNIQUE,
    passWord TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Activity (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    userId INTEGER NOT NULL,
    date TEXT NOT NULL,
    description TEXT NOT,
    start TEXT NOT NULL,
    duration TEXT NOT NULL,
    cardMin INTEGER NOT NULL,
    cardAvg INTEGER NOT NULL,
    cardMax INTEGER NOT NULL,

    FOREIGN KEY(userId) REFERENCES User(id) ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS Data (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    actId INTEGER,
    time TEXT NOT NULL,
    cardio INTEGER NOT NULL,
    coordX REAL NOT NULL,
    coordY REAL NOT NULL,
    coordZ REAL NOT NULL,

    FOREIGN KEY(actId) REFERENCES Activity(id) ON DELETE CASCADE ON UPDATE NO ACTION
);