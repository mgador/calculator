let inputField = document.getElementById("calcuInput")
let operatorButtons = document.getElementsByClassName("operators")
let numberButtons = document.getElementsByClassName("numbers")
let equalButton = document.getElementById("submitBtn")

for (button of operatorButtons) {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        inputField.value += e.target.value;
    })
}

for (button of numberButtons) {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        inputField.value += e.target.value;
    })
}

document.getElementById("clearBtn").addEventListener("click", (e) => {
    e.preventDefault();
    inputField.value = "";
});