<?php $pageTitle = 'Règles du jeu'; ?>
<?php include 'header.html.php'; ?>

<h1>Règles du Jeu</h1>
<p>Bienvenue dans notre jeu Wordle avec des mots sur les planètes. Voici comment jouer :</p>
<ul>
    <li>Vous devez deviner un mot en rapport avec une planète.</li>
    <li>Vous avez <?= $_SESSION['max_attempts'] ?? 3?> tentatives pour le deviner.</li>
    <li>Après chaque essai, vous recevrez des indices :</li>
    <ul>
        <li><span class="correct">Correct</span> : La lettre est au bon endroit.</li>
        <li><span class="misplaced">Mal placé</span> : La lettre est dans le mot, mais pas à la bonne position.</li>
        <li><span class="wrong">Incorrect</span> : La lettre n'est pas dans le mot.</li>
    </ul>
    <li>Bonne chance !</li>
</ul>

</body>
</html>
