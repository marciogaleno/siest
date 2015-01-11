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
class InstituicaoModel {
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
    public function add($instituicao)
    {
        $sql = "INSERT INTO instituicao SET "
                . "nome = :nome, "
                . "cnpj = :cnpj, "
                . "representante = :representante, "
                . "endereco = :endereco, "
                . "email = :email, "
                . "telefone = :telefone ";
        
        $query = $this->db->prepare($sql); 
       //print_r($instituicao); die;
        $query->bindValue(':nome', $instituicao['nome'], PDO::PARAM_STR);
        $query->bindValue(':cnpj', $instituicao['cnpj'], PDO::PARAM_STR);
        $query->bindValue(':representante', $instituicao['representante'], PDO::PARAM_STR);
        $query->bindValue(':endereco', $instituicao['endereco'], PDO::PARAM_STR);
        $query->bindValue(':email', $instituicao['email'], PDO::PARAM_STR);
        $query->bindValue(':telefone', $instituicao['telefone'], PDO::PARAM_STR);

        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function edit($instituicao)
    {
        $sql = "UPDATE instituicao SET "
                . "nome = :nome,"
                . "cnpj = :cnpj, "
                . "representante = :representante, "
                . "endereco = :endereco, "
                . "email = :email, "
                . "telefone = :telefone "
                . " WHERE id_instituicao = :id_instituicao ";
        
        $query = $this->db->prepare($sql); 
        
        $query->bindValue(':id_instituicao', (int)$instituicao['id_instituicao'], PDO::PARAM_INT);
        $query->bindValue(':nome', $instituicao['nome'], PDO::PARAM_STR);
        $query->bindValue(':cnpj', $instituicao['cnpj'], PDO::PARAM_STR);
        $query->bindValue(':representante', $instituicao['representante'], PDO::PARAM_STR);
        $query->bindValue(':endereco', $instituicao['endereco'], PDO::PARAM_STR);
        $query->bindValue(':email', $instituicao['email'], PDO::PARAM_STR);
        $query->bindValue(':telefone', $instituicao['telefone'], PDO::PARAM_STR);
        
            
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = "SELECT * FROM instituicao WHERE id_instituicao = :id_instituicao";
        
        $query = $this->db->prepare($sql);
             //var_dump($instituicaos); die;
        $query->bindParam(':id_instituicao', $id, PDO::PARAM_INT);
        
        $query->execute();  
        
        $instituicao = $query->fetchAll();
        
        return reset($instituicao);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM instituicao WHERE id_instituicao = :id_instituicao";
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':id_instituicao', $id, PDO::PARAM_INT);
             //var_dump($instituicaos); die;
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT * FROM instituicao WHERE 1 = 1';
        
        $query = $this->db->prepare($sql);
             //var_dump($instituicaos); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function searchAjax()
    {
        $instituicao = '%'.$_POST['professor_nome_matricula'].'%';

        $sql = 'SELECT * FROM professor WHERE nome LIKE :professor OR matricula LIKE :professor LIMIT 0, 10';
  
        $query = $this->db->prepare($sql);
        
        $query->bindParam(':professor', $instituicao, PDO::PARAM_STR);

             //var_dump($instituicaos); die;
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
//             //var_dump($instituicaos); die;
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
             //var_dump($instituicaos); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
