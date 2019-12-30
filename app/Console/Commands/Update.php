<?php

namespace Avanciro\Skel\Console\Commands;

use Symfony\Component\Console\Command\Command as SymfonyConsole_Command;
use Symfony\Component\Console\Input\InputOption as SymfonyConsole_InputOption;
use Symfony\Component\Console\Input\InputInterface as SymfonyConsole_InputInterface;
use Symfony\Component\Console\Output\OutputInterface as SymfonyConsole_OutputInterface;

class Update extends SymfonyConsole_Command {

	// PROPS
	protected static $defaultName = 'update';


	protected function configure() {
		$this->setDescription("This command will invoke update process.");

		// OPTIONS
		$this->addOption('force', 'f', SymfonyConsole_InputOption::VALUE_NONE);
	}



	protected function execute(SymfonyConsole_InputInterface $input, SymfonyConsole_OutputInterface $output) {

		// UPDATOR
		$Config = new \Avanciro\Skel\Console\Config;
		$Updator = new \Avanciro\Skel\Console\Updator;

		// OUTPUT
		$output->writeln("<info>[INFO]</info> Update process initialize.");
		$output->writeln("<info>[INFO]</info> Checking for updates.");


		/**
		 * We have to check the integrity of our local
		 * files using the online update mirror. We can
		 * then update the files.
		 */
		$updates = false;
		foreach ( $Updator->files() as $file => $checksum ):
			if ( hash_file("sha512", dirname(dirname(dirname(__DIR__))).'/'.$file) !== $checksum ):
				$output->writeln("<info>[INFO]</info> UPDATE : ".$file);
				$updates = true;
			endif;
		endforeach;
		$output->writeln("<info>[INFO]</info> Update checking completed");

		// UPDATES
		if ( !$updates ):
			$output->writeln("<info>[INFO]</info> No updates found.");
		endif;


		/**
		 * This code block will download and replace each file
		 * that failed the integrity check with the update mirrir.
		 * This is where the actuall update happen, User have to
		 * ass force flag to run this code block
		 */
		if ( $input->getOption('force') ):
			$output->writeln("<info>[INFO]</info> Start downloading updates");
			foreach ( $Updator->files() as $file => $checksum ):
				if ( hash_file("sha512", dirname(dirname(dirname(__DIR__))).'/'.$file) !== $checksum ):
					file_put_contents(dirname(dirname(dirname(__DIR__))).'/'.$file, file_get_contents($Config->skel['update']['mirror'].$file));
					$output->writeln("<info>[INFO]</info> UPDATING : ".$file);
				endif;
			endforeach;
			$output->writeln("<info>[INFO]</info> Update completed");
		endif;

		/**
		 * We have to sync the local checksum file with the mirror
		 * each time we do succesful update
		 *
		 * [TODO]
		 *
		 */

		// REUTRN
		return 0;
	}
}

?>