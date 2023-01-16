<?php
require_once("static/php/CalculDistanceImpl.php");


class CalcDist implements CalculDistance {
    const R = 6378.137;

    public function toRad(float $angle): float {
        return (pi() * $angle / 180);
    }

    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float {
        return ((self::R * acos( sin(self::toRad($lat2)) * sin(self::toRad($lat1)) + cos(self::toRad($lat2)) * cos(self::toRad($lat1)) * cos(self::toRad($long2-$long1)))) * 1000);
    }

    public function calculDistanceTrajet(Array $parcours):float {
        $dist = 0;

        for ($i = 0; $i < count($parcours) - 2; $i += 2) {
            $dist += self::calculDistance2PointsGPS($parcours[$i], $parcours[$i + 1], $parcours[$i + 2], $parcours[$i + 3]);
        }
        return ($dist);
    }
}
$array = [ 47.644795, -2.776605, 47.646870, -2.778911, 47.646197, -2.780220, 47.646992, -2.781068, 47.647867, -2.781744, 47.648510, -2.780145 ];
$test  = new CalcDist;

printf("%f\n", $test->calculDistanceTrajet($array));
?>