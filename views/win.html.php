<?php $pageTitle = 'Victoire !'; ?>
<?php include 'header.html.php'; ?>

<h1>Félicitations, <?= htmlspecialchars($_SESSION['player_name'], ENT_QUOTES, 'UTF-8') ?> !</h1>
<p>Vous avez deviné le mot : <strong><?= htmlspecialchars($_SESSION['target_word'], ENT_QUOTES, 'UTF-8') ?></strong></p>

<a href="?page=game">Continuer</a>
<a href="?page=scores">Voir les scores</a>

