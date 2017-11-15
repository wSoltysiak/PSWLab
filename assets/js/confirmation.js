function confirm_reset() {
    return confirm("Czy jesteś pewny że chcesz wyczyścić formularz?");
}

function confirm_submit() {
    return confirm("Czy jesteś pewny że chcesz przejść dalej?");
}

document.querySelector('#submit1').onsubmit = confirm_submit;
document.querySelector('#submit1').onreset = confirm_reset;