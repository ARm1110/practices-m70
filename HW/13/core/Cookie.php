<?php

use App\core\Response;

class Cookie extends Response
{
    public static function exists(string $name): bool
    {
        return isset($_COOKIE[$name]);
    }

    public static function get(string $name): ?string
    {
        return $_COOKIE[$name] ?? null;
    }

    public static function put(string $name, string $value, int $expiry): bool
    {
        return setcookie($name, $value, time() + $expiry);
    }

    public static function delete(string $name): void
    {
        self::put($name, '', time() - 1);
    }
}
