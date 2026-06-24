<?php
/**
 * View: Editar
 * Formulário para editar um livro existente
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
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Sistema de Cadastro de Livros</span>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Editar Livro</h2>
                
                <form method="POST" action="index.php?acao=editar&id=<?php echo htmlspecialchars($livro['id']); ?>" class="needs-validation">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($livro['titulo']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="autor" name="autor" value="<?php echo htmlspecialchars($livro['autor']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editora" class="form-label">Editora <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="editora" name="editora" value="<?php echo htmlspecialchars($livro['editora']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="ano_publicacao" class="form-label">Ano de Publicação <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao" value="<?php echo htmlspecialchars($livro['ano_publicacao']); ?>" min="1000" max="2100" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="genero" class="form-label">Gênero <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="genero" name="genero" value="<?php echo htmlspecialchars($livro['genero']); ?>" required>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">✏️ Atualizar</button>
                        <a href="index.php?acao=listar" class="btn btn-secondary">❌ Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
