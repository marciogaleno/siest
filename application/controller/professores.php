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
class Professores extends Controller{
   
   public $name = 'professores';
   
   function __construct()
    {
        parent::__construct();
        
        
        
    }  
    
    function index()
    {   
       $professorModel = $this->loadModel('ProfessorModel');
       $professores = $professorModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/professores/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function view($id)
    {   
       $professorModel = $this->loadModel('ProfessorModel');
       $professor = $professorModel->get($id);
//       

       require 'application/views/_templates/header.php';
       require 'application/views/professores/view.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $professorModel = $this->loadModel('ProfessorModel');
            //print_r($_POST);die;
            if ($professorModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name );
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
       $CursoModel = $this->loadModel('CursoModel');
       $cursos = $CursoModel->getAll();
       
       require 'application/views/_templates/header.php';
       require 'application/views/professores/add.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    function edit($id = null)
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $professorModel = $this->loadModel('ProfessorModel');
            //print_r($_POST);die;
            if ($professorModel->edit($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $_POST['id_professor']);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
       $CursoModel = $this->loadModel('CursoModel');
       $cursos = $CursoModel->getAll();
       
       $professorModel = $this->loadModel('ProfessorModel');
       $professor = $professorModel->get($id);
       
       require 'application/views/_templates/header.php';
       require 'application/views/professores/edit.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function delete($id = null)
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $professorModel = $this->loadModel('ProfessorModel');

            if ($professorModel->delete($id)){
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
       $professorModel = $this->loadModel('ProfessorModel');
       $professores = $professorModel->searchAjax();
       	// put in bold the written text
       //print_r($alunos);
       foreach ($professores as $rs) {
            $aluno_nome = str_replace($_POST['professor_nome_matricula'], '<b>'.$_POST['professor_nome_matricula'].'</b>', $rs['nome']);
            $matricula = str_replace($_POST['professor_nome_matricula'], '<b>'.$_POST['professor_nome_matricula'].'</b>', $rs['matricula']);
            // add new option
            //echo '<a href="#"  class="list-group-item" onclick="set_item_professor(\''.str_replace("'", "\'", $rs['nome']). "'" . ",'". $rs['id_professor'] . '\')">'. $matricula . ' - ' .$aluno_nome.'</a>';
            echo '<a href="#" class="list-group-item" onclick="set_item_professor(\''.str_replace("'", "\'", $rs['nome']). "'" . ",'". $rs['id_professor'] . '\')">'. $matricula . ' - ' .$aluno_nome.'</a>';

       }
       
    }
}
