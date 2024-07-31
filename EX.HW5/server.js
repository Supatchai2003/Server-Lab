const express = require('express');
const app = express();
const port = 3000;

// JSON Parser Middleware
app.use(express.json());
app.use(express.static('public'));

// Color code mapping
const colorCodes = {
    "black": { value: 0, multiplier: 1, tolerance: 0 },
    "brown": { value: 1, multiplier: 10, tolerance: 1 },
    "red": { value: 2, multiplier: 100, tolerance: 2 },
    "orange": { value: 3, multiplier: 1000, tolerance: 0 },
    "yellow": { value: 4, multiplier: 10000, tolerance: 5 },
    "green": { value: 5, multiplier: 100000, tolerance: 0.5 },
    "blue": { value: 6, multiplier: 1000000, tolerance: 0.25 },
    "violet": { value: 7, multiplier: 10000000, tolerance: 0.1 },
    "grey": { value: 8, multiplier: 100000000, tolerance: 0.05 },
    "white": { value: 9, multiplier: 1000000000, tolerance: 0 },
    "gold": { value: -1, multiplier: 0.1, tolerance: 5 },
    "silver": { value: -2, multiplier: 0.01, tolerance: 10 }
};

app.post('/calculate', (req, res) => {
    const { type, bands } = req.body;
    let resistance = 0;
    let tolerance = 0;
    let result = {};

    if (type === '4') {
        resistance = (colorCodes[bands[0]].value * 10 + colorCodes[bands[1]].value) * colorCodes[bands[2]].multiplier;
        tolerance = colorCodes[bands[3]].tolerance;
    } else if (type === '5') {
        resistance = (colorCodes[bands[0]].value * 100 + colorCodes[bands[1]].value * 10 + colorCodes[bands[2]].value) * colorCodes[bands[3]].multiplier;
        tolerance = colorCodes[bands[4]].tolerance;
    } else if (type === '6') {
        resistance = (colorCodes[bands[0]].value * 100 + colorCodes[bands[1]].value * 10 + colorCodes[bands[2]].value) * colorCodes[bands[3]].multiplier;
        tolerance = colorCodes[bands[4]].tolerance;
        result.tempCoefficient = bands[5];
    }

    result.resistance = `${resistance} Ω`;
    result.tolerance = `±${tolerance}%`;

    res.json(result);
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
