<?php $pageTitle = 'Fin de Partie'; ?>
<?php include 'header.html.php'; ?>

<h1>Fin de la Partie</h1>
<p>Vous avez épuisé toutes vos tentatives !</p>
<p>Votre score final a été réinitialisé à : <strong><?= $_SESSION['points'] ?></strong></p>

<a href="?page=game">Rejouer</a>
<a href="?page=scores">Voir les scores</a>

