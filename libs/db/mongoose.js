var mongoose = require('mongoose');

var libs = process.cwd() + '/libs/';

var log = require(libs + 'log')(module);
var config = require(libs + 'config');

mongoose.connect(config.get('mongoose:uri'), { 
	useCreateIndex: true,  
	useNewUrlParser: true,
	useUnifiedTopology: true
});

var db = mongoose.connection;

//console.log(db);

db.on('error', function (err) {
    log.error('Connection error:', err.message);
});

db.once('open', function callback() {
	//console.log(db);
    log.info('Connected to DB!');
});

module.exports = mongoose;
