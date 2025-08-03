<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Jumlah semua produk yang tersedia')
                ->color('success')
                ->icon('heroicon-o-cube'),
            Stat::make('Total Stok', Stock::sum('quantity'))
                ->description('Jumlah total stok dari semua produk')
                ->color('info')
                ->icon('heroicon-o-rectangle-stack'),
                Stat::make('Total Produk', Category::count())
                ->description('Jumlah Category')
                ->color('success')
                ->icon('heroicon-o-cube'),

        ];
    }
}
