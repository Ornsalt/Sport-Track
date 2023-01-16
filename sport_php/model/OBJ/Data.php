<?php
class Data {
    private int $id;
    private int $actId;
    private string $time;
    private int $cardio;
    private float $coordX;
    private float $coordY;
    private float $coordZ;

    public function __construct() {
    }

    public function init(int $i, int $a, $t, int $c, int $x, int $y, int $z) {
        $this->id = $i;
        $this->actId = $a;
        $this->time = $t;
        $this->cardio = $c;
        $this->coordX = $x;
        $this->coordY = $y;
        $this->coordZ = $z;
    }

    public function getId(): int {
        return ($this->id);
    }

    public function getActId(): int {
        return ($this->actId);
    }

    public function getTime(): string {
        return ($this->time);
    }

    public function getCardio(): int {
        return ($this->cardio);
    }

    public function getCoordX(): float {
        return ($this->coordX);
    }

    public function getCoordY(): float {
        return ($this->coordY);
    }

    public function getCoordZ(): float {
        return ($this->coordZ);
    }

    public function  __toString(): string {
        return ($this->id."\n".$this->actId."\n".$this->time."\n".$this->cardio."\n".$this->coordX."\n".$this->coordY."\n".$this->coordZ."\n");
    }
}
?>