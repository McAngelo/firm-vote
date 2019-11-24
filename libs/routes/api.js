var express = require('express');
var passport = require('passport');
var router = express.Router();

router.get('/', function (req, res) {
    res.json({
        msg: 'firmVote 3.0 API is up and running'
    });
});

router.get('/health', function (req, res) {
    res.json({
        msg: 'firmVote 3.0 API is up and running'
    });
});

router.get('/api', passport.authenticate('bearer', { session: false }), function (req, res) {
    res.json({
        msg: 'Authorized firmVote 3.0 API is up and running'
    });
});

module.exports = router;
