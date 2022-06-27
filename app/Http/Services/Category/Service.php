<?php

namespace App\Http\Services\Category;

use App\Models\Category;

class Service
{
    public function store($data, $maxCategoriesPriority)
    {
        return Category::create([
            'category' => $data['category'],
            'priority' => $maxCategoriesPriority + 1,
            'user_id' => $data['user_id']
        ]);
    }

    public function update($category, $data)
    {
        $categoriesIdArray = Category::where('user_id', $data['user_id'])->oldest('priority')->get();
        $categoryIdx = array_search($category->id, $categoriesIdArray->pluck('id')->toArray());

        if($data['motion'] === 'up') {
            $besideCategory = $categoriesIdArray[$categoryIdx - 1];
        } else if($data['motion'] === 'down') {
            $besideCategory = $categoriesIdArray[$categoryIdx + 1];
        }

        $besideCategoryPriority = $besideCategory->priority;

        $besideCategory->update([
            'priority'=> $category->priority
        ]);

        $category->update([
            'priority' => $besideCategoryPriority
        ]);

        return $category;
    }
}
