<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\RateRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $rateRepository;
    private $commentRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        RateRepositoryInterface $rateRepository,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->rateRepository = $rateRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getProducts();
        $categories = $this->categoryRepository->getRootCategory();

        return view('products.products', compact(['products', 'categories']));
    }


    public function viewed()
    {
        $viewedProducts = $this->productRepository->getManyProducts([1, 2, 3, 4, 7, 9]); //dữ liệu test
        return view('products.productsViewed', compact('viewedProducts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);
        $rates = $this->rateRepository->getAllRateProduct($product);
        $numberRateOfStar = $this->rateRepository->getNumberRateEachStar($rates);
        $numberRate = $this->rateRepository->getNumberRate($rates);
        if ($numberRate == 0) {
            $percentEachRate = [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
            ];
            $averageStar = 0;
        } else {
            $percentEachRate = $this->rateRepository->getPercentEachStar($rates, $numberRate, $numberRateOfStar);
            $averageStar = $this->rateRepository->getAverageStar($numberRate, $rates);
        }
        $comments = $this->commentRepository->getAllCommentProduct($product);

        return view('products.show')
            ->with('product', $product)
            ->with('comments', $comments)
            ->with('product', $product)
            ->with('number_rate', $numberRate)
            ->with('percent_each_rate', $percentEachRate)
            ->with('averageStar', $averageStar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reviewProduct(CreateReviewRequest $request, $id)
    {
        $result = false;
        try {
            $comment = $this->commentRepository->create([
                'user_id' => Auth::id(),
                'content' => $request->get('content'),
                'product_id' => $id,
            ]);

            if ($request->has('rating')) {
                $this->rateRepository->create([
                    'user_id' => Auth::id(),
                    'rating' => $request->get('rating'),
                    'product_id' => $id,
                ]);
            }
            $result = true;
        } catch (Exception $exception) {
            $result = false;
        }
        if ($result) {
            return response()->json($comment);
        }
        return response()->json(['message' => trans('admin.notify.review.error')]);
    }

    public function getComments(Request $request, $id)
    {
        $product = $this->productRepository->find($id);
        $comments = $this->commentRepository->getAllCommentProduct($product);
        if ($request->ajax()) {
            return view('reviews.comment')->with('comments', $comments)->render();
        }
    }
}
