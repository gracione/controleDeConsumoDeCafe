<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/consultar', 'cafeController@index'];
$route[] = ['/relatorio', 'cafeController@relatorio'];
$route[] = ['/consultar/adicionarCafe', 'cafeController@adicionarCafe'];
$route[] = ['/consultar/store', 'cafeController@store'];
$route[] = ['/consultar/{id}/delete', 'cafeController@delete'];

return $route;
