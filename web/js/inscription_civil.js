INSCRIPTION_CIVIL = {
    init: function() {
        document.getElementById("submit").addEventListener("click", INSCRIPTION_CIVIL.send);
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
        arrayChamp = ["nbre"];

        // CHECKING DATA
        if ((presence == true) && ((nbre <= 1) || (!Number.isInteger(parseInt(nbre))))) {
            document.getElementById("formOk").innerText = "Veuillez renseigner un nombre!";
 
            INSCRIPTION_CIVIL.styleElem("nbre", "red", "red");
        } else {
            // CREATING FORM DATA
            var myForm = new FormData();
            myForm.append("inscription", "inscription");
            myForm.append("presence", presence);
            myForm.append("nbre", nbre);

            // AJAX
            var xhr = new XMLHttpRequest();
            xhr.overrideMimeType("text/html; charset=utf-8");
            xhr.open('POST', 'index.php');
            xhr.send(myForm);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                    document.getElementById("formOk").innerText = xhr.responseText;
                    arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                        INSCRIPTION_CIVIL.styleElem(elem, "black", "black");  
                    });
                } else {
                    document.getElementById("formOk").innerText = xhr.responseText;
                    arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                        INSCRIPTION_CIVIL.styleElem(elem, "black", "black"); 
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

window.onload = INSCRIPTION_CIVIL.init();