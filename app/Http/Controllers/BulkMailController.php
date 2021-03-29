<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendBulkQueueEmail;
use Illuminate\Support\Facades\Redirect;

class BulkMailController extends Controller
{
    public function sendMail(Request $request, User $users) {
        $data = [
    		'subject' => 'Monthly Notification'
    	];
        

    	// send all mail in the queue.
        $job = (new SendBulkQueueEmail($data))
            ->delay(now()->addSeconds(2)); 

        dispatch($job);

        echo('Bulk emails have sent to in the background...');
    }
}
