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
class SupervtecnicoModel {
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
    public function add($aluno)
    {
        $sql = "INSERT INTO aluno SET nome = :nome,matricula = :matricula, curso_id_curso = :curso_id_curso, "
                . " telefone = :telefone, email = :email,"
                . "cpf = :cpf,dat_nasc = :dat_nasc, "
                . "rg = :rg";
        
        $query = $this->db->prepare($sql); 
       //print_r($aluno); die;
        $query->bindValue(':nome', $aluno['nome'], PDO::PARAM_STR);
        $query->bindValue(':matricula', $aluno['matricula'], PDO::PARAM_STR);
        $query->bindValue(':curso_id_curso', $aluno['curso_id_curso']);
        $query->bindValue(':telefone', $aluno['telefone'], PDO::PARAM_STR);
        $query->bindValue(':email', $aluno['email'], PDO::PARAM_STR);
        $query->bindValue(':cpf', $aluno['cpf'], PDO::PARAM_STR);
        $query->bindValue(':dat_nasc', $aluno['dat_nasc'], PDO::PARAM_STR);
        $query->bindValue(':rg', $aluno['rg'], PDO::PARAM_STR);
        
        
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function edit($aluno)
    {
        $sql = "UPDATE aluno SET "
                . "nome = :nome,"
                . "matricula = :matricula, "
                . "curso_id_curso = :curso_id_curso, "
                . "telefone = :telefone, "
                . "email = :email, "
                . "cpf = :cpf,  "
                . "dat_nasc = :dat_nasc, "
                . "rg = :rg "
                . " WHERE id = :id";
        
        $query = $this->db->prepare($sql); 
        
        
        
        $query->bindValue(':id', (int)$aluno['id'], PDO::PARAM_INT);
        $query->bindValue(':nome', $aluno['nome'], PDO::PARAM_STR);
        $query->bindValue(':matricula', $aluno['matricula'], PDO::PARAM_STR);
        $query->bindValue(':curso_id_curso', $aluno['curso_id_curso']);
        $query->bindValue(':telefone', $aluno['telefone'], PDO::PARAM_STR);
        $query->bindValue(':email', $aluno['email'], PDO::PARAM_STR);
        $query->bindValue(':cpf', $aluno['cpf'], PDO::PARAM_STR);
        $query->bindValue(':dat_nasc', $aluno['dat_nasc'], PDO::PARAM_STR);
        $query->bindValue(':rg', $aluno['rg'], PDO::PARAM_STR);
        
            
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = "SELECT a.*, c.nome as nome_curso, c.id_curso FROM aluno as a "
                . "INNER JOIN curso as c ON c.id_curso = a.curso_id_curso"
                . " WHERE a.id={$id}";
        $query = $this->db->prepare($sql);
             //var_dump($alunos); die;
        $query->execute();  
        
        $aluno = $query->fetchAll();
        
        return reset($aluno);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM livro WHERE idLivro={$id}";
  
        $query = $this->db->prepare($sql);
             //var_dump($alunos); die;
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT a.*, c.nome as nome_curso FROM aluno as a '
                . 'INNER JOIN curso as c ON c.id_curso = a.curso_id_curso';
        
        $query = $this->db->prepare($sql);
             //var_dump($alunos); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function searchAjax()
    {
        $superv_tecnico = '%'.$_POST['superv_tecnico_nome'].'%';

        $sql = 'SELECT st.*, i.nome as nome_instituicao FROM superv_tecnico as st '
                . 'INNER JOIN instituicao as i ON i.id_instituicao = st.instituicao_id_instituicao '
                . 'WHERE st.nome LIKE :superv_tecnico OR i.nome LIKE :superv_tecnico LIMIT 0, 10';
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':superv_tecnico', $superv_tecnico, PDO::PARAM_STR);

             //var_dump($alunos); die;
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
//             //var_dump($alunos); die;
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
             //var_dump($alunos); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
