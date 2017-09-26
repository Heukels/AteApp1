var http = require("https");
var options = {
  "method": "GET",
  "hostname": "api.schiphol.nl",
  "port": null,
  "path": "/public-flights/flights?app_id=aac41c4b&app_key=620076012e7b8ee7f815b52b7edc1fa9",
  "headers": {
    "resourceversion": "v3"
  }
};
var req = http.request(options, function (res) {
  var chunks = [];
  res.on("data", function (chunk) {
    chunks.push(chunk);
  });
  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});
req.end();