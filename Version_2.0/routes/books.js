var express       = require('express');
    router        = express.Router();
    Book          = require('../models/book');

router.get('/', function(req, res) {
  if (req.query.search) {
    const escapedQuery = new RegExp(escapeRegex(req.query.search), 'gi');
    Book.find({}, function(err, results) {

    });
    res.render('books/index', { bookQuery: query });

  } else {
    res.render('index');
  }

});

function escapeRegex(text) {
  return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
};

module.exports = router;
