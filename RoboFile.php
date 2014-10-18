<?php
/**
 * @package     Redcore
 * @subpackage  tests
 *
 * @copyright   Copyright (C) 2008 - 2014 redCOMPONENT.com, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

require_once 'vendor/autoload.php';

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class Robofile extends \Robo\Tasks
{
	use \Codeception\Task\MergeReports;

	public function parallelRun()
	{
		$parallel = $this->taskParallelExec();

		$parallel->process(
			$this->taskCodecept()
			->suite('acceptance')
			->group("Joomla2")
			->env("joomla2")
			->xml("tests/_log/result_joomla2.xml")
		);

		$parallel->process(
			$this->taskCodecept()
			->suite('acceptance')
			->group("Joomla3")
			->env("joomla3")
			->xml("tests/_log/result.xml")
		);

		return $parallel->run();
	}

	public function parallelMergeResults()
	{
		$merge = $this->taskMergeXmlReports();

		$merge->from("/tests/_log/result_joomla2.xml")
			->into("/tests/_log/result.xml")
			->run();
	}
}
