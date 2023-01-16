<?php
class Activity {
    private int $id;
    private int $userId;
    private string $date;
    private string $description;
    private string $start;
    private string $duration;
    private int $cardMin;
    private int $cardAvg;
    private int $cardMax;

    public function  __construct() {
    }

    public function init(int $i, int $u, string $d, string $dc, string $s, string $dr, int $min, int $avg, int $max) {
        $this->id = $i;
        $this->userId = $u;
        $this->date = $d;
        $this->description = $dc;
        $this->start = $s;
        $this->duration = $dr;
        $this->cardMin = $min;
        $this->cardAvg = $avg;
        $this->cardMax = $max;
    }

    public function getId(): int {
        return ($this->id);
    }

    public function getUserId(): int {
        return ($this->userId);
    }

    public function getDate(): string {
        return ($this->date);
    }

    public function getDescription(): string {
        return ($this->description);
    }

    public function getStart(): string {
        return ($this->start);
    }

    public function getDuration(): string {
        return ($this->duration);
    }

    public function getCardMin(): float {
        return ($this->cardMin);
    }

    public function getCardAvg(): float {
        return ($this->cardAvg);
    }

    public function getCardMax(): float {
        return ($this->cardMax);
    }

    public function  __toString(): string {
        return ($this->userId."\n".$this->date."\n".$this->description."\n".$this->start."\n".$this->duration."\n".$this->carMin."\n".$this->cardAvg."\n".$this->cardMax."\n");
    }
}
?>