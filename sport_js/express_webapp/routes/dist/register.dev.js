"use strict";

var user = require('sport-track-db').user;

var express = require('express');

var router = express.Router();
router.get('/', function (req, res, next) {
  res.render('register', {
    name: 'SportTrack'
  });
});
router.post('/', function (req, res, next) {
  user.insert([req.body.name, req.body.lastName, req.body.birthday, req.body.sex, req.body.height, req.body.weight, req.body.email, req.body.password], function (err) {
    if (err != null) {
      res.render('error', {
        name: 'An Error occured',
        error: err
      });
    } else {
      res.render('index', {
        name: 'SportTrack'
      });
    }
  });
});
module.exports = router;