var user = require('sport-track-db').user
var express = require('express');
var router = express.Router();

router.post('/', function(req, res, next) {
    user.update(req.session.usr, [req.body.name, req.body.lastName, req.body.birthday, req.body.sex, req.body.height, req.body.weight, req.body.email, req.body.password]), function(err) {
        if (err != null) {
            res.render('error', { name: "An Error as occured", error: err });
        } else {
            user.findByKey(req.session.usr, function(err2, usr) {
                if (err2 != null) {
                    res.render('error', { name: "An Error as occured", error: err2 });
                } else {
                    res.render('profile', { name: 'SportTrack', data: usr});
                }
            });
        }
    }
});

module.exports = router;