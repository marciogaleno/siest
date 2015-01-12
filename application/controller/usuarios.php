<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of curso
 *
 * @author Natchios
 */
class Usuarios extends Controller{
    
   public $name = 'usuarios';
    
   function __construct()
    {
        parent::__construct();
        Auth::estaLogado();
    }  
    
    function index()
    {

        $loginModel = $this->loadModel('UsuarioModel');
        $usuarios = $loginModel->getAll();
        // show the view
        require 'application/views/_templates/header.php';
        require 'application/views/usuarios/index.php';
        require 'application/views/_templates/footer.php';  
    }
    
    function add()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $usuarioModel = $this->loadModel('UsuarioModel');
            if ($usuarioModel->add()){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . $this->name);
                exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
        
        require 'application/views/_templates/header.php';
        require 'application/views/usuarios/add.php';
        require 'application/views/_templates/footer.php'; 
    }
    
    function edit($id= null)
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $usuarioModel = $this->loadModel('UsuarioModel');
            
            if ($usuarioModel->edit($id)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $_POST['id_professor']);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
        $loginModel = $this->loadModel('UsuarioModel');
        $usuario = $loginModel->get($id);        
        
        require 'application/views/_templates/header.php';
        require 'application/views/usuarios/edit.php';
        require 'application/views/_templates/footer.php'; 
    }
    
    function delete($id = null)
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $usuarioModel = $this->loadModel('UsuarioModel');  

            if ($usuarioModel->delete($id)){
                $this->setflash('Deletado com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . $this->name);
                exit;
            }else{
                $this->setflash('Erro ao excluir', array('class' => 'alert alert-error'));
                header('Location: '. URL . $this->name);                
            }
        }
    }
}
