"use strict";

var act = require('sport-track-db').act;

var express = require('express');

var router = express.Router();
router.get('/', function (req, res, next) {
  act.findByKey(req.session.usr, function (err, act) {
    if (err != null) {
      res.render('error', {
        name: 'An Error occured',
        error: err
      });
    } else {
      res.render('act', {
        name: 'SportTrack',
        data: act
      });
    }
  });
});
module.exports = router;