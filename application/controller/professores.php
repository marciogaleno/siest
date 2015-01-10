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
    
   function __construct()
    {
        parent::__construct();
        
        
        
    }  
    
    function index()
    {   
//       $livroModel = $this->loadModel('LivroModel');
//       $livros = $livroModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/professores/index.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {   
//       $livroModel = $this->loadModel('LivroModel');
//       $livros = $livroModel->getAll();
//       
//       $categoriaModel = $this->loadModel('CategoriaModel');
//       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/professores/add.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
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
            echo '<a href="#"  class="list-group-item" onclick="set_item_professor(\''.str_replace("'", "\'", $rs['nome']). "'" . ",'". $rs['id_professor'] . '\')">'. $matricula . ' - ' .$aluno_nome.'</a>';
       }
       
    }
}
