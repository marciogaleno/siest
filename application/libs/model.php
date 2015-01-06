<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author Márcio Vennan
 */
class Model 
{
    public $acentos = array('Á','À','Ã','Â','É','È','Ê','Í','Ì','Î','Ó','Ò','Õ','Ô','Ú','Ù','Û','Ç',"'");

    public function retira_acentos(&$var){
            if( !empty($var)){
                $var = mb_strtoupper($var);
                $var = str_replace($this->acentos,$this->vogais,$var);
                //$var = Inflector::slug($var, ' ');
                    }
    }
}

