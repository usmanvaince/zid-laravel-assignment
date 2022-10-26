<?php

namespace App\Http\Controllers\Item;
use App\Http\Controllers\Controller;
use App\Services\ItemStats\ItemStatsService;

class ItemStatsController extends Controller
{
    public function index(ItemStatsService $statsService)
    {
        return response()->json([
            'total_items' => $statsService->getTotalItemsCount(),
            'avg_item_price' => $statsService->getAveragePrice(),
            'website_with_highest_price' => $statsService->getWebsiteWithHighestTotalPrice(),
            'get_current_month_items_total_price' => $statsService->getCurrentMonthItemsTotalPrice()
        ]);
    }


}