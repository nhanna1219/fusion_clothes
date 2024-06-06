document.addEventListener("DOMContentLoaded", function () {
    function changeImageWithAnimation(newImageSrc) {
        var largeImage = document.getElementById("largeImage");
        largeImage.style.opacity = 0;
        setTimeout(function () {
            largeImage.src = newImageSrc;
            largeImage.style.opacity = 1;
            largeImage.style.transition = "0.3s ease-in-out";
        }, 200);
    }
    function changeThumbnail() {
        var thumbnails = document.querySelectorAll(".thumbnail");
        thumbnails.forEach(function (thumbnail) {
            thumbnail.addEventListener("click", function () {
                var newImageSrc = this.src; // Get the source of the clicked thumbnail
                changeImageWithAnimation(newImageSrc);
            });

            thumbnail.addEventListener("mouseenter", function () {
                this.style.transform = "scale(1.1)"; // Scale the image on hover
                thumbnail.style.transition = "transform 0.3s ease";
            });

            thumbnail.addEventListener("mouseleave", function () {
                this.style.transform = "scale(1)"; // Reset the image size when not hovered
                thumbnail.style.transition = "transform 0.3s ease";
            });
        });
    }

    function getSelectedColor() {
        return document.querySelector('input[name="color"]:checked')?.value;
    }

    function getSelectedSize() {
        return document.querySelector('input[name="size"]:checked')?.value;
    }

    function getSelectedQuantity() {
        return document.getElementById("quantity-input").value;
    }

    async function buyNow() {
        const buyNowBtn = document.getElementById('buy-now-btn');
        buyNowBtn?.addEventListener('click', async (e) => {
            Swal.fire({
                html: '<strong>Navigate to Cart Page, please wait a sec.. ✨</strong>',
                showConfirmButton: false,
                allowOutsideClick: false,
                width: "450px",
                willOpen: async () => {
                    Swal.showLoading();
                    const currentUrl = window.location.href;
                    const product_id = currentUrl.split('/').pop();
                    const colorId = getSelectedColor();
                    const sizeId = getSelectedSize();
                    const quantity = getSelectedQuantity();
                    let bodyContent = {
                        quantity,
                        colorId,
                        sizeId
                    };
                    try {
                        const response = await fetch(`/buynow/${product_id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify(bodyContent)
                        });

                        const data = await response.json();

                        if (data.success) {
                            console.log("Success on handle BuyNow: ", data);
                            location.href = "http://127.0.0.1:8000/cart";
                        } else {
                            console.log("Error on handle BuyNow: ", data);
                        }
                    } catch (e) {
                        console.log("Error on handle BuyNow: ", e);
                    }

                }
            })
        })
    }

    // Adding and subtract item quantity
    function adjustQuantity() {
        const addButton = document.getElementById("increment-button");
        const subButton = document.getElementById("decrement-button");
        const quantityInput = document.getElementById("quantity-input");

        if (addButton && subButton && quantityInput) {
            addButton.addEventListener("click", () => {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });

            subButton.addEventListener("click", () => {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        }
    }

    function addToCart() {
        const addToCartButtons = document.getElementById('add-to-cart-btn');
        if (addToCartButtons) {
            addToCartButtons.addEventListener('click', async function (event) {
                event.preventDefault();
                Swal.fire({
                    text: 'Processing.. 👨‍🦽',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    width: "400px",
                    willOpen: async () => {
                        Swal.showLoading();
                        const currentUrl = window.location.href;
                        const product_id = currentUrl.split('/').pop();
                        const color = getSelectedColor();
                        const size = getSelectedSize();
                        const quantity = getSelectedQuantity();
                        let bodyContent = {
                            product_id,
                            quantity,
                        };
                        if (color) {
                            bodyContent.color = color;
                        }
                        if (size) {
                            bodyContent.size = size;
                        }
                        try {
                            const response = await fetch('/cart/add', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify(bodyContent)
                            });

                            const data = await response.json();

                            if (data.success) {
                                Swal.fire({
                                    title: 'Successfully 🐱‍🏍',
                                    text: "Product has been added to cart.",
                                    icon: "success"
                                });
                                $('#cart-count').text(data.itemsCount || $('#cart-count').text());
                            } else {
                                Swal.fire({
                                    title: 'Opps 🤷‍♀️',
                                    text: "There's an error when trying to add this product to your cart, kindly try again :)",
                                    icon: "error"
                                });
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Opps 🤷‍♀️',
                                text: "There's an error when trying to add this product to your cart, kindly try again :)",
                                icon: "error"
                            });
                        }
                    }
                });
            });
        }
    }


    function productDetail() {
        changeThumbnail();
        adjustQuantity();
        addToCart();
        buyNow();
    }
    productDetail();
});
