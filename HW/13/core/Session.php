<?php

session_start();

class Session
{
    public static function exists(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    public static function put(string $name, mixed $value): void
    {
        $_SESSION[$name] = $value;
    }

    public static function get(string $name): mixed
    {
        return $_SESSION[$name];
    }

    public static function delete($name): void
    {
        unset($_SESSION[$name]);
    }

    /**
     * flash
     * 
     * If session exist, it will return the value
     * and unset the session.
     * 
     * Otherwise, make the $name session with $string value.
     * @param  string $name
     * @param  string $string [optional] Default value: 'null'
     * @return string|void
     */
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
