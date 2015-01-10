<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alunomodel
 *
 * @author Natchios
 */
class EstagioModel {
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
    public function add($estagio)
    {
        $sql = "INSERT INTO estagio SET "
                . "area = :area,"
                . "visto_coord = :visto_coord,"
                . "titulo = :titulo, "
                . "id_superv = :id_superv,"
                . "aluno_id = :aluno_id,"
                . "data_inicio = :data_inicio,"
                . "data_fim = :data_fim, "
                . "supervisor_idsupervisor = :supervisor_idsupervisor";
        
        $query = $this->db->prepare($sql); 
        //print_r($estagio); die;
        $query->bindValue(':aluno_id', $estagio['aluno_id']);
        $query->bindValue(':area', $estagio['area'], PDO::PARAM_STR);
        $query->bindValue(':visto_coord', $estagio['visto_coord']);
        $query->bindValue(':titulo', $estagio['titulo'], PDO::PARAM_STR);
        $query->bindValue(':supervisor_idsupervisor', $estagio['professor_id']);
        $query->bindValue(':id_superv', $estagio['superv_tecnico_id']);
        $query->bindValue(':data_inicio', $estagio['data_inicio'], PDO::PARAM_STR);
        $query->bindValue(':data_fim', $estagio['data_fim'], PDO::PARAM_STR);
   
        
        
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function edit($estagio)
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
        
        
        
        $query->bindValue(':id', (int)$estagio['id'], PDO::PARAM_INT);
        $query->bindValue(':nome', $estagio['nome'], PDO::PARAM_STR);
        $query->bindValue(':matricula', $estagio['matricula'], PDO::PARAM_STR);
        $query->bindValue(':curso_id_curso', $estagio['curso_id_curso']);
        $query->bindValue(':telefone', $estagio['telefone'], PDO::PARAM_STR);
        $query->bindValue(':email', $estagio['email'], PDO::PARAM_STR);
        $query->bindValue(':cpf', $estagio['cpf'], PDO::PARAM_STR);
        $query->bindValue(':dat_nasc', $estagio['dat_nasc'], PDO::PARAM_STR);
        $query->bindValue(':rg', $estagio['rg'], PDO::PARAM_STR);
        
            
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
             //var_dump($estagios); die;
        $query->execute();  
        
        $estagio = $query->fetchAll();
        
        return reset($estagio);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM livro WHERE idLivro={$id}";
  
        $query = $this->db->prepare($sql);
             //var_dump($estagios); die;
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT 
                    e.*, a.nome as nome_aluno, a.matricula as matricula_aluno,
                    p.nome as nome_professor, st.nome as nome_supervisor_tecnico,
                    i.nome as nome_instituicao 
                    FROM estagio as e 
                    INNER JOIN aluno as a ON a.id = e.aluno_id 
                    INNER JOIN professor as p ON p.id_professor = e.supervisor_idsupervisor 
                    INNER JOIN superv_tecnico as st ON st.id = e.id_superv 
                    INNER JOIN instituicao as i ON i.id_instituicao = st.instituicao_id_instituicao
                    WHERE 1 = 1';
        
        $query = $this->db->prepare($sql);
             //var_dump($estagios); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function searchAjax()
    {
        $estagio = '%'.$_POST['aluno'].'%';

        $sql = 'SELECT * FROM aluno WHERE nome LIKE :aluno  OR matricula LIKE :aluno LIMIT 0, 10';
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':aluno', $estagio, PDO::PARAM_STR);

             //var_dump($estagios); die;
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
//             //var_dump($estagios); die;
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
             //var_dump($estagios); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
