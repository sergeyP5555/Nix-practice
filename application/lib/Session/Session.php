<?php

namespace App\lib\Session;

class Session
{
    public function start(): void
    {
        session_start();
    }

    public function get(string $name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return null;
        }
    }

    public function set($name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    public function destroy(string $name): void
    {
        unset($_SESSION[$name]);
    }

    public function destroySession(): void
    {
        session_destroy();
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
            }
        }
    }
}
