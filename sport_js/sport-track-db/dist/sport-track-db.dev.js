#!/usr/bin/node
"use strict";

module.exports = {
  db: require('./sqlite_connection'),
  user: require('./user_dao'),
  act: require('./activity_dao'),
  entry: require('./activity_Entry_dao'),
  calc: require('./CalculDistance')
};