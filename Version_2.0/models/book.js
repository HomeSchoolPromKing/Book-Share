var mongoose              = require('mongoose');

var bookSchema = new mongoose.Schema({
  owner:  Number,
  title:  String,
  author: String,
  isbn:   Number,
  wants:  String
});

module.exports = mongoose.model('Book', bookSchema)
