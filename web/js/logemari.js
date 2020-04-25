LOGEMARI = {
    checkboxLogemari: document.getElementById("logemari"),
    DIVnuit: document.getElementById("DIVnuit"),
    DIVloge: document.getElementById("DIVloge"),
    DIVgite: document.getElementById("DIVgite"),
    loge:    document.getElementById("logement"),

    init: function() {
        LOGEMARI.show();
        LOGEMARI.showGite();
        LOGEMARI.checkboxLogemari.addEventListener("change", LOGEMARI.show);
        LOGEMARI.loge.addEventListener("change", LOGEMARI.showGite);
    },

    show() {
        if (LOGEMARI.checkboxLogemari.checked) {
            LOGEMARI.DIVnuit.style.display = "grid";
            LOGEMARI.DIVloge.style.display = "grid";
            LOGEMARI.showGite();
        } else {
            LOGEMARI.DIVnuit.style.display = "none";
            LOGEMARI.DIVloge.style.display = "none";
            LOGEMARI.showGite();
        }
    },

    showGite() {
        if ((LOGEMARI.loge.value == "1") && (LOGEMARI.checkboxLogemari.checked)) {
            LOGEMARI.DIVgite.style.display = "grid";
        } else {
            LOGEMARI.DIVgite.style.display = "none";
        }
    }
}

window.onload = LOGEMARI.init();