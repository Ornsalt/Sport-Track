"use strict";

var user = require('sport-track-db').user;

var express = require('express');

var router = express.Router();
router.post('/', function (req, res, next) {
  user.insert([[req.body.id, req.body.name, req.body.lastName, req.body.birthDay, req.body.sex, req.body.height, req.body.weight, req.body.email, req.body.password]], function (err, rows) {
    if (err != null) {
      console.log("ERR: " + err);
      res.render('error', {
        error: err
      });
    } else {
      res.render('user', {
        data: rows
      });
    }
  });
});
module.exports = router;