<?php

// Incluir o modelo Livro
require_once __DIR__ . '/../models/Livro.php';

/**
 * Classe LivroController
 * Controlador responsável pelas ações do sistema de livros
 */
class LivroController {
    
    private $livro;
    
    /**
     * Construtor - inicializa o modelo Livro
     */
    public function __construct() {
        $this->livro = new Livro();
    }
    
    /**
     * Ação: listar todos os livros
     * @return array Retorna array com todos os livros
     */
    public function listar() {
        return $this->livro->listar();
    }
    
    /**
     * Ação: exibir formulário de cadastro
     */
    public function formCadastrar() {
        include __DIR__ . '/../views/cadastrar.php';
    }
    
    /**
     * Ação: cadastrar novo livro
     */
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar se os campos foram preenchidos
            if (empty($_POST['titulo']) || empty($_POST['autor']) || 
                empty($_POST['editora']) || empty($_POST['ano_publicacao']) || 
                empty($_POST['genero'])) {
                
                $mensagem = "Erro: Todos os campos são obrigatórios!";
                $tipo = "danger";
            } else {
                // Atribuir valores do formulário ao objeto
                $this->livro->titulo = $_POST['titulo'];
                $this->livro->autor = $_POST['autor'];
                $this->livro->editora = $_POST['editora'];
                $this->livro->ano_publicacao = $_POST['ano_publicacao'];
                $this->livro->genero = $_POST['genero'];
                
                // Tentar inserir
                if ($this->livro->inserir()) {
                    $mensagem = "Livro cadastrado com sucesso!";
                    $tipo = "success";
                } else {
                    $mensagem = "Erro ao cadastrar livro!";
                    $tipo = "danger";
                }
            }
            
            include __DIR__ . '/../views/mensagem.php';
        } else {
            $this->formCadastrar();
        }
    }
    
    /**
     * Ação: exibir formulário de edição
     * @param int $id ID do livro a editar
     */
    public function formEditar($id) {
        $livro = $this->livro->buscarPorId($id);
        
        if (!$livro) {
            $mensagem = "Livro não encontrado!";
            $tipo = "warning";
            include __DIR__ . '/../views/mensagem.php';
            return;
        }
        
        include __DIR__ . '/../views/editar.php';
    }
    
    /**
     * Ação: atualizar livro
     * @param int $id ID do livro a atualizar
     */
    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar se os campos foram preenchidos
            if (empty($_POST['titulo']) || empty($_POST['autor']) || 
                empty($_POST['editora']) || empty($_POST['ano_publicacao']) || 
                empty($_POST['genero'])) {
                
                $mensagem = "Erro: Todos os campos são obrigatórios!";
                $tipo = "danger";
            } else {
                // Atribuir valores do formulário ao objeto
                $this->livro->id = $id;
                $this->livro->titulo = $_POST['titulo'];
                $this->livro->autor = $_POST['autor'];
                $this->livro->editora = $_POST['editora'];
                $this->livro->ano_publicacao = $_POST['ano_publicacao'];
                $this->livro->genero = $_POST['genero'];
                
                // Tentar atualizar
                if ($this->livro->atualizar()) {
                    $mensagem = "Livro atualizado com sucesso!";
                    $tipo = "success";
                } else {
                    $mensagem = "Erro ao atualizar livro!";
                    $tipo = "danger";
                }
            }
            
            include __DIR__ . '/../views/mensagem.php';
        } else {
            $this->formEditar($id);
        }
    }
    
    /**
     * Ação: excluir livro
     * @param int $id ID do livro a excluir
     */
    public function excluir($id) {
        if ($this->livro->excluir($id)) {
            $mensagem = "Livro excluído com sucesso!";
            $tipo = "success";
        } else {
            $mensagem = "Erro ao excluir livro!";
            $tipo = "danger";
        }
        
        include __DIR__ . '/../views/mensagem.php';
    }
}
?>
