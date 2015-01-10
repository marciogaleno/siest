<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estagios
 *
 * @author Natchios
 */
class Estagios extends Controller{
   function __construct()
    {
        parent::__construct();
        
        
        
    }  
    
    function index()
    {   
       $estagioModel = $this->loadModel('EstagioModel');
       $estagios = $estagioModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/estagios/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {   
      Auth::estaLogadoAdmin();       

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $estagioModel = $this->loadModel('EstagioModel');
            //print_r($_POST);die;
            if ($estagioModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }  

       require 'application/views/_templates/header.php';
       require 'application/views/estagios/add.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }

}
