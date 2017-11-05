<?php

namespace App\Http\Controllers\Mailchimp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailchimpWebhook;

class WebhookController extends Controller
{
    const MAILCHIMP_TYPE_SUBSCRIPTION = 'subscribe';
    const MAILCHIMP_TYPE_UNSUBSCRIPTION = 'unsubscribe';

    public function index(Request $request)
    {
        $data = $request->all();
        $mailchimp = new MailchimpWebhook;

        $mailchimp->type = $data['type'];
        $mailchimp->fired_at = $data['fired_at'];
        $mailchimp->mailchimp_id = $data['data']['id'];
        $mailchimp->email = $data['data']['email'];
        $mailchimp->email_type = $data['data']['email_type'];
        $mailchimp->ip_opt = $data['data']['ip_opt'];
        $mailchimp->web_id = $data['data']['web_id'];
        $mailchimp->list_id = $data['data']['list_id'];
        $mailchimp->merges_email = $data['data']['merges']['EMAIL'];
        $mailchimp->merges_interests = $data['data']['merges']['INTEREST'];
        $mailchimp->merges_purpose = $data['data']['merges']['PURPOSE'];
        $mailchimp->merges_url = $data['data']['merges']['URL'];

        $mailchimpType = $data['type'];

        if ($mailchimpType == self::MAILCHIMP_TYPE_SUBSCRIPTION) {
            $mailchimp->ip_signup = $data->data->ip_signup;
        } else if ($mailchimpType == self::MAILCHIMP_TYPE_UNSUBSCRIPTION) {
            $mailchimp->reason = $data->data->reason;
        }

        $mailchimp->save();

        return 'success';
    }
}