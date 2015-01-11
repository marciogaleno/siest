<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instituicao
 *
 * @author Natchios
 */
class Instituicoes extends Controller{
    
    public $name = 'instituicoes';
    
    function __construct()
    {
        parent::__construct();

    }  
    
    function index()
    {   
       $instituicaoModel = $this->loadModel('InstituicaoModel');
       $instituicoes = $instituicaoModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/instituicoes/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function view($id = null)
    {   
       $instituicaoModel = $this->loadModel('InstituicaoModel');
       $instituicao = $instituicaoModel->get($id);
//       

       require 'application/views/_templates/header.php';
       require 'application/views/instituicoes/view.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }  
    
    function add()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $instituicaoModel = $this->loadModel('InstituicaoModel');
            //print_r($_POST);die;
            if ($instituicaoModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name );
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
  
       
       require 'application/views/_templates/header.php';
       require 'application/views/instituicoes/add.php';
       require 'application/views/_templates/footer.php';  
    }
    
    function edit($id = null)
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $instituicaoModel = $this->loadModel('InstituicaoModel');
            //print_r($_POST);die;
            if ($instituicaoModel->edit($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $_POST['id_instituicao']);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
        $instituicaoModel = $this->loadModel('InstituicaoModel');
        $instituicao = $instituicaoModel->get($id);
       
        require 'application/views/_templates/header.php';
        require 'application/views/instituicoes/edit.php';
        require 'application/views/_templates/footer.php';  
    }
    
    function delete($id = null)
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $instituicaoModel = $this->loadModel('InstituicaoModel');
            //print_r($_POST);die;
            if ($instituicaoModel->delete($id)){
                $this->setflash('Deletado com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
    }
}
