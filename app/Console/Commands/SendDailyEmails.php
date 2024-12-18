<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Subscriber;
use App\Mail\DailyPostEmail;
use Illuminate\Support\Facades\Mail;

class SendDailyEmails extends Command
{
    protected $signature = 'send:daily-emails';
    protected $description = 'Send daily email to subscribers with today\'s posts';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $posts = Post::whereDate('created_at', today())->where('sent_to_emails', 0)->get();

        if ($posts->isEmpty()) {
            $this->info('No posts to send today.');
            return;
        }

        $subscribers = Subscriber::where('status', 1)->select('email')->chunk(100, function ($chunk) use ($posts) {
            foreach ($chunk as $subscriber) {
                Mail::to($subscriber->email)
                    ->queue(new DailyPostEmail($posts));
            }
        });

        Post::whereIn('id', $posts->pluck('id'))->update(['sent_to_emails' => 1]);

        $this->info('Daily emails sent successfully!');
    }
}
