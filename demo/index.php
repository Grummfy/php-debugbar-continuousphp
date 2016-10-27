<?php

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/../src/ContinuousphpCollector.php';

use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbar->addCollector(new \Grummfy\DebugBar\ContinuousphpCollector(__DIR__ . '/continuousphp.package'));
$debugbarRenderer = $debugbar->getJavascriptRenderer();
?>

<html>
<head>
	<?= $debugbarRenderer->renderHead() ?>
</head>
<body>
<h1>DebugBar Demo</h1>
<p>DebugBar at the bottom of the page</p>
<?= $debugbarRenderer->render(); ?>
</body>
</html>
