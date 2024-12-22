<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'app:send-test-email',
    description: 'Sends a test email to ensure the mailer configuration works',
)]
class TestEmailCommand extends Command
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = (new Email())
            ->from('your-email@example.com')
            ->to('test@example.com')
            ->subject('Test Email')
            ->text('This is a test email sent from Symfony Mailer.');

        try {
            $this->mailer->send($email);
            $output->writeln('Test email sent successfully!');
        } catch (\Exception $e) {
            $output->writeln('Error sending email: ' . $e->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
