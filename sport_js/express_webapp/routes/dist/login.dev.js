"use strict";

var user = require('sport-track-db').user;

var express = require('express');

var router = express.Router();
router.get('/', function (req, res, next) {
  res.render('login', {
    name: 'SportTrack'
  });
});
router.post('/', function (req, res, next) {
  user.login(req.body.email, req.body.password, function (err, usr) {
    if (err != null) {
      res.render('error', {
        name: 'An Error occured',
        error: err
      });
    } else {
      req.session.usr = usr.id;
      req.session.save();
      res.render('profile', {
        name: 'SportTrack',
        data: usr
      });
    }
  });
});
module.exports = router;