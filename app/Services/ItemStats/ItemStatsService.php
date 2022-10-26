<?php
namespace App\Services\ItemStats;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemStatsService
{
    public function getTotalItemsCount()
    {
        return (string)Item::count();
    }

    public function getAveragePrice()
    {
        $averageItemPrice = Item::avg('price');
        return number_format($averageItemPrice, 2, '.', '');
    }

    public function getWebsiteWithHighestTotalPrice()
    {
        return DB::table('items')
                 ->groupBy('url')
                 ->orderByRaw('sum(price) DESC')
                 ->value('url');
    }
    public function getCurrentMonthItemsTotalPrice()
    {
        $currentMonthTotalPrice = Item::whereMonth('created_at', Carbon::now()->month)->sum('price');
        return number_format($currentMonthTotalPrice, 2, '.', '');
    }
}