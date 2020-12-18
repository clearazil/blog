<?php

namespace App\Mail;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeeklyDigest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $posts = Post::where('created_at', '>', Carbon::now()->subDays(7))->get();

        return $this->markdown('emails.posts.digest', [
            'posts' => $posts,
        ]);
    }
}
