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

    public function getProductsOrderbyHome($field, $sort)
    {
        $products = $this->model->with('category')->orderBy($field, $sort)->paginate(Config::get('setting.product.paginationHome'));
        return $products;
    }

    public function getProductsOrderby($field, $sort)
    {
        $products = $this->model->with('category')->orderBy($field, $sort)->paginate(Config::get('setting.product.pagination'));
        return $products;
    }

    public function getManyProducts(array $data)
    {
        $products = $this->model->findMany($data);

        return $products;
    }

    public function getProducts()
    {
        $products = $this->model->with('category')->paginate(Config::get('setting.product.pagination'));
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

    public function importProducts($data)
    {
        $extension = $data->getClientOriginalExtension();
        if ($extension == 'csv'){

            Excel::import(new ImportProducts(), $data);
            return true;
        } else {
            return false;
        }
    }

    public function filterProduct($request)
    {
        $products = $this->model->query()
            ->name($request)
            ->category($request)
            ->price($request)
            ->sortPrice($request)
            ->discount($request)
            ->paginate('setting.product.pagination_shop');
        return $products;
    }

    public function showProductShop()
    {
        $products = $this->model->paginate(Config::get('setting.product.pagination_shop'));
        return $products;
    }
}
