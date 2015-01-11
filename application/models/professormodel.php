<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professormodel
 *
 * @author Natchios
 */
class ProfessorModel {
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) 
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
  /**
     * adicona um livro
     * @param srray $data
     */
    public function add($professor)
    {
        $sql = "INSERT INTO professor SET "
                . "nome = :nome, "
                . "matricula = :matricula, "
                . "curso_id_curso = :curso_id_curso, "
                . " telefone = :telefone";

        
        $query = $this->db->prepare($sql); 
       //print_r($professor); die;
        $query->bindValue(':nome', $professor['nome'], PDO::PARAM_STR);
        $query->bindValue(':matricula', $professor['matricula'], PDO::PARAM_STR);
        $query->bindValue(':curso_id_curso', $professor['curso_id_curso']);
        $query->bindValue(':telefone', $professor['telefone'], PDO::PARAM_STR);

        
        
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function edit($professor)
    {
        $sql = "UPDATE professor SET "
                . "nome = :nome,"
                . "matricula = :matricula, "
                . "curso_id_curso = :curso_id_curso, "
                . "telefone = :telefone "
                . " WHERE id_professor = :id_professor ";
        
        $query = $this->db->prepare($sql); 
        
        
        
        $query->bindValue(':id_professor', (int)$professor['id_professor'], PDO::PARAM_INT);
        $query->bindValue(':nome', $professor['nome'], PDO::PARAM_STR);
        $query->bindValue(':matricula', $professor['matricula'], PDO::PARAM_STR);
        $query->bindValue(':curso_id_curso', $professor['curso_id_curso']);
        $query->bindValue(':telefone', $professor['telefone'], PDO::PARAM_STR);
        
            
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = "SELECT p.*, c.nome as nome_curso, c.id_curso FROM professor as p "
                . "INNER JOIN curso as c ON c.id_curso = p.curso_id_curso"
                . " WHERE p.id_professor = {$id}";
        $query = $this->db->prepare($sql);
             //var_dump($professors); die;
        $query->execute();  
        
        $professor = $query->fetchAll();
        
        return reset($professor);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM professor WHERE id_professor = :id_professor";
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':id_professor', $id, PDO::PARAM_INT);
             //var_dump($professors); die;
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT p.*, c.nome as nome_curso FROM professor as p '
                . 'INNER JOIN curso as c ON c.id_curso = p.curso_id_curso';
        
        $query = $this->db->prepare($sql);
             //var_dump($professors); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function searchAjax()
    {
        $professor = '%'.$_POST['professor_nome_matricula'].'%';

        $sql = 'SELECT * FROM professor WHERE nome LIKE :professor OR matricula LIKE :professor LIMIT 0, 10';
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':professor', $professor, PDO::PARAM_STR);

             //var_dump($professors); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function getPagnation()
    {
        $sql = 'SELECT * FROM aluno';
        $query1 = $this->db->query($sql);
        $total = $query1->rowCount();
        $max = 6;
        
        $nav = new Pagination($max, $total);
        
        $query2 = $this->db->query($sql." LIMIT ".$nav->start().",".$max);
        
        return $nav;
//        $query = $this->db->prepare($sql);
//             //var_dump($professors); die;
//        $query->execute();
//        
//        return $query->fetchAll();
    }
    
    public function getLivrosPorCategoria($categoria_id)
    {
        $sql = 'SELECT l.*, c.nome as nome_categoria FROM livro as l 
                INNER JOIN categoria as c ON c.idCategoria = l.categoria_id 
                WHERE c.idCategoria = :idCategoria';
        
        $query = $this->db->prepare($sql);
        
        $query->bindValue(':idCategoria', $categoria_id, PDO::PARAM_INT);
             //var_dump($professors); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
