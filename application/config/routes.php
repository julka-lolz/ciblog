<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
/*
    De eerste onderstande code laat ons sneler kunnen zoeken naar een file.
    dus nu hoeven we niet "http://localhost:8080/ciblog/pages/view/about" de gebruiken,
    maar "http://localhost:8080/ciblog/about"
    zonder $1 gaat het niet werken,
    $1 represents anything.
*/
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


