<?php
/**
 * View: Mensagem
 * Exibe mensagens de sucesso ou erro
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-<?php echo htmlspecialchars($tipo); ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo ($tipo === 'success') ? 'Sucesso!' : 'Atenção!'; ?></strong>
                    <?php echo htmlspecialchars($mensagem); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <div class="mt-3 d-flex gap-2">
                    <a href="index.php?acao=listar" class="btn btn-primary">Voltar à Lista</a>
                    <a href="index.php?acao=cadastrar" class="btn btn-success">Novo Livro</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
