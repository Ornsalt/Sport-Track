"use strict";

var express = require('express');

var router = express.Router();
router.get('/', function (req, res, next) {
  res.render('about', {
    name: 'SportTrack'
  });
});
module.exports = router;