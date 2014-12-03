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
	"repositories": [
		{
			"type": "composer",
			"url" : "http://packages.message.co.uk"
		}
	],
	"require": {
		"message/cog" : "dev-feature/umask-on-asset-tasks as 3.5.0",
		"message/cog-mothership-user": "dev-feature/create-user-task as 3.2.0",
		"message/cog-mothership-cms"      : "~3.0",
		"message/cog-mothership-ecommerce": "~2.2",
		"message/cog-mothership-discount" : "~1.3",
		"message/cog-mothership-returns"  : "~4.0",
		"message/cog-mothership-voucher"  : "~1.3",
		"message/cog-mothership-reports"  : "~1.0",
		"message/twitter"                 : "~1.0"
	},
	"suggest": {
		"message/cog-mothership-stripe" : "Allows integration of Stripe payment gateway",
		"message/cog-mothership-epos"   : "EPOS module for Mothership sites, allow synchronised shop and online sales",
		"message/cog-mothership-fedex"  : "Allows integration of Fedex dispatch methods",
		"message/cog-mothership-mailing": "Allows synchronisation with major mailing list providers"
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