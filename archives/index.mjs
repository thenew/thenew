// Create a HTTP server with Node.js
import http from 'http'
import fs from 'fs'
import path from 'path'
import ejs from 'ejs'
import { getTimestamp } from './utils'

// require statements

// Handle client request and send server response
const requestHandler = (req, res) => {

  // routes

  if (req.url === "/") {

    const isDirectory = source => lstatSync(source).isDirectory()
    const getDirectories = srcPath => fs.readdirSync(srcPath).filter(file => fs.statSync(path.join(srcPath, file)).isDirectory())

    const projects = getDirectories('projects/').reverse()

    ejs.renderFile('views/index.ejs', {projects}, {}, function(err, str){
      if (err) throw err
      res.end(str)
    })

    // fs.readFile("views/index.html", (err, html) => {
    //   if (err) throw err;

    //   res.writeHead(200, { "Content-Type": "text/html" });
    //   res.end(html);
    // });
  }

  // api/timestamp
  else if (req.url.startsWith("/api/timestamp")) {
    const dateString = req.url.split("/api/timestamp/")[1];
    let timestamp;

    if (dateString === undefined || dateString.trim() === "") {
      timestamp = getTimestamp(new Date());
    } else {
      const date = !isNaN(dateString)
        ? new Date(parseInt(dateString))
        : new Date(dateString);

      if (!isNaN(date.getTime())) {
        timestamp = getTimestamp(date);
      } else {
        timestamp = {
          error: "invalid date"
        };
      }
    }


    res.writeHead(200, { "Content-Type": "application/json" });
    res.end(JSON.stringify(timestamp));

  // 404
  } else {
    fs.readFile("views/index.html", (err, html) => {
      if (err) throw err;

      res.writeHead(404, { "Content-Type": "text/html" });
      res.end(html);
    });
  }
};

const server = http.createServer(requestHandler)

server.listen(process.env.PORT || 4100, err => {
  if (err) throw err

  console.log(`Server running on PORT ${server.address().port}`)
})
