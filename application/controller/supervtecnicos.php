<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of professor
 *
 * @author Natchios
 */
class Supervtecnicos extends Controller{
    
   public $name = 'supervtecnicos';
            
   function __construct()
    {
        parent::__construct();
        Auth::estaLogado();
    }  
    
    function index()
    {   
       $supervtecnicoModel = $this->loadModel('SupervtecnicoModel');
       $superv_tecnicos = $supervtecnicoModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/supervtecnicos/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function view($id = null)
    {   
       $supervtecnicoModel = $this->loadModel('SupervtecnicoModel');
       $superv_tecnico = $supervtecnicoModel->get($id);
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/supervtecnicos/view.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $superTecnicoModel = $this->loadModel('SupervtecnicoModel');
            //print_r($_POST);die;
            if ($superTecnicoModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name );
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
       $instituicaoModel = $this->loadModel('InstituicaoModel');
       $instituicoes = $instituicaoModel->getAll();
       
       require 'application/views/_templates/header.php';
       require 'application/views/supervtecnicos/add.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function edit($id = null)
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $superTecnicoModel = $this->loadModel('SupervtecnicoModel');
            //print_r($_POST);die;
            if ($superTecnicoModel->edit($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . $this->name . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $_POST['id']);
                exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
       $instituicaoModel = $this->loadModel('InstituicaoModel');
       $instituicoes = $instituicaoModel->getAll();
       
       $supervtecnicoModel = $this->loadModel('SupervtecnicoModel');
       $superv_tecnico = $supervtecnicoModel->get($id);
       
       require 'application/views/_templates/header.php';
       require 'application/views/supervtecnicos/edit.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function delete($id = null)
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $supervtecnicoModel = $this->loadModel('SupervtecnicoModel');

            if ($supervtecnicoModel->delete($id)){
                $this->setflash('Deletado com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . $this->name);
                exit;
            }else{
                $this->setflash('Erro ao excluir', array('class' => 'alert alert-error'));
                header('Location: '. URL . $this->name);                
            }
        }
    }  
    
    function searchAjax()
    { 
       $supervtecnicoModel = $this->loadModel('SupervtecnicoModel');
       $superv_tecnicos = $supervtecnicoModel->searchAjax();
       	// put in bold the written text
       //print_r($alunos);
       foreach ($superv_tecnicos as $rs) {
            $superv_tecnico_nome = str_replace($_POST['superv_tecnico_nome'], '<b>'.$_POST['superv_tecnico_nome'].'</b>', $rs['nome']);
            $instituicao = str_replace($_POST['superv_tecnico_nome'], '<b>'.$_POST['superv_tecnico_nome'].'</b>', $rs['nome_instituicao']);
            //$matricula = str_replace($_POST['professor_nome_matricula'], '<b>'.$_POST['professor_nome_matricula'].'</b>', $rs['matricula']);
            // add new option
            echo '<a href="#"  class="list-group-item" onclick="set_item_superv_tec(\''.str_replace("'", "\'", $rs['nome']). "'" . ",'". $rs['id'] . '\')">'. $superv_tecnico_nome . ' - ' . $instituicao .'</a>';
       }
       
    }
}
