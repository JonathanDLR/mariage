VEGAN = {
    checkboxVeg: document.getElementById("vegan"),
    labelVeg: document.querySelector("label[for=nbreVegan]"),
    inputVeg: document.getElementById("nbreVegan"),

    init: function() {
        VEGAN.show();
        VEGAN.checkboxVeg.addEventListener("change", VEGAN.show);
    },

    show() {
        if (VEGAN.checkboxVeg.checked) {
            VEGAN.labelVeg.style.display = "inline";
            VEGAN.inputVeg.style.display = "block";
        } else {
            VEGAN.labelVeg.style.display = "none";
            VEGAN.inputVeg.style.display = "none";
        }
    }
}

window.onload = VEGAN.init();