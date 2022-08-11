const value = document.getElementById("quantity_value");
const plus = document.querySelector(".plus");
const minus = document.querySelector(".minus");
let c = 1;

plus.addEventListener("click", () => {
    c = c + 1;
    value.value = c;
});

minus.addEventListener("click", () => {
    if (c > 1) {
        c = c - 1;
        value.value = c;
    }
});
