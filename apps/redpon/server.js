const http = require('http');
const fs = require('fs');
const path = require('path');

const port = 3000;
const page = path.join(__dirname, 'public', 'index.html');

const server = http.createServer((request, response) => {
  if (request.url === '/health') {
    response.writeHead(200, { 'Content-Type': 'text/plain; charset=utf-8' });
    response.end('ok\n');
    return;
  }

  fs.readFile(page, (error, content) => {
    if (error) {
      response.writeHead(500, { 'Content-Type': 'text/plain; charset=utf-8' });
      response.end('Error al cargar la página\n');
      return;
    }

    response.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8' });
    response.end(content);
  });
});

server.listen(port, '0.0.0.0', () => {
  console.log(`App Node escuchando en el puerto ${port}`);
});
