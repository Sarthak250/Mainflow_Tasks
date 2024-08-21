// Function to display value
function display(val) {
    document.getElementById("result").value += val;
}

// Function to evaluate the expression
function calculateResult() {
    let input = document.getElementById("result").value;
    if (input) {
        let result = math.evaluate(input);
        document.getElementById("result").value = result;
    }
}

// Function to clear the screen
function clearScreen() {
    document.getElementById("result").value = "";
}

// Add keyboard input functionality
document.addEventListener('keydown', function(event) {
    const key = event.key;
    const resultField = document.getElementById("result");

    if (!isNaN(key) || key === '.' || key === '+' || key === '-' || key === '*' || key === '/') {
        resultField.value += key;
    }
    if (key === 'Enter') {
        calculateResult();
    }
    if (key === 'Backspace') {
        resultField.value = resultField.value.slice(0, -1);
    }
});
