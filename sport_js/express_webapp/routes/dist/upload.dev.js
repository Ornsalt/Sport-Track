"use strict";

var _require = require('sport-track-db'),
    act = _require.act,
    entry = _require.entry,
    calc = _require.calc;

var express = require('express');

var router = express.Router();
router.get('/', function (req, res, next) {
  res.render('upload', {
    name: 'SportTrack'
  });
});
router.post('/', function (req, res, next) {
  var file = JSON.parse(req.files.fichierJson.data);
  var start = file.data[0].time;
  act.insert([req.session.usr, file.activity.date, file.activity.description, start, '', 0, 0, 0, 0], function (err) {
    if (err != null) {
      res.render('error', {
        name: "An Error as occured",
        error: err
      });
    } else {
      act.findActivity(req.session.usr, file.activity.date, file.activity.description, start, function (err2, id) {
        if (err2 != null) {
          res.render('error', {
            name: "An Error as occured",
            error: err2
          });
        } else {
          for (var i = 0; i < file.data.length; i++) {
            var end = file.data[i].time;
            entry.insert([id.id, file.data[i].time, file.data[i].cardio_frequency, file.data[i].latitude, file.data[i].longitude, file.data[i].altitude], function (err3) {
              if (err3 != null) {
                res.render('error', {
                  name: "An Error as occured",
                  error: err2
                });
              }
            });
          }

          buff1 = start.split(':');
          buff2 = end.split(':');
          duration = '';

          for (var _i = 0; _i < 3; _i++) {
            if ((tmp = buff2[_i] - buff1[_i]) < 10) {
              duration += '0' + tmp;
            } else {
              duration += tmp;
            }

            if (_i < 2) {
              duration += ':';
            }
          }

          entry.cardio(id.id, function (err3, card) {
            if (err3 != null) {
              res.render('error', {
                name: "An Error as occured",
                error: err3
              });
            } else {
              act.update(id.id, [req.session.usr, file.activity.date, file.activity.description, start, duration, card['min(cardio)'], card['avg(cardio)'], card['max(cardio)'], calc.calculDistanceTrajet(file)], function (err4) {
                if (err4 != null) {
                  res.render('error', {
                    name: "An Error as occured",
                    error: err4
                  });
                } else {
                  res.render('upload', {
                    name: 'SportTrack'
                  });
                }
              });
            }
          });
        }
      });
    }
  });
});
module.exports = router;