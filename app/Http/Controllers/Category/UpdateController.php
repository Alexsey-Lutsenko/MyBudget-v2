<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $user = auth()->user();

        $categoryUpdated = $this->service->update($category, $data, $user);

        return new CategoryResource($categoryUpdated);
    }
}
