// server.js
const express = require('express');
const path = require('path');
const app = express();

const PORT = process.env.PORT || 3000;

// Отдаём все файлы из текущей папки (css, js, картинки)
app.use(express.static(path.join(__dirname)));

// При заходе на корень — вернуть login.html
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'login.html'));
});

app.listen(PORT, () => console.log(`Server listening on port ${PORT}`));
