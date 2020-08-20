<?php

namespace App\Repositories\Interfaces;

interface RateRepositoryInterface
{
    public function getAllRateProduct($product);

    public function getPercentEachStar($rates, $totalRate, $numberStarEach);

    public function getNumberRateEachStar($rates);

    public function getNumberRate($rates);

    public function getAverageStar($totalRate, $rates);
}
