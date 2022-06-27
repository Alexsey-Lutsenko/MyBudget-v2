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

        $maxCategoriesPriority = Category::where('user_id', $data['user_id'])->max('priority');

        $category = $this->service->store($data, $maxCategoriesPriority);

        return new CategoryResource($category);
    }
}
