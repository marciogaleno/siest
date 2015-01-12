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
class UsuarioModel
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
    function add()
    {
        //var_dump($_POST); die;
        //criando hash senha
        $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuario SET nome = :nome, "
                . "email = :email, "
                . "senha = :senha,"
                . "tipo_user = :tipo_user";
        
        $query = $this->db->prepare($sql); 
        
        
        if ($query->execute(array(
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $hash,
            'tipo_user' => $_POST['tipo_user']
        ))){
            return true;
        } 
        
        return false;       
    }
    
    function edit($id)
    {
        //var_dump($_POST); die;
        //criando hash senha
        $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        $sql = "UPDATE usuario SET "
                . "nome = :nome, "
                . "email = :email, "
                . "senha = :senha,"
                . "tipo_user = :tipo_user "
                . "WHERE id = :id";
        
        $query = $this->db->prepare($sql); 
        
        
        if ($query->execute(array(
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $hash,
            'tipo_user' => $_POST['tipo_user'],
            'id' => $_POST['id']
        ))){
            return true;
        } 
        
        return false;       
    }
    
    
    public function get($id = null)
    {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        
        $query = $this->db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();  
        
        $usuario = $query->fetchAll();
        
        return reset($usuario);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM usuario WHERE id = :id";
  
        $query = $this->db->prepare($sql);
       
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        if ($query->execute()){
            return true;
        }  
        
        return false;      
    }
            
    public function getAll()
    {
        $sql = "SELECT * FROM usuario WHERE 1 = 1";
        
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}

