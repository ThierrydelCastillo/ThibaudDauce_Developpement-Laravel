<?php

namespace App\Http\Controllers;

use App\Channel;

class ChannelsController extends Controller
{
    public function show($slug)
    {
        $channel = new Channel($slug);

        return view('channels.show', [
            'channel' => $channel,
        ]);
    }
}
