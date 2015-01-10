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
       $AlunoModel = $this->loadModel('AlunoModel');
       $alunos = $AlunoModel->search();
       	// put in bold the written text
       //print_r($alunos);
       foreach ($alunos as $rs) {
            $aluno_nome = str_replace($_POST['aluno'], '<b>'.$_POST['aluno'].'</b>', $rs['nome']);
            $id = str_replace($_POST['aluno'], '<b>'.$_POST['aluno'].'</b>', $rs['id']);
            $matricula = str_replace($_POST['aluno'], '<b>'.$_POST['aluno'].'</b>', $rs['matricula']);
            // add new option
            echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['nome']). "'" . ",'". $rs['id'] . '\')">'. $matricula . ' - ' .$aluno_nome.'</li>';
       }
       
    }
}
