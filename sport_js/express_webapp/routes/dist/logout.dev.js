"use strict";

var express = require('express');

var router = express.Router();
router.post('/', function (req, res, next) {
  req.session.destroy();
  res.render('index', {
    name: 'SportTrack'
  });
});
module.exports = router;