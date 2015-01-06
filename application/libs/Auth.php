<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Márcio Vennan
 */
class Auth 
{
    public static function estaLogado()
    {
        // initialize the session
        Session::init();
        // if user is still not logged in, then destroy session, handle user as "not logged in" and
        // redirect user to login page
        if (!isset($_SESSION['usuario_logado'])) {
            Session::destroy();
            header('location: ' . URL . 'login');
            // to prevent fetching views via cURL (which "ignores" the header-redirect above) we leave the application
            // the hard way, via exit(). @see https://github.com/panique/php-login/issues/453
            exit();
        }
    }
    
    public static function estaLogadoAdmin()
    {
        // initialize the session
        Session::init();
        // if user is still not logged in, then destroy session, handle user as "not logged in" and
        // redirect user to login page
        if (!isset($_SESSION['usuario_logado']) && !isset($_SESSION['tipo_user'])) { 
                Session::destroy();
                header('location: ' . URL . 'admin/login');
                // to prevent fetching views via cURL (which "ignores" the header-redirect above) we leave the application
                // the hard way, via exit(). @see https://github.com/panique/php-login/issues/453
                exit();
        }
        
        if (isset($_SESSION['usuario_logado']) && isset($_SESSION['tipo_user']) && $_SESSION['tipo_user'] != 'admin') { 
                Session::destroy();
                header('location: ' . URL . 'admin/login');
                // to prevent fetching views via cURL (which "ignores" the header-redirect above) we leave the application
                // the hard way, via exit(). @see https://github.com/panique/php-login/issues/453
                exit();
        }

    }
}

