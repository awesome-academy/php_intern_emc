<?php

namespace App\Repositories\Eloquent;

use App\Imports\ImportProducts;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Exception;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }

    public function getProducts()
    {
        $products = $this->model->with('category')->paginate('setting.product.paginate');
        return $products;
    }

    public function addProduct(array $data)
    {
        $result = false;
        try {
            if ($data['image']) {
                $path = public_path(Config::get('setting.path_image_url'));
                $file = $data['image'];
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }

            $product = $this->model->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'information' => $data['information'],
                'price' => $data['price'],
                'image' => $fileName,
                'category_id' => $data['category_id'],
                'stock_amount' => $data['stock_amount'],
                'discount' => $data['discount'],
            ]);
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }

    public function updateProduct($id, $data)
    {
        $result = false;
        try {
            if (!isset($data['image'])) {
                $data['image'] = '';
                $fileName = '';
            }
            if ($data['image']) {
                $path = public_path(Config::get('setting.path_image_url'));
                $file = $data['image'];
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }

            $product = $this->model->find($id);
            $product = $product->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'information' => $data['information'],
                'price' => $data['price'],
                'image' => $fileName,
                'category_id' => $data['category_id'],
                'stock_amount' => $data['stock_amount'],
                'discount' => $data['discount'],
            ]);
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }
}
