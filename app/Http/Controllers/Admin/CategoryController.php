<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Requests\AdminCategory;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware(['auth.admin', 'auth']);
        $categories = $this->categoryRepository->getAll();

        return view('admin.categories.index', compact('categories'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategory $request)
    {
        if ($this->categoryRepository->create($request->only('name', 'parent_id'))) {
            return redirect()->route('categories.index')->with([
                'message' => trans('admin.notify.category.create.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('categories.index')->with([
                'message' => trans('admin.notify.category.create.fail'),
                'color' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategory $request, $id)
    {
        $update = $this->categoryRepository->updateCategory($id, $request->all());

        if ($update === 'Update successfully') {
            return redirect()->route('categories.index')->with([
                'message' => trans('admin.notify.category.update.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('categories.index')->with([
                'message' => trans('admin.notify.category.update.fail'),
                'color' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->categoryRepository->delete($id)) {
            return response()->json([
                'message' => trans('admin.notify.category.delete.success'),
                'color' => 'success',
            ]);
        }
    }
}
