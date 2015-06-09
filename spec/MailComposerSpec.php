<?php

namespace spec\CodeZero\Mailer;

use CodeZero\Mailer\Mail;
use CodeZero\Mailer\MailComposer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MailComposerSpec extends ObjectBehavior
{
    function let(Mail $mail)
    {
        $this->beAnInstanceOf('spec\CodeZero\Mailer\TestMailComposer');
        $this->beConstructedWith($mail);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeZero\Mailer\MailComposer');
    }

    function it_returns_a_mail_instance(Mail $mail)
    {
        $toEmail = 'example@example.com';
        $toName = 'Example';

        $mail->compose($toEmail, $toName, null, null, null, null)
            ->shouldBeCalled()
            ->willReturn($mail);

        $this->compose($toEmail, $toName)->shouldReturn($mail);
    }
}

class TestMailComposer extends MailComposer
{
    public function compose($toEmail, $toName)
    {
        return $this->getMail($toEmail, $toName, null, null, null, null);
    }
}
