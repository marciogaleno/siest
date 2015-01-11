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
    public function add($supervtecnico)
    {
        $sql = "INSERT INTO superv_tecnico SET "
                . "nome = :nome,"
                . "telefone = :telefone, "
                . "instituicao_id_instituicao = :instituicao_id_instituicao";
        
        $query = $this->db->prepare($sql); 
       //print_r($supervtecnico); die;
        $query->bindValue(':nome', $supervtecnico['nome'], PDO::PARAM_STR);
        $query->bindValue(':telefone', $supervtecnico['telefone'], PDO::PARAM_STR);
        $query->bindValue(':instituicao_id_instituicao', $supervtecnico['instituicao_id_instituicao']);

        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function edit($supervtecnico)
    {
        $sql = "UPDATE superv_tecnico SET "
                . "nome = :nome,"
                . "telefone = :telefone, "
                . "instituicao_id_instituicao = :instituicao_id_instituicao "
                . " WHERE id = :id";
        
        $query = $this->db->prepare($sql); 
        print_r($supervtecnico);
        $query->bindValue(':nome', $supervtecnico['nome'], PDO::PARAM_STR);
        $query->bindValue(':telefone', $supervtecnico['telefone'], PDO::PARAM_STR);
        $query->bindValue(':instituicao_id_instituicao', $supervtecnico['instituicao_id_instituicao']);
        $query->bindValue(':id', $supervtecnico['id']);
        
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = 'SELECT st.*, i.nome as nome_instituicao, i.id_instituicao FROM superv_tecnico as st '
             . 'INNER JOIN instituicao as i ON i.id_instituicao = st.instituicao_id_instituicao '
             . 'WHERE st.id = :id';
        
        $query = $this->db->prepare($sql);
        
        $query->bindValue(':id', $id, PDO::PARAM_INT);
             //var_dump($supervtecnicos); die;
        $query->execute();  
        
        $supervtecnico = $query->fetchAll();
        
        return reset($supervtecnico);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM superv_tecnico WHERE id = :id";

        $query = $this->db->prepare($sql);
        
        $query->bindValue(':id', $id, PDO::PARAM_INT);
         
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT st.*, i.nome as nome_instituicao, i.id_instituicao FROM superv_tecnico as st '
             . 'INNER JOIN instituicao as i ON i.id_instituicao = st.instituicao_id_instituicao '
             . 'WHERE 1 = 1';
        
        $query = $this->db->prepare($sql);
             //var_dump($supervtecnicos); die;
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

             //var_dump($supervtecnicos); die;
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
//             //var_dump($supervtecnicos); die;
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
             //var_dump($supervtecnicos); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
