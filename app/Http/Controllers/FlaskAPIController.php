<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FlaskAPIController extends Controller
{
    public function __construct()
    {
        // Require users to be authenticated for all actions in this controller
        $this->middleware('auth');
    }
    public function entrainementPage()
{
    $user_id = Auth::id();
    Log::info("Fetching recommendations for user ID: {$user_id}");

    $client = new Client([
        'base_uri' => 'http://localhost:5001/api/',
        'timeout'  => 2.0,
    ]);

    try {
        $recResponse = $client->request('GET', "recommendations/{$user_id}");
        $recommendations = json_decode($recResponse->getBody()->getContents(), true);

        // Check if recommendations were fetched successfully
        if (isset($recommendations['success']) && $recommendations['success']) {
            // Pass recommendations to the view
            return view('entrainement', compact('recommendations'));
        } else {
            // Handle error response from API
            return view('entrainement')->with('error', 'Failed to fetch recommendations.');
        }
    } catch (\Exception $e) {
        Log::error("Error fetching data for user ID {$user_id}: " . $e->getMessage());
        // Fallback if recommendations cannot be fetched
        return view('entrainement')->with('error', 'Please try filling the recommendation forum');
    }
}

}
