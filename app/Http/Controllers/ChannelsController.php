<?php

namespace App\Http\Controllers;

use App\Channel;
use Storage;

class ChannelsController extends Controller
{
    public function show($slug)
    {
        // if(! Storage::exists("articles/{$slug}")) {
        //     abort('404');
        // }
        abort_if(! Storage::exists("articles/{$slug}"), 404);

        $channel = new Channel($slug);

        return view('channels.show', [
            'channel' => $channel,
        ]);
    }
}
