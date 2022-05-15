<?php

namespace App\core;

class View
{

    public function show(string $path, array $data = [])
    {
        foreach ($data as $key => $value) {

            $$key = $value;
        }

        $pathView = __DIR__ . '/../views/layout/' . $path . '.php';
        if (file_exists($pathView)) {
            ob_start();
            include $pathView;
            $body = ob_get_clean();
            include __DIR__ . '/../views/main.php';
            $main = ob_get_contents();
            ob_end_clean();
            echo str_replace('{{content}}', $body, $main);
        } else echo '404 from View';
    }

    public function  showDashboard(string $path, array $data = [])
    {
        foreach ($data as $key => $value) {

            $$key = $value;
        } {
            foreach ($data as $key => $value) {

                $$key = $value;
            }

            $pathView = __DIR__ . '/../views/layout/Doctor/' . $path . '.php';
            if (file_exists($pathView)) {
                ob_start();
                include $pathView;
                $body = ob_get_clean();
                include __DIR__ . '/../views/main2.php';
                $main = ob_get_contents();
                ob_end_clean();
                echo str_replace('{{content}}', $body, $main);
            } else echo '404 from View';
        }
    }
}
