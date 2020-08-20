<?php

namespace App\Repositories\Eloquent;

use App\Models\Rate;
use App\Repositories\Interfaces\RateRepositoryInterface;

class RateRepository extends BaseRepository implements RateRepositoryInterface
{

    public function getModel()
    {
        return Rate::class;
    }

    public function getPercentEachStar($rates, $totalRate, $numberStarEach)
    {
        $percentRate = [];
        foreach ($numberStarEach as $key => $value) {
            $percentRate[$key] = round((($value / $totalRate) * 100), 1);
        }
        return $percentRate;
    }

    public function getNumberRate($rates)
    {
        return $rates->count();
    }

    public function getAverageStar($totalRate, $rates)
    {
        $averageStar = $rates->avg('rating');
        return round($averageStar, 1);
    }

    public function getAllRateProduct($product)
    {
        return $product->rates;
    }

    public function getNumberRateEachStar($rates)
    {
        $numberStar = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ];
        foreach ($rates as $rate) {
            if (key_exists($rate['rating'], $numberStar)) {
                $numberStar[$rate['rating']] += 1;
            }
        }
        return $numberStar;
    }
}
