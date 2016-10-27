<?php

namespace Grummfy\DebugBar;

use DebugBar\DataCollector\DataCollectorInterface;
use DebugBar\DataCollector\Renderable;

class ContinuousphpCollector implements Renderable, DataCollectorInterface
{
	/**
	 * @var array
	 */
	protected $data;

	public function __construct($pathToPackageFile)
	{
		if (!is_readable($pathToPackageFile))
		{
			$this->data = ['error' => 'file (' . $pathToPackageFile . ') doesn\'t exist or isn\'t readable'];
		}
		else
		{
			$this->data = json_decode(file_get_contents($pathToPackageFile), true);
		}
	}

	public function collect()
	{
		return $this->data;
	}

	public function getWidgets()
	{
		return array(
			'continuousphp' => array(
				'title'     => 'ContinuousPhp',
				'map'       => 'continuousphp',
				'icon'      => 'check',
				'widget'    => 'PhpDebugBar.Widgets.VariableListWidget',
				'default'   => '{}'
			),
		);
	}

	public function getName()
	{
		return 'continuousphp';
	}
}
