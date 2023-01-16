var user = require('sport-track-db').user
var express = require('express');
var router = express.Router();

router.get('/', function(req, res, next) {
    user.findAll(function(err, rows) {
        if (err != null){
            res.render('error', { name: "An Error as occured", error: err });
        } else {
            res.render('user', { name: 'SportTrack', data: rows });
        }
    });
});

module.exports = router;
