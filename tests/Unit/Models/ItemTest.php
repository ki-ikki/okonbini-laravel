<?php

namespace Tests\Unit\Models;

use Tests\Unit\Models\Factories\AbstractModelFactories;
use App\Models\Item;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function testGetItemFromId()
    {
        $now = Carbon::now();

        $store = AbstractModelFactories::createStoreFactory();

        $item = new Item();
        $item->store_id = 1;
        $item->item_category_id = $store->id;
        $item->item_image_id = 1;
        $item->item_name = 'TestItem';
        $item->item_info = 'TestItem Description';
        $item->price = 1000.00;
        $item->release_date = '2021-01-01';
        $item->search_vector = ['Item 1', 'Item 1 Description'];
        $item->is_active = true;
        $item->created_at = $now;
        $item->updated_at = $now;
        $item->save();

        /** @var Store $test */
        $test = $item->store()->first();

        print($test->store_name);

        $this->assertSame($store->store_name, $test->store_name);
    }
}
