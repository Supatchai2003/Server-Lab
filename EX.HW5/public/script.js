const colorCodes = {
    "black": { value: 0, tolerance: 0 },
    "brown": { value: 1, tolerance: 1 },
    "red": { value: 2, tolerance: 2 },
    "orange": { value: 3, tolerance: 3 },
    "yellow": { value: 4, tolerance: 5 },
    "green": { value: 5, tolerance: 0.5 },
    "blue": { value: 6, tolerance: 0.25 },
    "violet": { value: 7, tolerance: 0.1 },
    "grey": { value: 8, tolerance: 0.05 },
    "white": { value: 9, tolerance: 0 },
    "gold": { value: -1, tolerance: 5 },
    "silver": { value: -2, tolerance: 10 }
};

document.getElementById('type').addEventListener('change', updateBandInputs);

function updateBandInputs() {
    const type = document.getElementById('type').value;
    const bandInputs = document.getElementById('band-inputs');
    bandInputs.innerHTML = '';
    
    const numBands = type === '4' ? 4 : (type === '5' ? 5 : 6);
    
    for (let i = 0; i < numBands; i++) {
        const inputDiv = document.createElement('div');
        inputDiv.innerHTML = `<label>แถบที่ ${i + 1}:</label>
                              <select id="band${i}">
                                  ${Object.keys(colorCodes).map(color => `<option value="${color}">${color}</option>`).join('')}
                              </select>`;
        bandInputs.appendChild(inputDiv);
    }
}

function calculateResistor() {
    const type = document.getElementById('type').value;
    const numBands = type === '4' ? 4 : (type === '5' ? 5 : 6);
    const bands = [];
    
    for (let i = 0; i < numBands; i++) {
        const color = document.getElementById(`band${i}`).value;
        bands.push(color);
    }

    fetch('/calculate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ type, bands })
    })
    .then(response => response.json())
    .then(data => {
        let resultText = `ค่าความต้านทาน: ${data.resistance}<br>`;
        resultText += `ค่าความคลาดเคลื่อน: ${data.tolerance}`;
        if (data.tempCoefficient) {
            resultText += `<br>${data.tempCoefficient}`;
        }
        document.getElementById('result').innerHTML = resultText;
    })
    .catch(error => console.error('Error:', error));
}

// Initialize inputs based on default selection
updateBandInputs();
