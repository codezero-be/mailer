<?php

namespace spec\CodeZero\Mailer;

use Illuminate\Contracts\Mail\MailQueue;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LaravelMailerSpec extends ObjectBehavior
{
    function let(MailQueue $mail)
    {
        $this->beConstructedWith($mail);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeZero\Mailer\LaravelMailer');
    }

    function it_sends_an_email(MailQueue $mail)
    {
        $toEmail = 'example@example.com';
        $toName = 'Example';
        $subject = 'Subject';
        $view = 'emails.example';
        $data = ['key' => 'value'];

        $mail->queue($view, $data, Argument::type('callable'))->shouldBeCalled();

        $this->send($toEmail, $toName, $subject, $view, $data);
    }
}
