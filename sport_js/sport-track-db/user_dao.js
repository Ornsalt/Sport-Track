#!/usr/bin/node
let db = require('./sqlite_connection');

var UserDAO = function() {
    this.insert = function(values, callback) {
        db.run("INSERT INTO User(name, lastName, birthDay, sex, height, weight, email, passWord) VALUES(?, ?, ?, ?, ?, ?, ?, ?);", values, callback);
    };

    this.update = function(key, values, callback) {
        values.push(key);
        db.run("UPDATE User SET name = ?, lastName = ?, birthDay = ?, sex = ?, height = ?, weight = ?, email = ?, passWord = ? WHERE id == ?;", values, callback);
    };

    this.delete = function(key, callback) {
        db.run("DELETE FROM User WHERE id == ?;", [key], callback);
    };

    this.findAll = function(callback) {
        return (db.all("SELECT * FROM User ORDER BY name, lastName;", callback));
    };

    this.findByKey = function(key, callback) {
        return (db.get("SELECT * FROM User WHERE id == ?;", [key], callback));
    };

    this.findUser = function(email, callback) {
        return (db.get("SELECT id FROM User WHERE email == ?;", [email], callback));
    };

    this.login = function(email, password, callback) {
        return (db.get("SELECT * FROM User WHERE email == ? AND password == ?;", [email, password], callback));
    }
};

var user = new UserDAO();
module.exports = user;