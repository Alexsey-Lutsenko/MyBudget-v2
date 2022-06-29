<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        $maxCategoriesPriority = Category::where('user_id', $user->id)->max('priority');

        $category = $this->service->store($data, $maxCategoriesPriority, $user);

        return new CategoryResource($category);
    }
}
