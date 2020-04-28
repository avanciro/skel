<?php

namespace Avanciro\Skel\Console\Commands\Backup;
use Symfony\Component\Console\Command\Command as SymfonyConsole_Command;
use Symfony\Component\Console\Input\InputInterface as SymfonyConsole_InputInterface;
use Symfony\Component\Console\Output\OutputInterface as SymfonyConsole_OutputInterface;

class Database extends SymfonyConsole_Command {

	// PROPS
	protected static $defaultName = 'backup:db';


	protected function configure() {
		$this->setDescription("This command will invoke database backup process.");
	}



	protected function execute(SymfonyConsole_InputInterface $input, SymfonyConsole_OutputInterface $output) {

		$Config = new \Avanciro\Skel\Core\Config;

		/**
		 * Currently this script is only capable of taking
		 * MySQL database backups.
		 */

		 /**
		 * We have to check if the skel has enabled database
		 * connection.
		 */
		if ( $Config->database->enable ):
			$output->writeln("<info>[INFO]</info> Database connection status : enabled");

			/**
			 * We have to check if the skel have access to the
			 * database defined in the
			 */
			var_dump( $Config->database->connections['mysql'] );


		else:
			$output->writeln("<info>[INFO]</info> Database connection status : disabled");
		endif;

		return 0;

	}

}

?>