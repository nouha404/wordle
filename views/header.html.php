<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'Wordle Astronomie' ?></title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="?page=home">Accueil</a></li>
                <li><a href="?page=rules">Règles</a></li>
                <li><a href="?page=enter_name">Jouer</a></li> <!-- Redirige vers enter_name -->
                <li><a href="?page=scores">Scores</a></li>
            </ul>
        </nav>
    </header>
    <main>
