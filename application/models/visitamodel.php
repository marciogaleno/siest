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
class VisitaModel {
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
    public function add($visita)
    {
        echo $visita['horario'];
        $sql = "INSERT INTO visita SET "
                . "data = :data,"
                . "horario = :horario,"
                . "resumo = :resumo,"
                . "estagio_id_estagio = :estagio_id_estagio ";

        
        $query = $this->db->prepare($sql); 
        //print_r($visita); die;
        $query->bindValue(':data', $visita['data']);
        $query->bindValue(':horario',  $visita['horario']);
        $query->bindValue(':resumo', $visita['resumo'], PDO::PARAM_STR);
        $query->bindValue(':estagio_id_estagio', $visita['estagio_id']);
   
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function edit($visita)
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
        
        
        
        $query->bindValue(':id', (int)$visita['id'], PDO::PARAM_INT);
        $query->bindValue(':nome', $visita['nome'], PDO::PARAM_STR);
        $query->bindValue(':matricula', $visita['matricula'], PDO::PARAM_STR);
        $query->bindValue(':curso_id_curso', $visita['curso_id_curso']);
        $query->bindValue(':telefone', $visita['telefone'], PDO::PARAM_STR);
        $query->bindValue(':email', $visita['email'], PDO::PARAM_STR);
        $query->bindValue(':cpf', $visita['cpf'], PDO::PARAM_STR);
        $query->bindValue(':dat_nasc', $visita['dat_nasc'], PDO::PARAM_STR);
        $query->bindValue(':rg', $visita['rg'], PDO::PARAM_STR);
        
            
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function get($estagio_id)
    {
        $sql = 'SELECT * FROM visita WHERE estagio_id_estagio = :estagio_id';
        
        $query = $this->db->prepare($sql);
        
        $query->bindValue(':estagio_id', $estagio_id);

        $query->execute();  
        
        return $query->fetchAll();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM visita';
        
        $query = $this->db->prepare($sql);
             //var_dump($visitas); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM visita WHERE id = :id";
  
        $query = $this->db->prepare($sql);
        
         $query->bindValue(':id', $id);
         
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }

    
    public function searchAjax()
    {
        $visita = '%'.$_POST['aluno'].'%';

        $sql = 'SELECT * FROM aluno WHERE nome LIKE :aluno  OR matricula LIKE :aluno LIMIT 0, 10';
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':aluno', $visita, PDO::PARAM_STR);

             //var_dump($visitas); die;
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
//             //var_dump($visitas); die;
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
             //var_dump($visitas); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
