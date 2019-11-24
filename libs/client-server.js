#!/usr/bin/env node

var express = require("express"),
    app = express(),
    bodyParser = require('body-parser'),
    errorHandler = require('errorhandler'),
    methodOverride = require('method-override'),
    hostname = process.env.HOSTNAME || 'localhost',
    port = parseInt(process.env.PORT, 10) || 8080,
    securedPort = parseInt(process.env.PORT, 10) || 5338,
    publicDir = process.argv[2] || __dirname + '/../public',
    path = require('path');
var http = require('http');
var fs = require('fs');
var allowedExt = [
    '.js',
    '.ico',
    '.css',
    '.png',
    '.jpg',
    '.woff2',
    '.woff',
    '.ttf',
    '.svg',
];

app.get("*", function (req, res) {
    if (allowedExt.filter(function (ext) { return req.url.indexOf(ext) > 0; }).length > 0) {
        res.sendFile(path.resolve(publicDir + req.url));
    }
    else {
        res.sendFile(path.resolve(`${publicDir}/index.html`));
    }
});

app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

app.use(methodOverride());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
  extended: true
}));

app.use(express.static(publicDir));
app.use(errorHandler({
  dumpExceptions: true,
  showStack: true
}));

http.createServer(app).listen(securedPort, hostname);
console.log("Simple static server showing %s listening at http://%s:%s", publicDir, hostname, securedPort);

/*var httpServer = http.createServer(app);
httpServer.listen(port, hostname);*/
