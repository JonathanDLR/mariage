/**
 * REINIT PSWD
 */

REINITIALISATION = {
    init: function() {
        var elementExist = document.getElementById("submit");
        if (elementExist) {
            document.getElementById("submit").addEventListener("click", REINITIALISATION.send);
        }        
    },

    send: function() {
        var mdp = document.getElementById("mdp").value;
        var mdpConf = document.getElementById("mdpConf").value;
        var regexMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/;
        var arrayChamp = ["mdp", "mdpConf"];
        
        // CHECK FORM DATA
        if (mdp == "") {
            document.getElementById("formOk").innerText = "Vous devez renseigner votre mot de passe!";
            REINITIALISATION.styleElem("mdp", "red", "red");  
        } else if (!regexMdp.test(mdp)) {
            document.getElementById("formOk").innerText = "Votre mot de passe doit contenir au minimum une lettre minuscule, une lettre majuscule, un chiffre et 6 caractères.";
            REINITIALISATION.styleElem("mdp", "red", "red"); 
        } else if (mdpConf == "") {
            document.getElementById("formOk").innerText = "Veuillez confirmer votre mot de passe!";
            REINITIALISATION.styleElem("mdpConf", "red", "red"); 
        } else if (mdp != mdpConf) {
            document.getElementById("formOk").innerText = "Les mots de passe ne sont pas identiques!";
            REINITIALISATION.styleElem("mdp", "red", "red");  
            REINITIALISATION.styleElem("mdpConf", "red", "red"); 
        } else {
            //GETTING INFO FROM URL
            var param = REINITIALISATION.extractUrlParams();
            var nom = param["nom"];
            var token = param["token"];

            // CREATING FORM DAYA
            var myForm = new FormData();
            myForm.append("reinit", "reinit");
            myForm.append("nom", nom);
            myForm.append("token", token);
            myForm.append("mdp", mdp);
            myForm.append("mdpConf", mdpConf);

             // AJAX
             var xhr = new XMLHttpRequest();
             xhr.overrideMimeType("text/html; charset=utf-8");
             xhr.open('POST', 'index.php');
             xhr.send(myForm);
 
             xhr.onreadystatechange = function() {
                 if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                     console.log(xhr.response);
                     document.getElementById("formOk").innerText = xhr.response;
                     arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                         document.getElementById(elem).value = "";
                         REINITIALISATION.styleElem(elem, "black", "rgb(5, 155, 188)"); 
                     });
                 } else {
                     document.getElementById("formOk").innerText = "Erreur: " + xhr.response;
                     arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                         document.getElementById(elem).value = "";
                         REINITIALISATION.styleElem(elem, "black", "rgb(5, 155, 188)"); 
                     });
                 }
             };
        }
    },

     /**
     * 
     * CHANGING STYLE
     */
    styleElem: function(elem, colorTxt, colorBorder) { 
        document.getElementById(elem).parentElement.firstChild.style.color = colorTxt;
        document.getElementById(elem).style.borderColor = colorBorder;
        setTimeout(function() {
            document.getElementById("formOk").innerText = "";
        }, 2000);
    },

    /**
     * GET PARAM URL
     */
    extractUrlParams: function() {	
        var t = location.search.substring(1).split('&');
        var f = [];
        for (var i=0; i<t.length; i++){
            var x = t[ i ].split('=');
            f[x[0]]=x[1];
        }
        return f;
    }
}

window.onload = REINITIALISATION.init();