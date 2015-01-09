<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoriasmodel
 *
 * @author Márcio Vennan
 */
class CursoModel
{
    private $db;
    
    function __construct($db) 
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /**
     * adicona um Categoria
     * @param srray $data
     */
    public function add($categoria)
    {
        $sql = "INSERT INTO categoria SET nome = :nome";
        
        $query = $this->db->prepare($sql); 
        
        $categoria['nome'] = $categoria['nome'];

        
        if ($query->execute($categoria)){
            return true;
        } 
        
        return false;
    }
    
    public function edit($categoria)
    {
        //var_dump($categoria); die;
      //echo $categoria['idCategoria']; die;
        $sql = "UPDATE categoria SET "
                . "nome = :nome "
                . "WHERE idCategoria = :idCategoria";
                
        $query = $this->db->prepare($sql); 

        $query->bindValue(':nome', $categoria['nome'], PDO::PARAM_STR);
        $query->bindValue(':idCategoria', (int)$categoria['idCategoria'], PDO::PARAM_INT);
        
         if ($query->execute()){
            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = "SELECT * FROM categoria as l WHERE l.idCategoria={$id}";
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();  
        
        $categoria = $query->fetchAll();
        
        return reset($categoria);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM categoria WHERE idCategoria={$id}";
  
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();  
        
        return $query->fetchAll();
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT * FROM curso';
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}

