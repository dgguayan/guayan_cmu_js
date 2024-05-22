<?php
defined('BASEPATH') OR exit('No direct script access allowed');



//users
// $route['user_detail/:(any)'] = 'users/user_detail/$1';
// $route['user_detail'] = 'users/user_detail/$1';
// $route['user_detail'] = 'users/user_detail';
// $route['users'] = 'users/index';

//public view
$route['generals'] = 'generals';
$route['add_article_general'] = 'generals/add_article_general';
$route['signup'] = 'generals/signup';
$route['signin'] = 'generals/signin';
////////////////////////////////

//proofreaders view

$route['proofreaders'] = 'proofreaders';
////////////////////////////////


//Evaluate articles view
$route['evaluate_articles'] = 'evaluate';
$route['article_detail_evaluate/(:any)'] = 'evaluate/evaluate_article_detail/$1';
////////////////////////////////

//Roles
$route['roles'] = 'roles';
$route['add_roles'] = 'roles/add_roles';

//volume view
$route['volumes'] = 'volumes';
$route['volumes_general'] = 'volumes/index_general';
$route['add_volume'] = 'volumes/add_volume';
$route['volume_detail_general/(:any)'] = 'volumes/view_general/$1';
$route['volume_detail/(:any)'] = 'volumes/view/$1';
// $route['volumes/articles/(:any)'] = 'volumes/articles/$1';
////////////////////////////////

//ARTICLE VIEW

$route['view-pdf/(:any)'] = 'articles/view_pdf/$1';


$route['articles'] = 'articles';
$route['articles_general'] = 'articles/index_general';
$route['add_article'] = 'articles/add_article';

$route['article_detail/(:any)'] = 'articles/view/$1';
$route['article_detail_general/(:any)'] = 'articles/view_general/$1';
////////////////////////////////

//author view

$route['authors'] = 'authors';
$route['author_detail/(:any)'] = 'authors/view/$1';

$route['add_user_author'] = 'users/add_user_author';
////////////////////////////////

//user view

$route['users'] = 'users';
// $route['add_user'] = 'users/add_user';

$route['add_user_evaluator'] = 'users/add_user_evaluator';
$route['add_user'] = 'users/add_user';

$route['user_detail_general/(:any)'] = 'users/view_general/$1';
$route['user_detail/(:any)'] = 'users/view/$1';
////////////////////////////////

//pages

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
////////////////////////////////

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
