<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    public const USER_ID = 'user_id';

    protected function getCallbacks(): array
    {
        return [
            self::USER_ID => [$this, 'user_id'],
        ];
    }

    public function user_id(Builder $builder, $value)
    {
        $builder->where('user_id', '=', $value);
    }
}
