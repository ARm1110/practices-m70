<?php

namespace App\core;

use App\core\Controller;

session_start();

class Session extends Controller
{
    public static function exists(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    public static function put(string $name,  $value): void
    {
        $_SESSION[$name] = $value;
    }

    public static function get(string $name)
    {
        return $_SESSION[$name];
    }

    public static function delete($name): void
    {
        unset($_SESSION[$name]);
    }
    public static function change($name, $value): void
    {
        $_SESSION[$name]=$value;
    }
    public static function deleteAll(): void
    {
        session_destroy();
    }

    public static function flash(string $name, ?string $string = 'null'): ?string
    {
        if (self::exists($name)) {
            $value = self::get($name);
            self::delete($name);
            return $value;
        }
        self::put($name, $string);
        return null;
    }
}
