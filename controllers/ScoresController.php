<?php
class ScoresController {
    public function showScores() {
        require_once '../views/scores.html.php';
    }

    public function generateScoreImage() {
        $scoreFile = '../data/scores.json';
        $scores = json_decode(file_get_contents($scoreFile), true) ?? [];
    
        $width = 600;
        $height = 400;
        $image = imagecreate($width, $height);
    
        // Création des couleurs
        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);
        $blue = imagecolorallocate($image, 0, 102, 204);
        $yellow = imagecolorallocate($image, 255, 223, 0);
        $gray = imagecolorallocate($image, 169, 169, 169);
    
        // Dégradé de fond
        for ($i = 0; $i < $height; $i++) {
            $color = imagecolorallocate($image, 0, 0, (255 - ($i / $height) * 255));
            imageline($image, 0, $i, $width, $i, $color);
        }
    
        // Titre centré
        $font = 5;
        $title = "Tableau des Scores";
        imagestring($image, $font, ($width - strlen($title) * imagefontwidth($font)) / 2, 10, $title, $yellow);
    
        // Liste des scores
        $y = 50;
        foreach ($scores as $score) {
            $line = "{$score['player']} : {$score['score']}";
            imagestring($image, $font, 50, $y, $line, $black);
            $y += 30; 
        }
        
        imagerectangle($image, 0, 0, $width - 1, $height - 1, $gray);
    
        // Envoi de l'image
        header('Content-Type: image/png');
        imagepng($image);
        imagedestroy($image);
    }
    
}
