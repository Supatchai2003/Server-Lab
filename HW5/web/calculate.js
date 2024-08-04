// ประกาศชื่อสี
const colors = ["black", "brown", "red", "orange", "yellow", "green", "blue", "violet", "grey", "white"];
const multipliers = ["silver", "gold", "black", "brown", "red", "orange", "yellow", "green", "blue", "violet"];
const tolerances = ["silver", "gold", "brown", "red", "green", "blue", "violet"];
const ppms = ["brown", "red", "orange", "yellow"];

//ค่าแต่ละชื่อสี
const colorValue = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
const multiplierValue = [0.01, 0.1, 1, 10, 100, 1000, 10000, 100000, 1000000, 10000000];
const toleranceValue = ["±10%", "±5%", "±1%", "±2%", "±0.5%", "±0.25%", "±0.1%"];
const ppmValue = [100, 50, 15, 25];

// ใส่ค่าใน array
function getColor(colorName) {
    const index = colors.indexOf(colorName);
    return colorValue[index];
}
function getMultiplier(colorName) {
    const index = multipliers.indexOf(colorName);
    return multiplierValue[index];
}
function getTolerance(colorName) {
    const index = tolerances.indexOf(colorName);
    return toleranceValue[index];
}
function getPpm(colorName) {
    const index = ppms.indexOf(colorName);
    return ppmValue[index];
}

// ฟังชั่น อัพเดตค่าแถบสี
function updateBarSelectors() {
    const barCount = document.getElementById('barCount').value;
    const barDiv = document.getElementById('bar');
    barDiv.innerHTML = '';

    for (let i = 1; i <= Math.min(barCount - 2, 3); i++) { // Limit to 3 bars if barCount is 6
        const label = document.createElement('label');
        label.setAttribute('for', `bar${i}`);
        label.innerText = `Bar ${i} :`;
        const select = document.createElement('select');
        select.setAttribute('id', `bar${i}`);
        select.innerHTML = colors.map(color => `<option value="${color}">${color.charAt(0).toUpperCase() + color.slice(1)}</option>`).join('');
        barDiv.appendChild(label);
        barDiv.appendChild(select);
    }

    // ค่าตัวคูณและค่าความคลาดเคลื่อน
    const labelMultiplier = document.createElement('label');
    labelMultiplier.setAttribute('for', 'multiplier');
    labelMultiplier.innerText = 'Multiplier :';
    const selectMultiplier = document.createElement('select');
    selectMultiplier.setAttribute('id', 'multiplier');
    selectMultiplier.innerHTML = multipliers.map(multiplier => `<option value="${multiplier}">${multiplier.charAt(0).toUpperCase() + multiplier.slice(1)}</option>`).join('');
    barDiv.appendChild(labelMultiplier);
    barDiv.appendChild(selectMultiplier);

    const labelTolerance = document.createElement('label');
    labelTolerance.setAttribute('for', 'tolerance');
    labelTolerance.innerText = 'Tolerance :';
    const selectTolerance = document.createElement('select');
    selectTolerance.setAttribute('id', 'tolerance');
    selectTolerance.innerHTML = tolerances.map(tolerance => `<option value="${tolerance}">${tolerance.charAt(0).toUpperCase() + tolerance.slice(1)}</option>`).join('');
    barDiv.appendChild(labelTolerance);
    barDiv.appendChild(selectTolerance);

    // เพิ่ม PPM สำหรับตัวต้านทาน 6 แถบสี
    if (barCount == 6) {
        const labelPpm = document.createElement('label');
        labelPpm.setAttribute('for', 'ppm');
        labelPpm.innerText = 'PPM :';
        const selectPpm = document.createElement('select');
        selectPpm.setAttribute('id', 'ppm');
        selectPpm.innerHTML = ppms.map(ppm => `<option value="${ppm}">${ppm.charAt(0).toUpperCase() + ppm.slice(1)}</option>`).join('');
        barDiv.appendChild(labelPpm);
        barDiv.appendChild(selectPpm);
    }
}

// ฟังชั่นแปลงค่าความต้านทานให้อ่านง่าย
function formatResistance(value) {
    if (value >= 1e6) {
        return (value / 1e6) + ' M';
    } else if (value >= 1e3) {
        return (value / 1e3) + ' K';
    } else {
        return value + ' ';
    }
}

// ฟังชั่นคำนวณค่าความต้านทาน
function calResistor() {
    const barCount = document.getElementById('barCount').value;
    const value1 = getColor(document.getElementById('bar1').value);
    const value2 = getColor(document.getElementById('bar2').value);
    const multiplierValue = getMultiplier(document.getElementById('multiplier').value);
    const toleranceValue = getTolerance(document.getElementById('tolerance').value);

    let resistance;
    if (barCount == 4) {
        resistance = (value1 * 10 + value2) * multiplierValue;
    } else {
        const value3 = getColor(document.getElementById('bar3').value);
        resistance = (value1 * 100 + value2 * 10 + value3) * multiplierValue;
    }

    let formattedResistance = formatResistance(resistance);

    let resultText = `Resistance: ${formattedResistance}  ohms<br>Tolerance: ${toleranceValue}`;
    if (barCount == 6) {
        const ppmValue = getPpm(document.getElementById('ppm').value);
        resultText += `<br>PPM: ${ppmValue} ppm`;
    }
    document.getElementById('result').innerHTML = resultText;
}
document.addEventListener('DOMContentLoaded', updateBarSelectors);
