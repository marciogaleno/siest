<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Loginmodel
 *
 * @author marcio
 */
class LoginModel {
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Login process (for DEFAULT user accounts).
     * Users who login with Facebook etc. are handled with loginWithFacebook()
     * @return bool success state
     */
    public function login()
    {
//        // we do negative-first checks here
//        if (!isset($_POST['user_name']) OR empty($_POST['user_name'])) {
//            $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
//            return false;
//        }
        //var_dump($_POST);
        if (!isset($_POST['senha']) OR empty($_POST['senha'])) {
            return false;
        }

        // get user's data
        // (we check if the password fits the password_hash via password_verify() some lines below)
        $sth = $this->db->prepare("SELECT *
                                   FROM   usuario
                                   WHERE  (email = :email)");
        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $sth->execute(array(':email' => $_POST['email']));
        $count =  $sth->rowCount();
        // if there's NOT one result
        if ($count != 1) {
            // was FEEDBACK_USER_DOES_NOT_EXIST before, but has changed to FEEDBACK_LOGIN_FAILED
            // to prevent potential attackers showing if the user exists
            //$_SESSION["feedback_negative"][] = FEEDBACK_LOGIN_FAILED;
            return false;
        }

        // fetch one row (we only have one result)
        $result = $sth->fetch();

        // block login attempt if somebody has already failed 3 times and the last login attempt is less than 30sec ago
//        if (($result->user_failed_logins >= 3) AND ($result->user_last_failed_login > (time()-30))) {
//            $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG_3_TIMES;
//            return false;
//        }
        
         $sth = $this->db->prepare("SELECT *
                                   FROM   cliente
                                   WHERE  (EmailCli = :EmailCli)");  
         
         $sth->execute(array(':EmailCli' => $result['email']));
         
          $cliente = $sth->fetch();
         
        // check if hash of provided password matches the hash in the database
        if (password_verify($_POST['senha'], $result['senha'])) {

//            if ($result->user_active != 1) {
//                $_SESSION["feedback_negative"][] = FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET;
//                return false;
//            }

            // login process, write the user data into session
            Session::init();
            Session::set('usuario_logado', true);
            Session::set('usuario_id', $result['id']);
            Session::set('cliente_id', $cliente['idCliente']);
            Session::set('usuario_nome', $result['nome']);
            Session::set('usuario_email', $result['email']);
            Session::set('tipo_user', $result['tipo_user']);


//            // reset the failed login counter for that user (if necessary)
//            if ($result->user_last_failed_login > 0) {
//                $sql = "UPDATE users SET user_failed_logins = 0, user_last_failed_login = NULL
//                        WHERE user_id = :user_id AND user_failed_logins != 0";
//                $sth = $this->db->prepare($sql);
//                $sth->execute(array(':user_id' => $result->user_id));
//            }

            // generate integer-timestamp for saving of last-login date
            //$user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
//            $sql = "UPDATE users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
//            $sth = $this->db->prepare($sql);
//            $sth->execute(array(':user_id' => $result->user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));

            // if user has checked the "remember me" checkbox, then write cookie
//            if (isset($_POST['user_rememberme'])) {
//
//                // generate 64 char random string
//                $random_token_string = hash('sha256', mt_rand());
//
//                // write that token into database
//                $sql = "UPDATE users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
//                $sth = $this->db->prepare($sql);
//                $sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));
//
//                // generate cookie string that consists of user id, random string and combined hash of both
//                $cookie_string_first_part = $result->user_id . ':' . $random_token_string;
//                $cookie_string_hash = hash('sha256', $cookie_string_first_part);
//                $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
//
//                // set cookie
//                setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
//            }

            // return true to make clear the login was successful
            return true;

        } else {
            // increment the failed login counter for that user
            $sql = "UPDATE users
                    SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login
                    WHERE user_name = :user_name OR user_email = :user_name";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':user_name' => $_POST['user_name'], ':user_last_failed_login' => time() ));
            // feedback message
            $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG;
            return false;
        }

        // default return
        return false;
    }
    
    function registrarNovoUsuario()
    {
        //var_dump($_POST); die;
        //criando hash senha
        $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuario SET nome = :nome, "
                . "email = :email, "
                . "senha = :senha,"
                . "tipo_user = :tipo_user";
        
        $query = $this->db->prepare($sql); 
        
        
        if ($query->execute(array(
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $hash,
            'tipo_user' => $_POST['tipo_user']
        ))){
            return true;
        } 
        
        return false;       
    }
    
    /**
     * Mata sessão para fazer logout
     */
    public function logout()
    {
        Session::destroy();
    }
}
