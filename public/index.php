<?php
spl_autoload_register(function ($class) {
    $paths = [
        '../controllers/',
        '../models/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Routing
$page = htmlspecialchars($_GET['page'] ?? 'home', ENT_QUOTES, 'UTF-8');

$routes = [
    'home' => [HomeController::class, 'index'],
    'rules' => [RulesController::class, 'showRules'],
    'game' => [GameController::class, 'startGame'],
    'scores' => [ScoresController::class, 'showScores'],
    'enter_name' => [PlayerController::class, 'enterName'],
    'win' => [GameController::class, 'winGame'],
    'lose' => [GameController::class, 'loseGame'],
    'score_image' => [ScoresController::class, 'generateScoreImage']
];



if (array_key_exists($page, $routes)) {
    [$class, $method] = $routes[$page];
    $controller = new $class();
    $controller->$method();
} else {
    require_once '../views/404.html.php';
}
