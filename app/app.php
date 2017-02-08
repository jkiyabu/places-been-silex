<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Places.php";

    session_start();

    if (empty($_SESSION['places'])) {
        $_SESSION['places'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array ('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));

    });

    $app->post("/places", function() use ($app) {
        $place = new Place($_POST['place_name']);
        $place->save();
        return $app['twig']->render('create_place.html.twig', array('newplace' => $place));
    });

    $app->post("/delete_places", function() use ($app){

        Place::deleteAll();

        return $app['twig']->render('delete_places.html.twig');
    });

    return $app;
?>
