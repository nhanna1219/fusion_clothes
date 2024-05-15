document.addEventListener("DOMContentLoaded", function () {
    const clearCartBtn = document.querySelector("#clear-cart");
    function clearCart() {
        // clear all products from cart (and local storage)

        // retrieve list of products from LS
        const lsContent = getLSContent();
        // empty array in local storage
        lsContent.splice(0, lsContent.length);
        // update local storage
        setLSContent(lsContent);
        // display cart content again
        displayProducts();
    }
    // Adding and subtract item quantity
    const add = document.getElementById("increment-button_buynow");
    const sub = document.getElementById("decrement-button_buynow");
    const input = document.getElementById("quantity-input_buynow");

    // const productPrice = parseFloat(
    //     document.querySelector(".productprice").textContent
    // );

    const price = document.querySelector(".productprice");

    const subtotalElement = document.querySelector(".total_price_item");

    const totalElement = document.querySelector(".total_price");

    let quantityitem = document.querySelector(".total_items");

    const price_total = document.getElementById("price_total");

    let a = 1;
    if (input) {
        a = input.value;
    }
    if (add && sub) {
        add.addEventListener("click", () => {
            a++;
            input.value = a;

            updateSubtotalAndTotal();
        });

        sub.addEventListener("click", () => {
            if (a > 1) {
                a--;
                input.value = a;

                updateSubtotalAndTotal();
            }
        });
    }

    function updateSubtotalAndTotal() {
        if (price) {
            const productPrice = parseFloat(price.textContent.slice(1));

            const subtotal = productPrice * a;
            const shipping = 2;
            const taxes = 2;
            const total = subtotal + shipping + taxes;

            price.textContent = `$${productPrice.toFixed(2)}`;

            quantityitem.textContent = a;
            price_total.textContent = `$${subtotal.toFixed(2)}`;
            subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
            totalElement.textContent = `$${total.toFixed(2)}`;
        }
    }

    updateSubtotalAndTotal();

    const deletebtn = document.querySelector(".delete");
    if (deletebtn) {
        deletebtn.addEventListener("click", () => {
            var row = deletebtn.parentNode.parentNode;
            row.parentNode.removeChild(row);
            quantityitem.textContent = 0;
            price_total.textContent = `$0`;
            subtotalElement.textContent = `$0`;
            totalElement.textContent = `$0`;
        });
    }
});
