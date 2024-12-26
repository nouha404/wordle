<?php $pageTitle = 'Jouer'; ?>
<?php include 'header.html.php'; ?>

<h1>Bienvenue, <?= htmlspecialchars($_SESSION['player_name'], ENT_QUOTES, 'UTF-8') ?> !</h1>
<p>Indice : <strong><?= htmlspecialchars($_SESSION['hint'] ?? 'Aucun indice disponible', ENT_QUOTES, 'UTF-8') ?></strong></p>
<p>Tentatives restantes : <?= $_SESSION['remaining_attempts'] ?></p>
<p>Points actuels : <?= $_SESSION['points'] ?></p>

<div class="word-box">
    <?php
    $targetWord = str_split($_SESSION['target_word']);
    $lastAttempt = end($_SESSION['attempts']) ?? '';

    foreach ($targetWord as $index => $letter):
        $class = ''; // Par défaut, aucune couleur
        if (isset($lastAttempt[$index])) {
            if ($lastAttempt[$index] === $letter) {
                $class = 'correct'; // Vert pour les bonnes lettres
            } elseif (strpos($_SESSION['target_word'], $lastAttempt[$index]) !== false) {
                $class = 'misplaced'; // Orange pour les lettres mal placées
            } else {
                $class = 'wrong'; // Rouge pour les mauvaises lettres
            }
        }
    ?>
        <div class="letter-box <?= $class ?>">
            <?= isset($lastAttempt[$index]) ? htmlspecialchars($lastAttempt[$index]) : '' ?>
        </div>
    <?php endforeach; ?>
</div>

<form method="POST">
    <input type="text" name="guess" maxlength="<?= strlen($_SESSION['target_word']) ?>" placeholder="Votre essai" required>
    <button type="submit">Valider</button>
</form>