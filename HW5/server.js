const express = require('express');
const path = require('path');

const app = express();
const port = 5000;

app.use(express.static(path.join(__dirname, 'web')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'web', 'index.html'));
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
