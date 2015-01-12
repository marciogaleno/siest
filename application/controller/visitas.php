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
class Visitas extends Controller{
   function __construct()
    {
        parent::__construct();
        Auth::estaLogado();
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
    
    function view($id)
    {   
       $estagioModel = $this->loadModel('EstagioModel');
       $estagio = $estagioModel->get($id);
//       
       $visitaModel = $this->loadModel('VisitaModel');
       $visitas = $visitaModel->get($estagio['id_estagio']);

       require 'application/views/_templates/header.php';
       require 'application/views/estagios/view.php';
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
    
    function addVisita()
    {   
        Auth::estaLogadoAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $visitaModel = $this->loadModel('VisitaModel');
            //print_r($_POST);die;
            if ($visitaModel->add($_POST)){
                echo true;
                 exit;
            }else{
                echo false;
                exit;
            }
        }   
    }
    
   function delete($id = null, $id_estagio = null)
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $visitaModel = $this->loadModel('VisitaModel');

            if ($visitaModel->delete($id)){
                $this->setflash('Deletado com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . 'estagios' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $id_estagio);
                exit;
            }else{
                $this->setflash('Erro ao excluir', array('class' => 'alert alert-error'));
                header('Location: '. URL . $this->name);       
                exit;
            }
        }
    }
}
