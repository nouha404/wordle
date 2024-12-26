<?php
class PlayerController {
    public function enterName() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Si le joueur a déjà un nom, redirige vers le jeu
        if (isset($_SESSION['player_name']) && !empty($_SESSION['player_name'])) {
            header('Location: ?page=game');
            exit;
        }

        // Enregistrer le nom si soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['player_name'])) {
            $_SESSION['player_name'] = htmlspecialchars($_POST['player_name'], ENT_QUOTES, 'UTF-8');
            header('Location: ?page=game');
            exit;
        }

        require_once '../views/enter_name.html.php';
    }
}
