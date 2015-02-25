<?php

namespace Message\Mothership\Install\Project\RootFile\Composer;

use Message\Mothership\Install\Project\Types;

/**
 * Class EcommerceComposer
 * @package Message\Mothership\Install\Project\RootFile\Composer
 *
 * @author Thomas Marchant <thomas@message.co.uk>
 *
 * Dependency setup for a basic ecommerce site
 */
class EcommerceComposer extends AbstractComposer
{
	/**
	 * {@inheritDoc}
	 */
	public function getName()
	{
		return Types::ECOMMERCE;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getContents()
	{
		return <<<'EOD'
{
	"require": {
		"mothership-ec/cog-mothership-user"     : "~4.0",
		"mothership-ec/cog-mothership-cms"      : "~4.0",
		"mothership-ec/cog-mothership-ecommerce": "~3.0",
		"mothership-ec/cog-mothership-discount" : "~2.0",
		"mothership-ec/cog-mothership-returns"  : "~5.0",
		"mothership-ec/cog-mothership-voucher"  : "~2.0",
		"mothership-ec/cog-mothership-reports"  : "~2.0"
	},
	"config": {
		"bin-dir": "bin"
	},
	"scripts": {
		"post-package-install": [
			"Message\\Cog\\Config\\FixtureManager::postInstall"
		],
		"pre-package-update": [
			"Message\\Cog\\Config\\FixtureManager::preUpdate"
		],
		"post-package-update": [
			"Message\\Cog\\Config\\FixtureManager::postUpdate"
		]
	},
	"autoload": {
		"psr-4": {
			""                   : "app/",
			"Mothership\\Site\\" : "app/site/src"
		}
	}
}
EOD;

	}
}
