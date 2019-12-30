<?php

namespace Avanciro\Skel\Console\Commands;

use Symfony\Component\Console\Command\Command as SymfonyConsole_Command;
use Symfony\Component\Console\Input\InputInterface as SymfonyConsole_InputInterface;
use Symfony\Component\Console\Output\OutputInterface as SymfonyConsole_OutputInterface;

class Version extends SymfonyConsole_Command {

	protected static $defaultName = 'version';

	protected function configure() {
		$this->setDescription("This command will display the version of installed Skel instance.");
	}

	protected function execute(SymfonyConsole_InputInterface $input, SymfonyConsole_OutputInterface $output) {
		$output->writeln("v1.0.0-beta");
		return 0;
	}
}

?>