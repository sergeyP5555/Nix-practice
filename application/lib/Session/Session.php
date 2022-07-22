<?php

namespace App\lib\Session;

class Session
{
    public function start(): void
    {
        session_start();
    }

    public function set(string $name, string $value): string
    {
        return $_SESSION[$name] = $value;
    }

    public function get(string $name): string
    {
        return isset($_SESSION[$name]) ?? false;
    }

    public function destroy(string $name): void
    {
        unset($_SESSION[$name]);
    }

    public function destroySession(): void
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
            }
        }
        session_destroy();
    }
}
