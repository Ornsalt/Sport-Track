const { db, act, user, entry } = require('./sport-track-db');

user.insert(['Jhon', 'Doe', '06-06-1982', '?', 1.7, 80, 'cookieDoe@cook.wink', '1234'], (err) => {
    if (err) {
        console.log(err);
    } else {
        user.findAll((err, res) => {
            if (err) {
                throw (err);
            } else {
                console.log(res);
            }
        });
    }
});

user.findUser('cookieDoe@cook.wink', (err, res) => {
    if (err) {
        throw (err);
    } else {
        console.log(JSON.stringify(res));
        user.update(res['id'], ['Jhon', 'Doe', '06-06-1982', '?', 1.7, 75, 'cookieDoe@cook.wink', '12345'], (err) => {
            if (err) {
                console.log(err);
            } else {
                user.findByKey(res.id, (err2, res2) => {
                    if (err2) {
                        throw (err2);
                    } else {
                        console.log(res2);
                        user.delete(res.id, err3 => {
                            if (err3) {
                                throw (err3);
                            } else {
                                user.findAll((err4, res4) => {
                                    if (err4) {
                                        throw (err4);
                                    } else {
                                        console.log(res4);
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
    }
});

act.insert([2, '19-09-2019', 'wing spreading', '12:53:05', '1:27:37', 98, 100, 103, 5660], (err) => {
    if (err) {
        console.log(err);
    } else {
        act.findAll((err, res) => {
            if (err) {
                throw (err);
            } else {
                console.log(res);
            }
        });
    }
});

act.findActivity(2, '19-09-2019', 'wing spreading', '12:53:05', (err, res) => {
    if (err) {
        throw (err);
    } else {
        console.log(res);
        act.update(res.id, [2, '06-06-1982', 'wing spreading', '12:53:00', '1:27:32', 98, 100, 103, 5220], (err2) => {
            if (err2) {
                console.log(err2);
            } else {
                act.findByKey(res['id'], (err3, res3) => {
                    if (err3) {
                        throw (err3);
                    } else {
                        console.log(res3);
                        act.delete(res3, err4 => {
                            if (err4) {
                                throw (err4);
                            } else {
                                act.findAll((err5, res5) => {
                                    if (err5) {
                                        throw (err5);
                                    } else {
                                        console.log(res5);
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
    }
});

entry.insert([2, '12:00:00', 99, 47.644795, -2.776605, 18], (err) => {
    if (err) {
        console.log(err);
    } else {
        entry.findAll((err, res) => {
            if (err) {
                throw (err);
            } else {
                console.log(res);
            }
        });
    }
});

entry.findActivityEntry(2, '12:00:00', (err, res) => {
    if (err) {
        throw (err);
    } else {
        console.log(res);
        entry.update(res['actId'], [2, '13:00:00', 99, 47.644795, -2.776605, 18], (err2) => {
            if (err2) {
                console.log(err2);
            } else {
                entry.findByKey(res['id'], (err3, res3) => {
                    if (err3) {
                        throw (err3);
                    } else {
                        console.log(res3);
                        entry.delete(res3, err4 => {
                            if (err4) {
                                throw (err4);
                            } else {
                                entry.findAll((err5, res5) => {
                                    if (err5) {
                                        throw (err5);
                                    } else {
                                        console.log(res5);
                                    }
                                });
                                entry.cardio(res3['actId'], (err5, res5) => {
                                    if (err5) {
                                        throw (err5);
                                    } else {
                                        console.log(res5);
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
    }
});

db.close();