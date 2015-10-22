<?php include("users.php"); ?>
<?php include("toolbox.php"); ?>
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


$app = new Application();

$app['debug'] = true;

$toolbox1 = new Toolbox("1", "Saw", "2", "$2.50");
$toolbox2 = new Toolbox("2", "Hammer", "4", "$6.00");
$toolbox3 = new Toolbox("3", "Screw Driver", "5", "$3.75");

$tools = array($toolbox1, $toolbox2, $toolbox3);

$user1 = new user("1", "test", "test@test.com", "1", "true");
$user2 = new user("2", "casey", "casey@test.com", "3", "true");
$user3 = new user("3", "temp", "temp@test.com", "1", "false");

$users = array($user1, $user2, $user3);

$app->get('/', function(){
    return new Response('Project 1 - Proof of Concept API', 200);
});

$app->get('/users', function() use ($users) {
    return new Response(
       json_encode($users),
       200,
       ['Content-Type' => 'application/json']
   );
});

$app->get('users/{id}', function(Application $app, $id) use ($users){
    if (!isset($users[$id])){
        $app->abort(404, 'User with ID {$id} does not exist.');
    }

    return new Response(
        json_encode($users[$id]),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->delete('/users/{id}', function(Application $app, $id) use($users){
    if (!isset($users[$id])){
        $app->abort(404, 'User with ID {$id} does not exist.');
    }
    var_dump($users);
    foreach ($users as $key => $object) {
        if ($key == $id) {
            unset($users[$id]);
        }
    }

    return new Response(
        null,
        204
    );
});


$app->post('/notes', function(Application $app, Request $request) use ($users) {
    $contentTypeValid = in_array(
        'application/json',
        $request->getAcceptableContentTypes()
    );

    if (!$contentTypeValid) {
        $app->abort(406, 'Client only accepts content type of "application/json"');
    }

    $content = json_decode($request->getContent());

    $newId = uniqid();

    $newUser = new user($newId, $content->username, $content->email, $content->access, $content->active);

    $users[] = $newUser;

    return new Response(
        json_encode($users),
        201,
        ['Content-Type' => 'application/json']
    );
});

$app->put('/notes/{id}', function(Application $app, Request $request, $id) use ($users){
    if(!isset($users[$id])){
        $app->abort(404, 'User with ID {$id} does not exist');
    }

    $payload = json_decode($request->getContent());

    $users[$id] = $payload;
});

#-------------- TOOLBOX -------------

$app->get('/tools', function() use ($tools) {
    return new Response(
        json_encode($tools),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->get('tools/{id}', function(Application $app, $id) use ($tools){
    if (!isset($tools[$id])){
        $app->abort(404, 'User with ID {$id} does not exist.');
    }

    return new Response(
        json_encode($tools[$id]),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->delete('/tools/{id}', function(Application $app, $id) use($tools){
    if (!isset($tools[$id])){
        $app->abort(404, 'User with ID {$id} does not exist.');
    }
    var_dump($tools);
    foreach ($tools as $key => $object) {
        if ($key == $id) {
            unset($tools[$id]);
        }
    }

    return new Response(
        null,
        204);
});


$app->post('/tools', function(Application $app, Request $request) use ($tools) {
    $contentTypeValid = in_array(
        'application/json',
        $request->getAcceptableContentTypes()
    );

    if (!$contentTypeValid) {
        $app->abort(406, 'Client only accepts content type of "application/json"');
    }

    $content = json_decode($request->getContent());

    $newId = uniqid();

    $newTool = new Toolbox($newId, $content->toolName, $content->condition, $content->price);

    $tools[] = $newTool;

    return new Response(
        json_encode($tools),
        201,
        ['Content-Type' => 'application/json']
    );
});

$app->put('/notes/{id}', function(Application $app, Request $request, $id) use ($users){
    if(!isset($users[$id])){
        $app->abort(404, 'User with ID {$id} does not exist');
    }

    $payload = json_decode($request->getContent());

    $users[$id] = $payload;
});
