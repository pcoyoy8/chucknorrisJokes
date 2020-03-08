<?php

namespace App\Http\Controllers;

use App\Joke;
use Illuminate\Http\Request;
use GuzzleHttp;

class jokeController extends Controller
{
    protected $url = 'https://api.chucknorris.io/jokes/random';
    protected $jokesNumber = 10;

    protected function getJoke()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            $this->url
        );
        $body = $response->getBody();
        return json_decode($body);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jokes = [];
        $favorites = Joke::all();

        $requiredJokes = $this->jokesNumber - $favorites->count();
        while (count($jokes) < $requiredJokes) {
            $joke = $this->getJoke();
            if(!array_key_exists($joke->id, $jokes)
            && !array_key_exists($joke->id, $favorites)) {
                array_push($jokes, [
                    'id' => $joke->id,
                    'value' => $joke->value,
                ]);
            }
        }

        return view('home')
            ->with('jokes', $jokes)
            ->with('favorites', $favorites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $items = ($request && $request->items) ? $request->items : [];

        if (count($items) > 0) {
            $keys = array_column($items, 'key');
            $otherJokes = Joke::whereNotIn('key', $keys)
                ->delete();
        }

        foreach ($items as $item) {
            $exist = Joke::where('key', '=', $item['key'])->get();
            if ($exist->count() == 0) {
               $new = new Joke();
               $new->key = $item['key'];
               $new->value = $item['value'];
               $new->save();
            }
        }

        return response()->json([
            'message' => 'Saved',
        ]);
    }
}
