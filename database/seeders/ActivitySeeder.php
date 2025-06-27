<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name' => 'Еда',
                'children' => [
                    ['name' => 'Мясная продукция', 'nesting' => 1],
                    ['name' => 'Молочная продукция', 'nesting' => 1]
                ]
            ],
            [
                'name' => 'Автомобили',
                'children' => [
                    ['name' => 'Грузовые']
                ]
            ],
            [
                'name' => 'Легковые',
                'children' => [
                    ['name' => 'Запчасти'],
                    ['name' => 'Аксессуары']
                ]
            ],
        ];

        foreach ($arr as $item) {
            $activity = Activity::create(['name' => $item['name']]);
            if (isset($item['children'])) {
                $activity->children()->createMany($item['children']);
            }
        }
    }
}
