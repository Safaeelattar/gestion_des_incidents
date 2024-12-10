<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('dashboard', 'Home::dashboard');


$routes->post('dashboard', 'Home::dashboard');

// Route pour la table des incidents


$routes->get('tables', 'IncidentController::tables');

$routes->get('reponse/(:num)', 'IncidentController::reponse/$1');
$routes->post('envoyerReponse/(:num)', 'IncidentController::envoyerReponse/$1');



$routes->get('/notifications', 'IncidentController::notifications');


//supprimer user 
$routes->post('delete-user/(:num)', 'RegisterController::delete/$1');

$routes->delete('/delete-user/(:num)', 'RegisterController::delete/$1');





// Route pour mettre à jour le statut de l'incident
$routes->get('incident/updateStatus/(:num)/(:any)', 'IncidentController::updateStatus/$1/$2');


$routes->get('/connexion', 'AuthController::login');



$routes->get('login', 'AuthController::login'); // Affiche la page de connexion
$routes->post('login', 'AuthController::authenticate'); // Traite la connexion
$routes->get('logout', 'AuthController::logout'); // Déconnecte l'utilisateur



$routes->get('l', 'AuthController::login'); // Affiche la page de connexion
$routes->post('l', 'AuthController::authenticate');

// Route pour afficher la page de connexion
$routes->get('admin_login', 'AdminController::login');

// Route pour l'authentification POST
$routes->post('admin/authenticate', 'AdminController::authenticate');


$routes->get('form', 'Home::form');

$routes->get('liste_users' , 'RegisterController::listUsers');
$routes->post('delete-user/(:num)', 'RegisterController::deleteUser/$1');




// $routes->get('/', 'Home::index');


$routes->get('create', 'IncidentController::create');
$routes->post('incident/store', 'IncidentController::store');

$routes->get('/notifications', 'NotificationController::showNotifications');
// Route pour afficher la page de connexion (GET)
$routes->get('/admin_login', 'AdminController::adminLogin');

// Route pour traiter le formulaire de connexion (POST)
$routes->post('/admin_login', 'AdminController::login');

// Route pour déconnecter l'utilisateur


// $routes->post('/admin/authenticate', 'AdminController::authenticate');
// $routes->get('/admin/logout', 'AdminController::logout');
// $routes->get('/admin/dashboard', 'DashboardController::index', ['filter' => 'auth']); // Exemple pour le dashboard
$routes->get('logoutAdmin', 'LogoutAdminController::logoutAdmin');

$routes->get('logout', 'LogoutAdminController::logoutAdmin');


$routes->match(['get', 'post'], '/register', 'RegisterController::register');


$routes->get('profile', 'ProfileController::index');
$routes->post('/profile/update', 'ProfileController::update');
