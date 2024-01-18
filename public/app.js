document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("sendBtn").addEventListener("click", function () {
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var message = document.getElementById("message").value;

        // Envoyer les données au serveur avec fetch
        fetch("send_email.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({
                name: name,
                email: email,
                message: message,
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Erreur lors de l'envoi du message.");
            }
            return response.text();
        })
        .then(data => {
            // Le message a été envoyé avec succès
            alert("Le message a bien été envoyé. Réponse du serveur : " + data);
            // Vous pouvez également effectuer d'autres actions ici si nécessaire
        })
        .catch(error => {
            // Une erreur s'est produite lors de l'envoi
            alert("Erreur lors de l'envoi du message. Veuillez réessayer plus tard. Erreur : " + error.message);
        });
    });
});
// Ajoutez ce script à votre fichier app.js ou dans l'en-tête HTML
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}

// Sélectionnez le premier onglet par défaut
document.querySelector(".tablinks").click();








