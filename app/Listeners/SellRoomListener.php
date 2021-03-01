<?php

namespace App\Listeners;

use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SellRoomListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (!$event->sellRoom->location)
        {
            $client = new \GuzzleHttp\Client();
            $res = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
                'query' => [
                    'key' => 'AIzaSyDfHZ-HzPD0c1Rxq9fZCSZuvzXcZ_oFGvA',
                    'address' => $event->sellRoom->town .','. $event->sellRoom->address,
                ]
            ]);
            $res = json_decode($res->getBody()->getContents(), true);
            $event->sellRoom->location = implode(',', $res['results'][0]['geometry']['location']);
            $event->sellRoom->save();
        }
    }
}
