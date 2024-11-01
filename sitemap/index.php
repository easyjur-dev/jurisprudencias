<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyjur Jurisprudências - Sitemap</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">Sitemaps</h1>
    <div class="card mt-4">
        <div class="card-body">
            <ul class="list-group">
                <?php
                // Define o caminho da pasta
                $pasta = './';

                // Verifica se a pasta existe
                if (is_dir($pasta)) {
                    // Lê o conteúdo da pasta
                    $arquivos = scandir($pasta);

                    // Itera sobre cada item na pasta-+
                    foreach ($arquivos as $arquivo) {
                        // Ignora '.' e '..'
                        if (!in_array($arquivo, ['.', '..', 'index.php'])) {
                            echo "<li class='list-group-item'><a href='/juris/sitemap/$arquivo'>$arquivo</a></li>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- Script do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
