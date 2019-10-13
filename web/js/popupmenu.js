POPUPMENU = {
    popup: document.getElementById("DIVpopMenu"),

    init: function() {
        document.getElementById("BUTmenu").addEventListener("click", POPUPMENU.toggle);
        window.addEventListener("resize", POPUPMENU.resize);
    },

    toggle: function() {
        
        if (POPUPMENU.popup.style.display === "block") {
          POPUPMENU.popup.style.display = "none";
        } else {
          POPUPMENU.popup.style.display = "block";
        }
    },

    resize: function() {
      POPUPMENU.popup.style.display = "none";
    }
}

window.onload = POPUPMENU.init();





