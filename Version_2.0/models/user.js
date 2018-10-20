var mongoose              = require('mongoose'),
    passportLocalMongoose = require('passport-local-mongoose');
    bcrypt                = require('bcrypt-nodejs');

var UserSchema = new mongoose.Schema({
  email:    String,
  username: String,
  password: String,
  books:    { type: [Number], default: [] }
});

UserSchema.plugin(passportLocalMongoose);

UserSchema.methods.generateHash = function(password) {
  return bcrypt.hashSync(password, bcrypt.genSaltSync(8), null);
};

UserSchema.methods.validPassword = function(password) {
  return bcrypt.compareSync(password, this.password);
};

module.exports = mongoose.model('User', UserSchema)
