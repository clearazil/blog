<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Digest extends Mailable
{
    use Queueable, SerializesModels;

    private $posts;

    /**
     * Create a new message instance.
     *
     * @param Post[] $posts
     * @return void
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->markdown('emails.posts.digest', [
            'posts' => $this->posts,
        ]);
    }
}
