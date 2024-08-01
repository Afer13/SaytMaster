<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioService
{
    public static function getPortfoliosIndex()
    {
        return Portfolio::latest()->limit(6)->get();
    }
    public static function getPortfolios()
    {
        return Portfolio::latest()->paginate();
    }
    public static function getPortfolio($id)
    {
        return Portfolio::find($id);
    }
    public static function storePortfolio(Request $request): void
    {
        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        if ($request->hasFile('image')) {
            $portfolio->image_url = $request->file('image')->store('portfolios', 'public');
        }
        $portfolio->save();
    }

    public static function updatePortfolio(Request $request, $id): void
    {
        $portfolio = PortfolioService::getPortfolio($id);
        if ($portfolio) {
            $portfolio->title = $request->title;
            if ($request->hasFile('image')) {
                $portfolio->image_url = $request->file('image')->store('portfolios', 'public');
            }
            $portfolio->save();
        }
    }

    public static function destroyPortfolio($id): void
    {
        $portfolio = PortfolioService::getPortfolio($id);
        if ($portfolio) {
            $portfolio->delete();
        }
    }

    public static function activeStatusChange($id): void
    {
        $portfolio = PortfolioService::getPortfolio($id);
        if ($portfolio) {
            $portfolio->is_active = !$portfolio->is_active;
            $portfolio->save();
        }
    }
}
