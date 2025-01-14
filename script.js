function proposta(risposta) {
    const messaggioElement = document.getElementById('messaggio');
    const siButton = document.getElementById('siBtn');
    const noButton = document.getElementById('noBtn');
    
    if (risposta === 'no') {
        // Se si clicca "No", il pulsante scappa
        scappaPulsante(noButton);
    } else if (risposta === 'si') {
        // Se si clicca "Sì", mostra il messaggio
        messaggioElement.innerHTML = "Ti amo!";
        siButton.style.display = "none"; // Nascondi il pulsante "Sì"
        noButton.style.display = "none"; // Nascondi il pulsante "No"
    }
}

function scappaPulsante(button) {
    // Ottieni la larghezza e l'altezza della finestra
    const maxX = window.innerWidth - button.offsetWidth;
    const maxY = window.innerHeight - button.offsetHeight;
    
    // Posizione casuale
    const posX = Math.random() * maxX;
    const posY = Math.random() * maxY;
    
    // Imposta la nuova posizione del pulsante
    button.style.position = 'absolute';
    button.style.left = posX + 'px';
    button.style.top = posY + 'px';
    
    // Cambia il testo del pulsante
    button.innerHTML = "No, aspetta! Dai, rispondi!";
    
    // Imposta l'evento onclick per continuare a spostarlo
    button.onclick = function() {
        proposta('no');
    }
}
