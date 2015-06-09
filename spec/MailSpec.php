<?php

namespace spec\CodeZero\Mailer;

use CodeZero\Mailer\Mailer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MailSpec extends ObjectBehavior
{
    function let(Mailer $mailer)
    {
        $this->beConstructedWith($mailer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeZero\Mailer\Mail');
    }

    function it_composes_an_email(Mailer $mailer)
    {
        $toEmail = 'example@example.com';
        $toName = 'Example';
        $subject = 'Subject';
        $view = 'emails.example';
        $data = ['key' => 'value'];
        $options = null;

        $mailer->send($toEmail, $toName, $subject, $view, $data, $options)
            ->shouldBeCalled()
            ->willReturn($this);

        $this->compose($toEmail, $toName, $subject, $view, $data, $options)->send();
    }
}
