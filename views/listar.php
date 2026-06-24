<?php
/**
 * View: Listar
 * Exibe a lista de todos os livros em uma tabela
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Lista de Livros</h2>
            <a href="index.php?acao=cadastrar" class="btn btn-success">+ Novo Livro</a>
        </div>
        
        <?php if (empty($livros)): ?>
            <div class="alert alert-info" role="alert">
                <strong>Nenhum livro cadastrado.</strong> 
                <!-- <a href="index.php?acao=cadastrar">Clique aqui</a> para adicionar um novo livro. -->
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Ano</th>
                            <th>Gênero</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($livros as $livro): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($livro['id']); ?></td>
                                <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                                <td><?php echo htmlspecialchars($livro['editora']); ?></td>
                                <td><?php echo htmlspecialchars($livro['ano_publicacao']); ?></td>
                                <td><?php echo htmlspecialchars($livro['genero']); ?></td>
                                <td>
                                    <a href="index.php?acao=editar&id=<?php echo $livro['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="index.php?acao=excluir&id=<?php echo $livro['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
