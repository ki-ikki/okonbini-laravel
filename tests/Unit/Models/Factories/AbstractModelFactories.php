<?php

namespace Tests\Unit\Models\Factories;

use App\Models\Item;
use App\Models\Store;
use Carbon\Carbon;

class AbstractModelFactories
{
    /**
     * @param string $storeName
     * @param string $colorCode
     * @param bool $isActive
     */
    public static function createStoreFactory(
        $storeName = 'TestStore',
        $colorCode = '#000000',
        $isActive = true,
    ) {
        $now = Carbon::now();

        $store = new Store();
        $store->store_name = $storeName;
        $store->color_code = $colorCode;
        $store->is_active = $isActive;
        $store->updated_at = $now;
        $store->save();

        return $store;
    }

    /**
     * @param Store $store
     * @param ItemCategory $itemCategory
     * @param ItemImage $itemImage
     */
    public static function createItemFactory(
        $store,
        $itemCategory,
        $itemImage,
        $itemName = 'TestItem',
        $price = 1000.00,
        $releaseDate = '2021-01-01',
        $searchVector = ['TestItem', 'TestItem Description'],
        $isActive = true,
    ) {
        $now = Carbon::now();

        $store = self::storeFactory();

        $item = new Item();
        $item->store_id = $store->id;
        $item->item_category_id = $itemCategory->id;
        $item->item_image_id = $itemImage->id;
        $item->item_name = $itemName;
        $item->price = $price;
        $item->release_date = $releaseDate;
        $item->search_vector = $searchVector;
        $item->is_active = $isActive;
        $item->created_at = $now;
        $item->updated_at = $now;
        $item->save();

        return $item;
    }
}
