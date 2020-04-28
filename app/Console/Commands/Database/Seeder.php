<?php

namespace Avanciro\Skel\Console\Commands\Database;

use Symfony\Component\Console\Command\Command as SymfonyConsole_Command;
use Symfony\Component\Console\Input\InputOption as SymfonyConsole_InputOption;
use Symfony\Component\Console\Input\InputArgument as SymfonyConsole_InputArgument;
use Symfony\Component\Console\Input\InputInterface as SymfonyConsole_InputInterface;
use Symfony\Component\Console\Output\OutputInterface as SymfonyConsole_OutputInterface;

class Seeder extends SymfonyConsole_Command {

	// PROPS
	protected static $defaultName = 'db:seed';


	// CONFIG
	protected function configure() {

		// INFO
		$this->setDescription("This command will invoke database seeding process.");

		// ARGUMENTS
		$this->addArgument('class', SymfonyConsole_InputArgument::OPTIONAL);
	}



	// EXECUTE
	protected function execute(SymfonyConsole_InputInterface $input, SymfonyConsole_OutputInterface $output) {

		define('ABS_PATH', dirname(dirname(dirname(dirname(__DIR__)))));

		// SINGLE
		if ( $input->getArgument('class') !== NULL ):

			/**
			 * Check if the file is in place before run
			 * any seeding activity.
			 */
			if ( file_exists( ABS_PATH.'/config/Database/Seeds/'.ucfirst($input->getArgument('class')).'.php') ):
				require_once ABS_PATH.'/config/Database/Seeds/'.ucfirst($input->getArgument('class')).'.php';

				// BOOT ELOQUENT
				$Registry = new \Avanciro\Skel\Core\Registry;
				$Registry->set('config', new \Avanciro\Skel\Core\Config);
				new \Avanciro\Skel\Core\Database($Registry);

				// RUN
				$output->writeln("<info>[RUNNING]</info> : ".ucfirst($input->getArgument('class')));
				call_user_func(["\App\Database\Seeds\\".ucfirst($input->getArgument('class')), "run"]);

			else:
				$output->writeln("<error>[ERROR]</error> : File not found");
			endif;

		endif;

		return 0;
	}

}

?>