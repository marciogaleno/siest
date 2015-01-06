<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author marcio
 */
class Session {
    /**
     * starts the session
     */
    public static function init()
    {
        // if no session exist, start the session
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     * sets a specific value to a specific key of the session
     * @param mixed $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * gets/returns the value of a specific key of the session
     * @param mixed $key Usually a string, right ?
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    /**
     * deletes the session (= logs the user out)
     */
    public static function destroy()
    {
        session_destroy();
    }
    
    public static function destroyKey($key)
    {
        if (isset($_SESSION[$key])) {
           unset($_SESSION[$key]);
        }
    }
}
