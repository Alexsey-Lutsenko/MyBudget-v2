<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Income $income)
    {
        $data = $income->income;

        $isDelete = $income->delete();

        if ($isDelete) {
            return response(["messages" => "$data удален успешно"], 200);
        }

        return response(["messages" => "$data не удалось удалить"], 500);
    }
}
