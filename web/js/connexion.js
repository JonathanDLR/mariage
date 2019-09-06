CONNEXION = {
    init: function() {
        document.getElementById("submit").addEventListener("click", CONNEXION.send)
    },

    send: function(e) {
        e.preventDefault();

        // GETTING DATA
        var login = document.getElementById("login").value;
        var mdp = document.getElementById("mdp").value;
        var regexMail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        arrayChamp = ["login", "mdp"];

        // CHECKING DATA
        if (login == "") {
            document.getElementById("formOk").innerText = "Vous devez renseigner votre login!";
            CONNEXION.styleElem("login", "red", "red");  
        // } else if (!regexMail.test(login)) {
        //     document.getElementById("formOk").innerText = "Veuillez renseigner un login valide!";
        //     CONNEXION.styleElem("login", "red", "red");   
        } else if (mdp == "") {
            document.getElementById("formOk").innerText = "Veuillez renseigner votre mot de passe";
            CONNEXION.styleElem("login", "black", "black"); 
            CONNEXION.styleElem("mdp", "red", "red");
        } else {
            // CREATING FORM DATA
            var myForm = new FormData();
            myForm.append("login", login);
            myForm.append("mdp", mdp);

            // AJAX
            var xhr = new XMLHttpRequest();
            xhr.overrideMimeType("text/html; charset=utf-8");
            xhr.open('POST', 'index.php');
            xhr.send(myForm);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.responseText == "OK") {
                        window.location.replace("accueil");
                    } else {
                        document.getElementById("formOk").innerText = xhr.responseText;
                        if (xhr.responseText == "Veuillez renseigner votre login!" || xhr.responseText == "login invalide!") {
                            CONNEXION.styleElem("login", "red", "red");  
                        } else if (xhr.responseText == "Veuillez renseigner votre mot de passe!!" || xhr.responseText == "Mot de passe invalide!") {
                            CONNEXION.styleElem("login", "black", "black"); 
                            CONNEXION.styleElem("mdp", "red", "red"); 
                        }
                    }
                    
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

window.onload = CONNEXION.init();