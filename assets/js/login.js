let idinput = document.getElementById('idinput');
let submit_button = document.getElementById('submit_button');
let zone_switch = document.getElementById('flexy')

zone_switch.onclick = function itsclicked() {
    if (idinput.checked) {
        submit_button.value = "Se Connecter";
        idinput.value = "on";
    } else {
        submit_button.value = "Créer compte";
        idinput.value = "off";
    }
}

idinput.checked = false;

if (idinput.value == "on") {
    submit_button.value = "Se Connecter";
    idinput.checked = true;
} else {
    submit_button.value = "Créer compte";
    idinput.checked = false;
}