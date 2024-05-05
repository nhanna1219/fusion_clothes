const rangeInput = document.querySelectorAll("#range-input input");
const priceInput = document.querySelectorAll("#price span");
const range = document.querySelector("#slider #progress");
let priceGap = 200;

sortProductItems(document.querySelector("#sorting")?.selectedOptions[0].value);
let sliderTimeout;

rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
        updateSliderPrice(e);
    });
});

rangeInput.forEach((input) => {
    input.addEventListener("mouseup", (e) => {
        clearTimeout(sliderTimeout);
        sliderTimeout = setTimeout(() => {
            filterProductItems();
        }, 500);
    });
});

function updateSliderPrice(slider) {
    let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
        if (slider && slider.target.id === "range-min") {
            rangeInput[0].value = maxVal - priceGap;
        } else if (slider && slider.target.id === "range-max") {
            rangeInput[1].value = minVal + priceGap;
        }
    } else {
        priceInput[0].textContent = "$" + minVal;
        priceInput[1].textContent = "$" + maxVal;

        range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
}

function filterProductItems() {
    let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

    const productItems = document.querySelectorAll("#product-item");
    productItems.forEach((productItem) => {
        const priceElement = productItem.querySelector("#product-price");
        const price = parseFloat(priceElement.textContent.replace("$", ""));
        if (price >= minVal && price <= maxVal) {
            productItem.classList.remove("hidden");
        } else {
            productItem.classList.add("hidden");
        }
    });
}

const sortSelect = document.querySelector("#sorting");
if (sortSelect) {
    sortSelect.addEventListener("change", () => {
        const sortCriteria = sortSelect.value;
        sortProductItems(sortCriteria);
    });
}

function sortProductItems(criteria) {
    if (criteria) {
        const productItems = document.querySelectorAll("#product-item");
        const productsWithPrices = Array.from(productItems).map(
            (productItem) => {
                const priceElement =
                    productItem.querySelector("#product-price");
                const price = parseFloat(
                    priceElement.textContent.replace("$", "")
                );
                return { element: productItem, price: price };
            }
        );

        if (criteria == "Price") {
            productsWithPrices.sort((a, b) => a.price - b.price);
        } else {
            productsWithPrices.sort((a, b) => {
                const nameA = a.element
                    .querySelector("#product-name")
                    .textContent.toLowerCase();
                const nameB = b.element
                    .querySelector("#product-name")
                    .textContent.toLowerCase();
                return nameA.localeCompare(nameB);
            });
        }

        const productContainer = document.getElementById("product-container");
        productContainer.innerHTML = "";
        productsWithPrices.forEach((product) => {
            productContainer.appendChild(product.element);
        });
    }
}

const checkboxes = document.querySelectorAll("input[type=checkbox]");
const filterContainer = document.querySelector("#filter-container");
const clearFilter = document.querySelector("#clear-filter");

let originalProductList = [];

function initializeProductList() {
    originalProductList = Array.from(
        document.querySelectorAll("#product-item")
    );
}

initializeProductList();

const observer = new MutationObserver((mutationsList, observer) => {
    console.log("changed");
    filterByCategory();
});

if (filterContainer) {
    observer.observe(filterContainer, { childList: true });
}

function filterByCategory() {
    let selectedCategories = [];
    const filters = document.querySelectorAll("#filter");
    filters.forEach((filter) => {
        let category = filter.querySelector("#filter-name").textContent.trim();
        selectedCategories.push(category);
    });

    console.log(selectedCategories);

    const productContainer = document.getElementById("product-container");
    productContainer.innerHTML = "";

    if (selectedCategories.length === 0) {
        originalProductList.forEach((product) => {
            productContainer.appendChild(product);
        });
    } else {
        originalProductList.forEach((product) => {
            let type = product
                .querySelector("#product-type")
                .textContent.trim();
            if (selectedCategories.includes(type)) {
                productContainer.appendChild(product);
            }
        });
    }
}
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
        filterByCategory();
    });
});

if (clearFilter) {
    clearFilter.addEventListener("click", () => {
        let filterItems = filterContainer.querySelectorAll("#filter");
        filterItems.forEach((item) => {
            item.remove();
        });
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });
    });
}

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
