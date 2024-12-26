<?php
class GameModel {
    private $wordList;

    public function __construct($filePath = '../data/words.json') {
        if (!file_exists($filePath)) {
            die("Error: Words file not found at $filePath");
        }

        $content = file_get_contents($filePath);
        $this->wordList = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE || !is_array($this->wordList['words'])) {
            die("Error: Invalid JSON format in words file");
        }
    }

    public function getRandomWord() {
        return $this->wordList['words'][array_rand($this->wordList['words'])];
    }

    public function getWordList() {
        return $this->wordList['words'];
    }
}
