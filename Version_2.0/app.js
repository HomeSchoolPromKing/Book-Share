var express           = require('express'),
    app               = express(),
    bodyParser        = require('body-parser'),
    mongoose          = require('mongoose'),
    passport          = require('passport'),
    LocalStrategy     = require('passport-local'),
    User              = require('./models/user'),
    flash             = require('connect-flash');

var indexRoutes = require('./routes/index'),
    bookRoutes  = require('./routes/books');

mongoose.connect('mongodb+srv://bookSharer:2zetGVrUWtykzhhx@bookshare-p8xsw.mongodb.net/test?retryWrites=true');

require('./config/passport')(passport);

app.set('view engine', 'ejs');
app.use(express.static(__dirname + '/public'));

app.use(bodyParser.urlencoded({extended: true}));
app.use(require('express-session')({
  secret: 'kmartisacompletefailure',
  resave: false,
  saveUninitialized: false
}));
app.use(passport.initialize());
app.use(passport.session());

app.use(flash());

app.use(function(req, res, next){
  res.locals.currentUser = req.user;
  next();
});

app.use(indexRoutes);
app.use('/books', bookRoutes);

app.listen(3000, function(){
  console.log('BookShare is listening on port 3000');
});
