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
class Instituicao extends Controller{
    
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
       require 'application/views/instituicao/index.php';
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
       require 'application/views/instituicao/add.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
}
