//VARIABLES GENERALES
const contentWrapper = document.getElementById('content-wrapper');
const botones = document.getElementById('botones');
const nomina = document.getElementById('nomina');
const search = document.getElementById('search');

function imprimeNomina() {
    botones.style.display = "none";
    search.style.display = "none";
    setTimeout(() => {
        window.print();
        setTimeout(() => {
                window.location.reload();
        }, "800");
    }, "1500");
}

function imprimeDeudas() {
    botones.style.display = "none";
    setTimeout(() => {
        window.print();
        setTimeout(() => {
                window.location.reload();
        }, "800");
    }, "1500");
}