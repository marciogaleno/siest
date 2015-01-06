<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coockie
 *
 * @author Márcio Vennan
 */
class Coockie {
    
    public static function  set(){
        setcookie("teste", 'mksmdlfksmdl',  time()+172800, '/');
    }
}

?>
