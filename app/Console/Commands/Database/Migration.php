<?php

namespace Avanciro\Skel\Console\Commands\Database;

use Symfony\Component\Console\Command\Command as SymfonyConsole_Command;
use Symfony\Component\Console\Input\InputOption as SymfonyConsole_InputOption;
use Symfony\Component\Console\Input\InputArgument as SymfonyConsole_InputArgument;
use Symfony\Component\Console\Input\InputInterface as SymfonyConsole_InputInterface;
use Symfony\Component\Console\Output\OutputInterface as SymfonyConsole_OutputInterface;

class Migration extends SymfonyConsole_Command {

	// PROPS
	protected static $defaultName = 'db:migrate';


	// CONFIG
	protected function configure() {

		// INFO
		$this->setDescription("This command will invoke database migration process.");

    }



	// EXECUTE
	protected function execute(SymfonyConsole_InputInterface $input, SymfonyConsole_OutputInterface $output) {

        // ABS_PATH
		define('ABS_PATH', dirname(dirname(dirname(dirname(__DIR__)))));

        // BOOT ELOQUENT
        $Registry = new \Avanciro\Skel\Core\Registry;
        $Registry->set('config', new \Avanciro\Skel\Core\Config);
        new \Avanciro\Skel\Core\Database($Registry);

        $files = array_diff(scandir(ABS_PATH.'/config/Database/Migrations'), array('.', '..'));
        foreach( $files as $key => $file ):

            // REQUIRE
            require_once ABS_PATH.'/config/Database/Migrations/'.$file;
            $file = str_replace(".php", "", $file);

            $reflect = new \ReflectionClass("App\Database\Migrations\\".$file);
            $instance = $reflect->newInstance();

            // RUN
            $output->writeln("<info>[RUNNING] Migration </info> : ".ucfirst($file));
            $instance->up();

        endforeach;

		return 0;
	}

}

?>