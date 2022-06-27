<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Requests\Category\FilterRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);

        $categories = Category::filter($filter)->oldest('priority')->get();

        return CategoryResource::collection($categories);
    }
}
