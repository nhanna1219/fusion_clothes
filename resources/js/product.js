const rangeInput = document.querySelectorAll("#range-input input");
const priceInput = document.querySelectorAll("#price span");
const range = document.querySelector("#slider #progress");
let priceGap = 200;

updateSliderPrice();
rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
        updateSliderPrice(e);
    });
});

function updateSliderPrice(slider) {
    let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
        if (slider.target.id === "range-min") {
            rangeInput[0].value = maxVal - priceGap;
        } else {
            rangeInput[1].value = minVal + priceGap;
        }
    } else {
        priceInput[0].value = minVal;
        priceInput[1].value = maxVal;
        priceInput[0].textContent = "$" + priceInput[0].value;
        priceInput[1].textContent = "$" + priceInput[1].value;
        range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
}
