<?php
class Song {
    private string $artist;
    private string $title;
    private string $duration;
    public function __construct(string $artist, string $title, string $duration) {
        $this->artist = $artist;
        $this->title = $title;
        $this->duration = $duration;
    }
    public function getArtist(): string {
        return $this->artist;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getDuration(): string {
        return $this->duration;
    }
    public function setArtist(string $artist): void {
        $this->artist = $artist;
    }
    public function setTitle(string $title): void {
        $this->title = $title;
    }
    public function setDuration(string $duration): void {
        $this->duration = $duration;
    }
}
class Playlist {
    private array $songs = [];
    private int $totalMedias = 0;
    public function addMedia(Song $song): void {
        $this->songs[] = $song;
        $this->totalMedias++;
    }
    public function __toString(): string {
        $totalDurationSeconds = array_reduce($this->songs, function ($carry, $song) {
            list($minutes, $seconds) = explode(':', $song->getDuration());
            return $carry + $minutes * 60 + $seconds;
        }, 0);
        $hours = floor($totalDurationSeconds / 3600);
        $minutes = floor(($totalDurationSeconds % 3600) / 60);
        $seconds = $totalDurationSeconds % 60;
        return "Songs added: {$this->totalMedias}\nPlaylist length: {$hours}h {$minutes}m {$seconds}s";
    }
}
class App {
    private array $content = [];
    public function getContent(): array {
        return $this->content;
    }
    public function setContent(array $content): void {
        $this->content = $content;
    }
    public function write(string $line): void {
        $this->content[] = $line;
    }
    private function readLine(bool $asArray = false) {
        ob_start();
        echo implode("", $this->getContent());
        $data = ob_get_contents();
        if ($asArray) {
            $data = explode("\n", ob_get_contents());
        }
        ob_clean();
        return $data;
    }
    public function start(): void {
        $playlist = new Playlist();
        $lines = $this->readLine(true);
        foreach ($lines as $line) {
            list($artist, $title, $duration) = explode(';', trim($line));
            $song = new Song($artist, $title, $duration);
            $playlist->addMedia($song);
        }
        echo $playlist;
    }
}
?>