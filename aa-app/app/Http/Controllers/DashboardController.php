<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $quote = $this->getDailyQuote();
        
        // Here you can return the view for your dashboard and pass the quote data.
        return view('dashboard', ['quote' => $quote]);
    }

    private function getDailyQuote() {
        // Try to get the quote from cache first
        return Cache::remember('daily_quote', 60, function () {
            try {
                $response = Http::get('https://api.quotable.io/random');
                $quote = $response->json();

                if ($response->successful() && isset($quote['content']) && isset($quote['author'])) {
                    return $quote;
                } 
            } catch (\Exception $e) {
                // If you want to log the exception for debugging
                // Log::error($e->getMessage());
            }

            // Fallback if there's an exception or if the API doesn't return the expected data
            return [
                'content' => 'Sometimes, you need to motivate yourself, no quotes needed',
                'author' => 'Shepherd Yaw Morttey'
            ];
        });
    }
}
