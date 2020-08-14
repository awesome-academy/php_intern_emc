<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'description' => $row[1],
            'information' => $row[2],
            'image' => $row[3],
            'stock_amount' => $row[4],
            'price' => $row[5],
            'discount' => $row[6],
            'category_id' => $row[7],
        ]);
    }
}
