<?php
/**
 * index.php
 * Arquivo principal que controla as ações do sistema
 * Utiliza parâmetro GET para definir qual ação executar
 */

// Incluir o controller
require_once __DIR__ . '/controllers/LivroController.php';

// Criar instância do controller
$controller = new LivroController();

// Verificar qual ação foi solicitada
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

// Executar a ação apropriada
switch ($acao) {
    case 'listar':
        // Ação: listar todos os livros
        $livros = $controller->listar();
        include __DIR__ . '/views/listar.php';
        break;
    
    case 'cadastrar':
        // Ação: cadastrar novo livro
        $controller->cadastrar();
        break;
    
    case 'editar':
        // Ação: editar livro
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $controller->editar($id);
        } else {
            header('Location: index.php?acao=listar');
        }
        break;
    
    case 'excluir':
        // Ação: excluir livro
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $controller->excluir($id);
        } else {
            header('Location: index.php?acao=listar');
        }
        break;
    
    default:
        // Ação padrão: listar
        $livros = $controller->listar();
        include __DIR__ . '/views/listar.php';
        break;
}
?>
