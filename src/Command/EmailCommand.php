<?php

// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\MailerService;
use Symfony\Component\Console\Question\Question;

// the name of the command is what users type after "php bin/console"
#[AsCommand(name: 'app:send-email')]
class EmailCommand extends Command
{

    private $mailerService;

    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;

        parent::__construct();
    }
    protected function configure(): void
    {
        $this

            ->addArgument('destinatario', InputArgument::OPTIONAL, 'El correo del destinatario')

            // the command description shown when running "php bin/console list"
            ->setDescription('Enviar un mensaje de correo electrónico a un usuario.')
            // the command help shown when running the command with the "--help" option
            ->setHelp('Este comando permite enviar un mensaje de correo electrónico a un usuario.')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $destinatario=$input->getArgument('destinatario');
        if (!$destinatario) {
            $helper = $this->getHelper('question');
            $question = new Question('Por favor, introduce el correo del destinatario: ');
            $destinatario = $helper->ask($input, $output, $question);
        }

        $this->mailerService->emailDestinatario($destinatario);
        $output->writeln('Email enviado a '.$destinatario);



        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}