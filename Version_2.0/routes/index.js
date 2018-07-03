var express       = require('express');
    router        = express.Router();
    passport      = require('passport');
    User          = require('../models/user');

    router.get('/', function(req, res) {
      res.render('index.ejs');
    });

/* ==========================================
============== AUTH ROUTES ==================
===========================================*/

    router.get('/register', function(req, res) {
      res.render('register.ejs', { message: req.flash('registerMessage')});
    });

    router.post('/register', passport.authenticate('local-signup', {
      successRedirect: '/profile',
      failureRedirect: '/register',
      failureFlash: true
    }));

    router.get('/login', function(req, res) {
      res.render('login.ejs', { message: req.flash('loginMessage') });
    });

    router.post('/login', passport.authenticate('local-login',
      {
        successRedirect: '/profile',
        failureRedirect: '/login',
        failureFlash: true
      }));

      router.get('/logout', function(req, res) {
        req.logout();
        res.redirect('/');
      });

/* ==========================================
============== PROFILE ROUTE ==================
===========================================*/

      router.get('/profile', function(req, res) {
        res.render('profile.ejs');
      });

      function isLoggedIn(req, res, next){
          if (req.isAuthenticated()) {
            return next();
          }
          res.redirect('/');
      }

module.exports = router;
