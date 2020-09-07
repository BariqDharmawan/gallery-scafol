<?php

use Jenssegers\Blade\Blade;

if (!function_exists('view'))  {
    function view($view, $data = [])
    {
        $viewDirectory = VIEWPATH;
        $cacheDirectory = APPPATH . 'cache';

        $blade = new Blade($viewDirectory, $cacheDirectory);
        echo $blade->make($view, $data);
    }
}