<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\RequestProduct;
use App\Repositories\Interfaces\RequestProductRepositoryInterface;
use Illuminate\Support\Facades\Config;
use Mockery\Exception;

class RequestProductRepository extends BaseRepository implements RequestProductRepositoryInterface
{
    public function getModel()
    {
        return RequestProduct::class;
    }

    public function getAllRequests()
    {
        return $this->model->with('user')->orderBy('created_at', 'desc')->get();
    }

    public function requestProductFromUser($userId, $data)
    {
        $result = false;
        try {
            if ($data['image']) {
                $path = public_path(Config::get('setting.path_image_url'));
                $file = $data['image'];
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
            $requestProduct = $this->model->create($data);
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }

    public function createProductFromRequest($data)
    {
        $result = false;
        try {
            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'information' => $data['information'],
                'price' => $data['price'],
                'image' => $data['image'],
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

    public function storeRequestProduct($user_id, $data)
    {
        $result = false;
        try {
            if ($data['image']) {
                $path = public_path(Config::get('setting.path_image_url'));
                $file = $data['image'];
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }

            $requestProduct = $this->model->create([
                'product_name' => $data['name'],
                'user_id' => $user_id,
                'description' => $data['description'],
                'image' => $fileName,
                'status' => config('enums.status.pending'),
            ]);
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }

}
