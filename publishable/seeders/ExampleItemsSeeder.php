<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleItemsSeeder extends Seeder
{
    public function run()
    {
        $items = $this->getItems();

        foreach ($items as $id => $data) {
            DB::table('example_items')->updateOrInsert(['id' => $id], $data);
        }
    }

    protected function getItems()
    {
        return [
            1 => [
                'name' => 'Item 1',
                'description' => 'Item 1 description',
            ], [
                'name' => 'Item 2',
                'description' => 'Item 2 description',
            ], [
                'name' => 'Item 3',
                'description' => 'Item 3 description',
            ],
        ];
    }
}
