<?php
class GameController {
    private $gameModel;
    private $scoreModel;

    public function __construct() {
        $this->gameModel = new GameModel(); 
        $this->scoreModel = new ScoreModel();
    }

    public function startGame() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['player_name'])) {
            header('Location: ?page=enter_name');
            exit;
        }

        if (!isset($_SESSION['target_word']) || isset($_SESSION['new_word'])) {
            $randomWord = $this->gameModel->getRandomWord();
            $_SESSION['target_word'] = $randomWord['word'];
            $_SESSION['hint'] = $randomWord['hint'];
            $_SESSION['attempts'] = [];
            $_SESSION['remaining_attempts'] = 3;
            $_SESSION['points'] = $_SESSION['points'] ?? 0;
            unset($_SESSION['new_word']);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $guess = htmlspecialchars($_POST['guess'], ENT_QUOTES, 'UTF-8');
            if ($guess) {
                $_SESSION['attempts'][] = $guess;

                // Vérifie si l'utilisateur a gagné
                if (strtolower($guess) === strtolower($_SESSION['target_word'])) {
                    $_SESSION['points'] += 10;
                    $this->scoreModel->saveScore($_SESSION['player_name'], $_SESSION['points']); 
                    $_SESSION['new_word'] = true;
                    header('Location: ?page=win');
                    exit;
                } else {
                    $_SESSION['remaining_attempts']--;
                    if ($_SESSION['remaining_attempts'] <= 0) {
                        $this->scoreModel->saveScore($_SESSION['player_name'], $_SESSION['points']); // Sauvegarde après une défaite
                        $_SESSION['points'] = 0; // Réinitialise les points
                        header('Location: ?page=lose');
                        exit;
                    }
                }
            }
        }

        require_once '../views/game.html.php';
    }

    public function winGame() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        require_once '../views/win.html.php';
    }

    public function loseGame() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        require_once '../views/lose.html.php';
    }
}
