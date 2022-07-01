<?php

namespace App\Http\Controllers\Income;

use App\Http\Requests\Income\StoreRequest;
use App\Http\Resources\Income\IncomeResource;
use App\Models\Income;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        $income = $this->service->store($data, $user);

        return new IncomeResource($income);
    }
}
