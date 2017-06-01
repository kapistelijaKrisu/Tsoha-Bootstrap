<?php

$routes->get('/', function() {
    Redirect::to('/overview');
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
$routes->get('/login', function() {
    HelloWorldController::login();
});
$routes->get('/overview', function() {
    HelloWorldController::overview();
});
$routes->get('/admin', function() {
    HelloWorldController::adminPage();
});
$routes->get('/mypage/:id', function($id) {
    HelloWorldController::myPage($id);
});
$routes->get('/character/:id', function($id) {
    HelloWorldController::character($id);
});

$routes->post('/login', function() {
    Redirect::to('/overview', array('message' => 'Nothing interesting happens..yet.'));
});
$routes->post('/admin/newEle', function() {
    ElementController::store();
    Redirect::to('/admin', array('message' => 'Element added.'));
});
$routes->post('/admin/newClas', function() {
    ClasController::store();
    Redirect::to('/admin', array('message' => 'Class added.'));
});
$routes->post('/admin/newItem', function() {
    ItemController::store();
    Redirect::to('/admin', array('message' => 'Item added.'));
});
$routes->post('/admin/newPlayer', function() {
    PlayerController::store();
    Redirect::to('/admin', array('message' => 'Player added.'));
});
$routes->post('/admin/newChar', function() {
    AvatarController::store();
    Redirect::to('/admin', array('message' => 'Character added.'));
});


$routes->post('/admin/delEle', function() {
    Redirect::to('/admin', array('message' => 'Element deleted.'));
});
$routes->post('/admin/delClas', function() {
    Redirect::to('/admin', array('message' => 'Class deleted.'));
});
$routes->post('/admin/delItem', function() {
    Redirect::to('/admin', array('message' => 'Item deleted.'));
});
$routes->post('/admin/delPlayer', function() {
    Redirect::to('/admin', array('message' => 'Player deleted.'));
});
$routes->post('/admin/delChar', function() {
    Redirect::to('/overview', array('message' => 'Character deleted.'));
});

