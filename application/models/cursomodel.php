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
    public function add($curso)
    {
        $sql = "INSERT INTO curso SET "
             . "nome = :nome, "
             . "categoria = :categoria,"
             . "coord_estagio_id = :coord_estagio_id";
        
        $query = $this->db->prepare($sql); 
        
        $query->bindValue(':nome', $curso['nome'], PDO::PARAM_STR);
        $query->bindValue(':categoria', $curso['categoria'], PDO::PARAM_STR);
        $query->bindValue(':coord_estagio_id', $curso['coord_estagio_id'], PDO::PARAM_INT);
    
        if ($query->execute($curso)){
            return true;
        } 
        
        return false;
    }
    
    public function edit($curso)
    {
        $sql = "UPDATE curso SET "
             . "nome = :nome, "
             . "categoria = :categoria,"
             . "coord_estagio_id = :coord_estagio_id "
             . "WHERE id_curso = :id_curso";
                
        $query = $this->db->prepare($sql); 
        
        //print_r($curso);die;
        $query->bindValue(':nome', $curso['nome'], PDO::PARAM_STR);
        $query->bindValue(':categoria', $curso['categoria'], PDO::PARAM_STR);
        $query->bindValue(':coord_estagio_id', $curso['coord_estagio_id'], PDO::PARAM_INT);
        $query->bindValue(':id_curso', $curso['id_curso'], PDO::PARAM_INT);
    
        
         if ($query->execute()){
            return true;
        } 
        
        return false;
    }
    
    public function get($id = null)
    {
        $sql = "SELECT c.*, p.id_professor, p.nome as nome_professor FROM curso as c "
                . "INNER JOIN professor as p ON p.id_professor = c.coord_estagio_id "
                . "WHERE id_curso = :id_curso ";
        
        $query = $this->db->prepare($sql);

        $query->bindValue(':id_curso', $id, PDO::PARAM_INT);

        $query->execute();  
        
        $curso = $query->fetchAll();
        
        return reset($curso);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM curso WHERE id_curso = :id_curso";
  
        $query = $this->db->prepare($sql);
       
        $query->bindValue(':id_curso', $id, PDO::PARAM_INT);
        
        $query->execute();  
        
        return $query->fetchAll();
        
    }
            
    public function getAll()
    {
        $sql = "SELECT c.*, p.nome as nome_coordenador FROM curso as c "
                . "INNER JOIN professor as p ON p.id_professor = c.coord_estagio_id "
                . "WHERE 1 = 1 ";
        
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}

