<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkMailController extends Controller
{
    public function sendMail(Request $request) {
        $data = [
    		'subject' => 'Monthly Notification'
    	];

    	// send all mail in the queue.
        $job = (new \App\Jobs\SendBulkQueueEmail($data))
            ->delay(now()->addSeconds(2)); 

        dispatch($job);


        return view('site.index');
    }
}
