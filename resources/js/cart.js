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
    const add = document.getElementById("increment-button");
    const sub = document.getElementById("decrement-button");
    const input = document.getElementById("quantity-input");
    let a = 1;
    if (add && sub) {
        add.addEventListener("click", () => {
            a++;
            input.value = a;
        });

        sub.addEventListener("click", () => {
            if (a > 1) {
                a--;
                input.value = a;
            }
        });
    }
});
