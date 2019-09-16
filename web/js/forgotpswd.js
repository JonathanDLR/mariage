/**
 * GESTION DE LOUBLI DE MOT DE PASSE
 */

FORGOTPSWD = {
    init: function() {
        document.getElementById("submit").addEventListener("click", FORGOTPSWD.send)
    },

    send: function() {
        var mail = document.getElementById("mail").value;
        var mailConf = document.getElementById("mailConf").value;
        var regexMail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var arrayChamp = ["mail", "mailConf"];
        
        // CONTROLE DES CHAMPS
        if (mail == "") {
            document.getElementById("formOk").innerText = "Vous devez renseigner votre mail!";
            FORGOTPSWD.styleElem("mail", "red", "red");  
        } else if (!regexMail.test(mail)) {
            document.getElementById("formOk").innerText = "Veuillez renseigner un email valide!";
            FORGOTPSWD.styleElem("mail", "red", "red"); 
        } else if (mailConf == "") {
            document.getElementById("formOk").innerText = "Veuillez confirmer votre mail!";
            FORGOTPSWD.styleElem("mailConf", "red", "red"); 
        } else if (mailConf != mail) {
            document.getElementById("formOk").innerText = "Les adresses mail ne sont pas identiques!";
            FORGOTPSWD.styleElem("mail", "red", "red");  
            FORGOTPSWD.styleElem("mailConf", "red", "red"); 
        } else {
            var myForm = new FormData();
            myForm.append("callreinit", "callreinit");
            myForm.append("mail", mail);
            myForm.append("mailConf", mailConf);
            // AJAX
            var xhr = new XMLHttpRequest();
            
            xhr.overrideMimeType("text/html; charset=utf-8");
            xhr.open('POST', 'index.php');
            xhr.send(myForm);
 
             xhr.onreadystatechange = function() {
                 if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                     document.getElementById("formOk").innerText = "Le mail de réinitialisation de votre mot de passe a été envoyé!";
                     arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                         document.getElementById(elem).value = "";
                         FORGOTPSWD.styleElem(elem, "black", "rgb(5, 155, 188)"); 
                     });
                 } else {
                     document.getElementById("formOk").innerText = "Erreur: " + xhr.responseText;
                     arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                         document.getElementById(elem).value = "";
                         FORGOTPSWD.styleElem(elem, "black", "rgb(5, 155, 188)"); 
                     });
                 }
             };
        }
    },

        /**
     * 
     * FONCTION MODIFIANT LE STYLE DE LELEM EN ERREUR 
     */
    styleElem: function(elem, colorTxt, colorBorder) { 
        document.getElementById(elem).parentElement.firstChild.style.color = colorTxt;
        document.getElementById(elem).style.borderColor = colorBorder;
        setTimeout(function() {
            document.getElementById("formOk").innerText = "";
        }, 2000);
    }
}

window.onload = FORGOTPSWD.init();






