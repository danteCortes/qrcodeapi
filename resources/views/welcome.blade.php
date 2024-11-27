<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Código QR Gratis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Generador de Código QR Gratis</h1>
        <p class="lead">Genere su código QR gratis, sin registrarse, todas las veces que quiera.</p>
    </header>

    <main class="container my-5">
        <div class="row">
            <!-- Generador QR -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5 mb-0">Ingrese el texto para generar su QR</h2>
                    </div>
                    <div class="card-body">
                        <input type="text" id="qr-input" class="form-control mb-3" placeholder="Ingrese su texto aquí">
                        <button id="generate-btn" class="btn btn-primary w-100">Generar QR</button>
                        <div id="qr-result" class="text-center my-3"></div>
                        <button id="download-btn" class="btn btn-success w-100 d-none">Descargar QR</button>
                    </div>
                </div>
            </div>

            <!-- Comentarios -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5 mb-0">Comentarios</h2>
                    </div>
                    <div class="card-body">
                        <textarea id="comment-input" class="form-control mb-3" rows="3" placeholder="Escriba su comentario aquí"></textarea>
                        <button id="add-comment-btn" class="btn btn-secondary w-100 mb-3">Agregar Comentario</button>
                        <ul id="comments-list" class="list-group"></ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 Generador de QR Gratis - Sin límites, sin publicidad.</p>
    </footer>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>