document.addEventListener("DOMContentLoaded", function () {
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

function changeImageWithAnimation(newImageSrc) {
    var largeImage = document.getElementById("largeImage");
    largeImage.style.opacity = 0;
    setTimeout(function () {
        largeImage.src = newImageSrc;
        largeImage.style.opacity = 1;
        largeImage.style.transition = "0.3s ease-in-out";
    }, 300);
}
function getSelectedColor() {
    return document.querySelector('input[name="color"]:checked').value;
}

function getSelectedSize() {
    return document.querySelector('input[name="size"]:checked').value;
}

const buy = document.getElementById("buynow");
if (buy) {
    buy.addEventListener("click", function () {
        document.getElementById("selectedColor").value = getSelectedColor();
        document.getElementById("selectedSize").value = getSelectedSize();
        document.getElementById("buy").submit();
    });
}
