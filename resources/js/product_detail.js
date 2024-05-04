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

const favor = document.querySelector("#favorite");

favor.addEventListener("click", () => {
    if (favor.classList.contains("toggled")) {
        favor.classList.remove("toggled");
        favor.style.fill = "currentColor";
    } else {
        favor.classList.add("toggled");
        favor.style.fill = "red";
    }
});
