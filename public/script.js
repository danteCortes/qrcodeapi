// script.js
document.getElementById('generate-btn').addEventListener('click', () => {
    const input = document.getElementById('qr-input').value.trim();
    const resultContainer = document.getElementById('qr-result');
    const downloadBtn = document.getElementById('download-btn');
    resultContainer.innerHTML = ''; // Limpiar contenido anterior
    downloadBtn.classList.add('d-none'); // Ocultar botón de descarga

    if (input !== '') {
        QRCode.toCanvas(input, { width: 200 }, (err, canvas) => {
            if (err) {
                alert('Error al generar el código QR');
                console.error(err);
            } else {
                resultContainer.appendChild(canvas);
                downloadBtn.classList.remove('d-none'); // Mostrar botón de descarga
                downloadBtn.addEventListener('click', () => downloadQRCode(canvas));
            }
        });
    } else {
        alert('Por favor, ingrese texto para generar el QR.');
    }
});

function downloadQRCode(canvas) {
    const link = document.createElement('a');
    link.download = 'codigo_qr.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
}

document.getElementById('add-comment-btn').addEventListener('click', () => {
    const commentInput = document.getElementById('comment-input').value.trim();
    const commentsList = document.getElementById('comments-list');

    if (commentInput !== '') {
        const listItem = document.createElement('li');
        listItem.textContent = commentInput;
        listItem.className = 'list-group-item';
        commentsList.appendChild(listItem);
        document.getElementById('comment-input').value = '';
    } else {
        alert('Por favor, escriba un comentario.');
    }
});
