<?php
class User {
    private int $id;
    private string $name;
    private string $lastName;
    private string $birthDay;
    private string $sex;
    private float $height;
    private float $weight;
    private string $email;
    private string $passWord;

    public function  __construct() {
    }

    public function init(int $i, string $n, string $l, string $b, string $s='O', float $h=0.0, float $w=0.0, string $e="", string $p="") {
        $this->id = $i;
        $this->name = $n;
        $this->lastName = $l;
        $this->birthDay = $b;
        $this->sex = $s;
        $this->height = $h;
        $this->weight = $w;
        $this->email = $e;
        $this->passWord = $p;
    }

    public function getId(): int {
        return ($this->id);
    }

    public function getName(): string {
        return ($this->name);
    }

    public function getLastName(): string {
        return ($this->lastName);
    }

    public function getBirthDay(): string {
        return ($this->birthDay);
    }

    public function getSex(): string {
        return ($this->sex);
    }

    public function getHeight(): float {
        return ($this->height);
    }

    public function getWeight(): float {
        return ($this->weight);
    }

    public function getEmail(): string {
        return ($this->email);
    }

    public function getPassWord(): string {
        return ($this->passWord);
    }

    public function  __toString(): string {
        return ($this->id."\n".$this->name."\n".$this->lastName."\n".$this->birthDay."\n".$this->sex."\n".$this->height."\n".$this->weight."\n".$this->email."\n".$this->passWord."\n");
    }
}
?>