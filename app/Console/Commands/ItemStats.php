<?php

namespace App\Console\Commands;

use App\Services\ItemStats\ItemStatsService;
use Illuminate\Console\Command;

class ItemStats extends Command
{
    protected $signature = 'stats:items {type?}';

    protected $description = 'This command would display different stats about items';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(ItemStatsService $statsService)
    {
        $argument = (string)$this->argument('type');

        match($argument) {
            'total-items' => $this->info('Total Items: '.$statsService->getTotalItemsCount()),
            'avg-item-price' => $this->info('Avg Item Price: '.$statsService->getAveragePrice()),
            'website-with-highest-total-price' => $this->info('Website With Highest Total Price: '.$statsService->getWebsiteWithHighestTotalPrice()),
            'current-month-items-total-price' => $this->info('Get Current Month Items Total Price: '.$statsService->getCurrentMonthItemsTotalPrice()),
            default => $this->printStatsInTableForm()
        };

    }

    private function printStatsInTableForm()
    {
        $statsService = new ItemStatsService();
        $this->table(
            ['Total Items', 'Avg Item Price', 'Website With Highest Total Price', 'Get Current Month Items Total Price'],
            [[
                $statsService->getTotalItemsCount(),
                $statsService->getAveragePrice(),
                $statsService->getWebsiteWithHighestTotalPrice(),
                $statsService->getCurrentMonthItemsTotalPrice()
            ]]
        );
    }
}
