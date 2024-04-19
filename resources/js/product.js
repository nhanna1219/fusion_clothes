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

// add filter button

const checkboxes = document.querySelectorAll("input[type=checkbox]");
const filterContainer = document.querySelector("#filter-container");
const clearFilter = document.querySelector("#clear-filter");

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        let temp = document.querySelector("#filter-template");
        let filterOption = temp.content.cloneNode(true);
        if (checkbox.checked) {
            let value = checkbox.nextElementSibling.textContent.trim();
            filterOption.querySelector("#filter-name").textContent = value;
            filterContainer.insertBefore(filterOption, clearFilter);
        } else {
            let value = checkbox.nextElementSibling.textContent.trim();
            let filterItems = filterContainer.querySelectorAll("#filter");
            filterItems.forEach((item) => {
                if (item.querySelector("#filter-name").textContent === value) {
                    item.remove();
                }
            });
        }
    });
});

clearFilter.addEventListener("click", () => {
    let filterItems = filterContainer.querySelectorAll("#filter");
    filterItems.forEach((item) => {
        item.remove();
    });
    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });
});

window.removeFilter = function (filter) {
    filter.parentNode.remove();
    let value = filter.parentNode.querySelector("#filter-name").textContent;
    checkboxes.forEach((checkbox) => {
        if (
            checkbox.checked &&
            checkbox.nextElementSibling.textContent.trim() === value
        ) {
            checkbox.checked = false;
        }
    });
};
