const add = document.getElementById("increment-button");
const sub = document.getElementById("decrement-button");
const input = document.getElementById("quantity-input");
let a = 1;

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
});

function changeImageWithAnimation(newImageSrc) {
    var largeImage = document.getElementById("largeImage");
    largeImage.style.opacity = 0; // Fade out the current image

    setTimeout(function () {
        largeImage.src = newImageSrc; // Change the image source
        largeImage.style.opacity = 1; // Fade in the new image
        largeImage.style.transition = "0.3s ease-in-out";
    }, 300); // Adjust the time according to your transition duration
}
