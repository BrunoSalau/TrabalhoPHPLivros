<?php

// Incluir a classe Database
require_once __DIR__ . '/../config/Database.php';

/**
 * Classe Livro
 * Modelo para gerenciar livros no banco de dados
 */
class Livro {
    
    private $db;
    private $table = 'livros';
    
    // Propriedades
    public $id;
    public $titulo;
    public $autor;
    public $editora;
    public $ano_publicacao;
    public $genero;
    
    /**
     * Construtor - inicializa a conexão com o banco
     */
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    /**
     * Método para inserir um novo livro
     * @return bool Retorna true se inserido com sucesso
     */
    public function inserir() {
        try {
            $sql = "INSERT INTO " . $this->table . " 
                    (titulo, autor, editora, ano_publicacao, genero) 
                    VALUES 
                    (:titulo, :autor, :editora, :ano_publicacao, :genero)";
            
            $stmt = $this->db->prepare($sql);
            
            // Bind dos parâmetros
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':autor', $this->autor);
            $stmt->bindParam(':editora', $this->editora);
            $stmt->bindParam(':ano_publicacao', $this->ano_publicacao);
            $stmt->bindParam(':genero', $this->genero);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir livro: " . $e->getMessage();
            return false;
        }
    }
    
    /**
     * Método para listar todos os livros
     * @return array Retorna array com todos os livros
     */
    public function listar() {
        try {
            $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar livros: " . $e->getMessage();
            return array();
        }
    }
    
    /**
     * Método para buscar um livro por ID
     * @param int $id ID do livro
     * @return array Retorna array com dados do livro
     */
    public function buscarPorId($id) {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar livro: " . $e->getMessage();
            return null;
        }
    }
    
    /**
     * Método para atualizar um livro
     * @return bool Retorna true se atualizado com sucesso
     */
    public function atualizar() {
        try {
            $sql = "UPDATE " . $this->table . " 
                    SET titulo = :titulo, 
                        autor = :autor, 
                        editora = :editora, 
                        ano_publicacao = :ano_publicacao, 
                        genero = :genero 
                    WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            
            // Bind dos parâmetros
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':autor', $this->autor);
            $stmt->bindParam(':editora', $this->editora);
            $stmt->bindParam(':ano_publicacao', $this->ano_publicacao);
            $stmt->bindParam(':genero', $this->genero);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar livro: " . $e->getMessage();
            return false;
        }
    }
    
    /**
     * Método para excluir um livro
     * @param int $id ID do livro a excluir
     * @return bool Retorna true se excluído com sucesso
     */
    public function excluir($id) {
        try {
            $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir livro: " . $e->getMessage();
            return false;
        }
    }
}
?>
