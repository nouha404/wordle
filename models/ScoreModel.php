<?php
class ScoreModel {
    private $scoreFile;

    public function __construct($scoreFile = '../data/scores.json') {
        $this->scoreFile = $scoreFile;
    }

    public function getScores() {
        if (!file_exists($this->scoreFile)) {
            return [];
        }
        return json_decode(file_get_contents($this->scoreFile), true) ?? [];
    }

    public function saveScore($playerName, $score) {
        $scores = $this->getScores();
        $scores[] = [
            'player' => $playerName,
            'score' => $score
        ];
        file_put_contents($this->scoreFile, json_encode($scores, JSON_PRETTY_PRINT));
    }

    // Mise à jour du score, mais uniquement si c'est le score du joueur fonction futur
    public function updateScore($playerName, $newScore) {
        $scores = $this->getScores();
        foreach ($scores as &$score) {
            if ($score['player'] === $playerName) {
                $score['score'] = $newScore; // Mise à jour du score
                file_put_contents($this->scoreFile, json_encode($scores, JSON_PRETTY_PRINT));
                return true; 
            }
        }
        return false; // Le joueur n'a pas été trouvé
    }
}

