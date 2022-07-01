<?php

namespace App\Http\Services\Income;

use App\Models\Income;

class Service
{
    public function store($data, $user)
    {
        return Income::create([
            'income' => $data['income'],
            'user_id' => $user->id
        ]);
    }

    public function update()
    {

    }
}
