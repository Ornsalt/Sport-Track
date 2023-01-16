#!/usr/bin/node
"use strict";

var db = require('./sqlite_connection');

var ActivityEntryDAO = function ActivityEntryDAO() {
  this.insert = function (values, callback) {
    db.run("INSERT INTO Data(actId, time, cardio, coordX, coordY, coordZ) VALUES(?, ?, ?, ?, ?, ?);", values, callback);
  };

  this.update = function (key, values, callback) {
    values.push(key);
    db.run("UPDATE Data SET actId = ?, time = ?, cardio = ?, coordX = ?, coordY = ?, coordZ = ? WHERE id == ?", values, callback);
  };

  this["delete"] = function (key, callback) {
    db.run("DELETE FROM Data WHERE id == ?;", [key], callback);
  };

  this.findAll = function (callback) {
    return db.all("SELECT * FROM Data ORDER BY actId, time;", callback);
  };

  this.findByKey = function (key, callback) {
    return db.get("SELECT * FROM Data WHERE id == ?;", [key], callback);
  };

  this.findActivityEntry = function (actId, time, callback) {
    return db.get("SELECT id FROM Data WHERE actId == ? AND time == ?;", [actId, time], callback);
  };

  this.cardio = function (actId, callback) {
    return db.get("SELECT min(cardio), avg(cardio), max(cardio) FROM Data WHERE actId == ?;", [actId], callback);
  };
};

var entry = new ActivityEntryDAO();
module.exports = entry;