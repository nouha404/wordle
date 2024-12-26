<?php $pageTitle = 'Entrez votre nom'; ?>
<?php include 'header.html.php'; ?>

<h1>Entrez votre nom pour commencer</h1>
<form method="POST" action="?page=enter_name">
    <input type="text" name="player_name" placeholder="Votre nom" required>
    <button type="submit">Commencer</button>
</form>