// dependancies
var fileUpload = require('express-fileupload');
var cookieParser = require('cookie-parser');
var createError = require('http-errors');
var session = require('express-session');
var bodyParser = require('body-parser');
var express = require('express');
var logger = require('morgan');
var path = require('path');
var app = express();

// routers setup
var actRouter = require('./routes/act');
var userRouter = require('./routes/user');
var aboutRouter = require('./routes/about');
var indexRouter = require('./routes/index');
var loginRouter = require('./routes/login');
var logoutRouter = require('./routes/logout');
var uploadRouter = require('./routes/upload');
var profileRouter = require('./routes/profile');
var registerRouter = require('./routes/register');


// app setup
app.use(session({
    secret: 'M3t@lG3@r?',
    name: 'SportTrack_id',
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false }
}));
app.use(fileUpload());
app.use(logger('dev'));
app.use(express.json());
app.use(cookieParser());
app.set('trust proxy', 1);
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, 'public')));

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

// views
app.use('/', indexRouter);
app.use('/act', actRouter);
app.use('/user', userRouter);
app.use('/about', aboutRouter);
app.use('/login', loginRouter);
app.use('/logout', logoutRouter);
app.use('/upload', uploadRouter);
app.use('/profile', profileRouter);
app.use('/register', registerRouter);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
    next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
    // set locals, only providing error in development
    res.locals.message = err.message;
    res.locals.error = req.app.get('env') === 'development' ? err : {};

    // render the error page
    res.status(err.status || 500);
    res.render('error', { name: "An Error as occured", error: err });
});

module.exports = app;
