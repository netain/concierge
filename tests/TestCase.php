	<?php

namespace MrTea\Concierge\Tests;

use MrTea\Concierge\ConciergeServiceProvicer;

class TestCase extends \Orchestra\Testbench\TestCase
{
	public function setUp(): void
	{
		parent::setUp();
		// additional setup
	}

	protected function getPackageProviders($app)
	{
		return [
			ConciergeServiceProvicer::class,
		];
	}

	protected function getEnvironmentSetUp($app)
	{
		// perform environment setup
	}
}