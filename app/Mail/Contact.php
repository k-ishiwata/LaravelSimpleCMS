<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
//use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $content;
    protected $viewStr;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $viewStr = 'to')
    {
        $this->content = $content;
        $this->viewStr = $viewStr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.'.$this->viewStr)
            ->to($this->content['to'], $this->content['to_name'])
            ->from($this->content['from'], $this->content['from_name'])
            ->subject($this->content['subject'])
            ->with([
                'content' => $this->content,
            ]);
//            ->withSwiftMessage(function ($message) {
//                $message->setCharset('iso-2022-jp')
//                    ->setEncoder(new Swift_Mime_ContentEncoder_PlainContentEncoder('7bit'));
//            });
    }
}
