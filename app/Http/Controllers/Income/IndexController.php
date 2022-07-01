<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Http\Resources\Income\IncomeResource;
use App\Models\Income;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        $incomes = Income::where('user_id', $user->getAuthIdentifier())->latest('id')->limit(3)->get();

        return IncomeResource::collection($incomes);
    }
}
