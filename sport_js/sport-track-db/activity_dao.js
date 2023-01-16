#!/usr/bin/node
let db = require('./sqlite_connection');

var ActivityDAO = function() {
    this.insert = function(values, callback) {
        db.run("INSERT INTO Activity(userId, date, description, start, duration, cardMin, cardAvg, cardMax, distance) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);", values, callback);
    };

    this.update = function(key, values, callback) {
        values.push(key);
        db.run("UPDATE Activity SET userId = ?, date = ?, description = ?, start = ?, duration = ?, cardMin = ?, cardAvg = ?, cardMax = ?, distance =  ? WHERE id == ?", values, callback);
    };

    this.delete = function(key, callback) {
        db.run("DELETE FROM Activity WHERE id == ?;", [key], callback);
    };

    this.findAll = function(callback) {
        return (db.all("SELECT * FROM Activity ORDER BY date, description;", callback));
    };

    this.findByKey = function(key, callback) {
        return (db.all("SELECT * FROM Activity WHERE userId == ?;", [key], callback));
    };

    this.findActivity = function(userId, date, description, start, callback) {
        return (db.get("SELECT id FROM Activity WHERE userId == ? AND date == ? AND description == ? AND start == ? ORDER BY id DESC;", [userId, date, description, start], callback));
    };
};

var act = new ActivityDAO();
module.exports = act;