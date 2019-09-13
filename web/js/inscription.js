INSCRIPTION = {
    init: function() {
        document.getElementById("submit").addEventListener("click", INSCRIPTION.send);
    },

    /**
     * SENDING FORM
     */
    send: function(e) {
        e.preventDefault();

        // GETTING DATA
        var checkboxPresence = document.getElementById("presence").checked;
        if (checkboxPresence == true) {
            var presence = true;
        } else {
            var presence = false;
        }
        var nbre = document.getElementById("nbre").value;
        var checkboxVegan = document.getElementById("vegan").checked;
        if (checkboxVegan == true) {
            var vegan = true;
        } else {
            var vegan = false;
        }
        var nbreVegan = document.getElementById("nbreVegan").value;
        var allergie = document.getElementById("allergie").value;
        var checkboxCivil = document.getElementById("civil").checked;
        if (checkboxCivil == true) {
            var civil = true;
        } else {
            var civil = false;
        }
        var logement = document.getElementById("logement").value;
        arrayChamp = ["nbre", "nbreVegan", "logement"];

        // CHECKING DATA
        if ((presence == true) && (nbre == 0)) {
            document.getElementById("formOk").innerText = "Veuillez renseigner un nombre valide!";
            INSCRIPTION.styleElem("nbre", "red", "red");
        } else if ((presence == true) && (typeof allergie !== 'string')) {
            document.getElementById("formOk").innerText = "L'allergie doit être un texte!";
            INSCRIPTION.styleElem("nbre", "black", "black");
            INSCRIPTION.styleElem("allergie", "red", "red");
        } else if ((presence == true)  && (logement == "")) {
            document.getElementById("formOk").innerText = "Le logement doit être un texte!";
            INSCRIPTION.styleElem("nbre", "black", "black");
            INSCRIPTION.styleElem("allergie", "black", "black");
            INSCRIPTION.styleElem("logement", "red", "red");
        } else {
            // CREATING FORM DATA
            var myForm = new FormData();
            myForm.append("inscription", "inscription");
            myForm.append("presence", presence);
            myForm.append("nbre", nbre);
            myForm.append("vegan", vegan);
            myForm.append("nbreVegan", nbreVegan);
            myForm.append("allergie", allergie);
            myForm.append("civil", civil);
            myForm.append("logement", logement);

            // AJAX
            var xhr = new XMLHttpRequest();
            xhr.overrideMimeType("text/html; charset=utf-8");
            xhr.open('POST', 'index.php');
            xhr.send(myForm);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                    document.getElementById("formOk").innerText = xhr.responseText;
                    arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                        INSCRIPTION.styleElem(elem, "black", "black");  
                    });
                } else {
                    document.getElementById("formOk").innerText = xhr.responseText;
                    arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                        INSCRIPTION.styleElem(elem, "black", "black"); 
                    });
                }
            };
        }
    },

    /**
     * 
     * STYLE ELEM IN ERROR
     */
    styleElem: function(elem, colorTxt, colorBorder) { 
        document.getElementById(elem).parentElement.firstElementChild.style.color = colorTxt;
        document.getElementById(elem).style.borderColor = colorBorder;
        setTimeout(function() {
            document.getElementById("formOk").innerText = "";
        }, 2000);
    }
}

window.onload = INSCRIPTION.init();