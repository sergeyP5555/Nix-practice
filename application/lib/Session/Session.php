<?php

namespace App\lib\Session;

class Session
{
    public function start()
    {
        session_start();
    }

    public function has($name): bool
    {
        return isset($_SESSION[$name]);
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return $_SESSION[$name];
    }

    public function destroy($name)
    {
        unset($_SESSION[$name]);
    }

    public function destroyAll()
    {
        session_destroy();
    }
}