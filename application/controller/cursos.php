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
class Cursos extends Controller{
    
   public $name = 'cursos';
    
   function __construct()
    {
        parent::__construct();
        Auth::estaLogado();
    }  
    
    function index()
    {   
       $cursoModel = $this->loadModel('CursoModel');
       $cursos = $cursoModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/cursos/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function view($id = null)
    {   
       $cursoModel = $this->loadModel('CursoModel');
       $curso = $cursoModel->get($id);
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/cursos/view.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $cursoModel = $this->loadModel('CursoModel');
            //
            if ($cursoModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name );
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
       $professorModel = $this->loadModel('ProfessorModel');
       $professores = $professorModel->getAll();
       
       require 'application/views/_templates/header.php';
       require 'application/views/cursos/add.php';
       require 'application/views/_templates/footer.php';  
    }
    
    function edit($id = null)
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $cursoModel = $this->loadModel('CursoModel');
            //
            if ($cursoModel->edit($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . $this->name . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $_POST['id_curso']);
                exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
       $cursoModel = $this->loadModel('CursoModel');
       $curso = $cursoModel->get($id);
       
       $professorModel = $this->loadModel('ProfessorModel');
       $professores = $professorModel->getAll();
       
       require 'application/views/_templates/header.php';
       require 'application/views/cursos/edit.php';
       require 'application/views/_templates/footer.php';  
    }
    
    function delete($id = null)
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $cursoModel = $this->loadModel('CursoModel');

            if ($cursoModel->delete($id)){
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
