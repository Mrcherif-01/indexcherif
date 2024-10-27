function verifa() {
    let nbr = document.getElementById("nbr").value; // If there's a number input with ID "nbr"
    let nn = document.getElementById("nn").value; // Name
    let np = document.getElementById("pre").value; // Prenom (ensure correct ID)
    let tel = document.getElementById("tel").value; // Telephone
    let test = true;

    // Validate name and prenom
    if (!alpha(nn) || !alpha(np)) {
        test = false;
        alert("Vérifiez les champs du nom et du prénom.");
        console.log("Erreur dans la partie nom et prénom.");
        return false; // Prevent form submission
    }

    // If validation passes, generate reservation number
    const x = Math.floor(Math.random() * 9000000000) + 1000000000;
    document.getElementById("num_res").innerText = "Numéro de Réservation : " + x;
    
    // Return true to indicate success if needed
    return true;
}

function alpha(ch) {
    if (ch.length == 0) {
        return false; // Return false if the input is empty
    }
    let ok = true;
    for (let i = 0; i < ch.length; i++) {
        let char = ch[i].toUpperCase();
        if (!(char >= "A" && char <= "Z")) {
            ok = false; // Set ok to false if a character is not between A and Z
            break;
        }
    }
    return ok; // Return true if all characters are valid
}
