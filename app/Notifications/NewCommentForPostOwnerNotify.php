<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentForPostOwnerNotify extends Notification implements ShouldQueue,ShouldBroadcast
{
    use Queueable;

    protected $comment;
    /**
     * Create a new notification instance.
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $array =  ['database','broadcast'];

        if ($notifiable->receive_email == 1){
            $array[] = 'mail';
        }
        return $array;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('There is a new comment from '.$this->comment->name.' on your post '.
                    $this->comment->post->title.'.')
                    ->action('Go to post', route('post.show',$this->post->slug))
                    ->line('Thank you for using our website!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'name' => $this->comment->name,
            'email' => $this->comment->email,
            'url' => $this->comment->url,
            'comment' => $this->comment->comment,
            'post_id' => $this->comment->post_id,
            'post_title' => $this->comment->post->title,
            'post_slug' => $this->comment->post->slug,
            'created_at' => $this->comment->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast(object $notifiable): array
    {
        return new BroadcastMessage( [
            'data' => [
                'name' => $this->comment->name,
                'email' => $this->comment->email,
                'url' => $this->comment->url,
                'comment' => $this->comment->comment,
                'post_id' => $this->comment->post_id,
                'post_title' => $this->comment->post_title,
                'post_slug' => $this->comment->post_slug,
                'created_at' => $this->comment->created_at->format('d M, Y h:i a'),
            ]

        ]);
    }
}
