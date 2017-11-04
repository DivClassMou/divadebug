<?php

namespace App\Http\Controllers\Mailchimp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailchimpWebhook;

class WebhookController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->post();
        $mailchimp = new MailchimpWebhook();
        $mailchimp->reason = $data;
        $mailchimp->save();
    }
}