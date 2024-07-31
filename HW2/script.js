function wave() {
    let word = prompt('Enter your keyword ');

    if (!word || word.length < 10 || /[^a-z]/.test(word)) {
        console.log("Can not to input ");
        return;
    }

    let result = [];

    for (let i = 0; i < word.length; i++) {
        let waveStr = word.substring(0, i) + word[i].toUpperCase() + word.substring(i + 1);
        result.push(waveStr);
    }

    return result;
}

let waveResult = wave();
console.log(waveResult);
