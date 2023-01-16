#!/usr/bin/node
const sqlite3 = require('sqlite3').verbose();

var db = new sqlite3.Database(__dirname + '/sport_track.db', sqlite3.OPEN_READWRITE, err => {
    if (err) {
         throw (err);
    }
});

module.exports = db;