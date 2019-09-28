CHANGEPSWD = {
    init: function() {
        document.getElementById("submitMdp").addEventListener("click", CHANGEPSWD.send);
    },

    send: function(e) {
        e.preventDefault();

        var mdp = document.getElementById("mdp").value;
        var newMdp = document.getElementById("newMdp").value;
        var newMdpConf = document.getElementById("newMdpConf").value;
        var regexMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/;
        var arrayChamp = ["mdp", "newMdp", "newMdpConf"];

        // CHECK FORM DATA
        if (mdp == "") {
            document.getElementById("formOkMdp").innerText = "Vous devez renseigner votre mot de passe actuel!";
            CHANGEPSWD.styleElem("mdp", "red", "red");  
        } else if (newMdp == "") {
            document.getElementById("formOkMdp").innerText = "Vous devez renseigner un nouveau mot de passe!";
            CHANGEPSWD.styleElem("mdp", "black", "black");  
            CHANGEPSWD.styleElem("newMdp", "red", "red");  
        } else if (!regexMdp.test(newMdp)) {
            document.getElementById("formOkMdp").innerText = "Votre mot de passe doit contenir au minimum une lettre minuscule, une lettre majuscule, un chiffre et 6 caractères.";
            CHANGEPSWD.styleElem("mdp", "black", "black");  
            CHANGEPSWD.styleElem("newMdp", "red", "red"); 
        } else if (newMdpConf == "") {
            document.getElementById("formOkMdp").innerText = "Veuillez confirmer votre nouveau mot de passe!";
            CHANGEPSWD.styleElem("mdp", "black", "black");  
            CHANGEPSWD.styleElem("newMdp", "black", "black");
            CHANGEPSWD.styleElem("newMdpConf", "red", "red"); 
        } else if (newMdp != newMdpConf) {
            document.getElementById("formOkMdp").innerText = "Les mots de passe ne sont pas identiques!";
            CHANGEPSWD.styleElem("mdp", "black", "black");  
            CHANGEPSWD.styleElem("newMdp", "red", "red");  
            CHANGEPSWD.styleElem("newMdpConf", "red", "red"); 
        } else {

            // CREATING FORM DAYA
            var myForm = new FormData();
            myForm.append("changepswd", "changepswd");
            myForm.append("mdp", mdp);
            myForm.append("newMdp", newMdp);
            myForm.append("newMdpConf", newMdpConf);

             // AJAX
             var xhr = new XMLHttpRequest();
             xhr.overrideMimeType("text/html; charset=utf-8");
             xhr.open('POST', 'index.php');
             xhr.send(myForm);
 
             xhr.onreadystatechange = function() {
                 if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                     console.log(xhr.response);
                     document.getElementById("formOkMdp").innerText = xhr.response;
                     arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                         CHANGEPSWD.styleElem(elem, "black", "black"); 
                     });
                 } else {
                     document.getElementById("formOkMdp").innerText = xhr.response;
                     arrayChamp.forEach(function(elem) { // RESET DESIGN CHAMP
                         CHANGEPSWD.styleElem(elem, "black", "black"); 
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
            document.getElementById("formOkMdp").innerText = "";
        }, 2000);
    }
}

window.onload = CHANGEPSWD.init();