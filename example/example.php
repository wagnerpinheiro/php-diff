<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<title>PHP LibDiff - Examples</title>
		<link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8"/>
	</head>
	<body>
		<h1>PHP LibDiff - Examples</h1>
		<hr />
		<br />
		<?php

		// Include two sample files for comparison
		$a = explode("\n", file_get_contents(dirname(__FILE__).'/a.txt'));
		$b = explode("\n", file_get_contents(dirname(__FILE__).'/b.txt'));

		// Options for generating the diff
		$options = array(
			'context' => 1023,
			'ignoreNewLines' => false,
			'ignoreWhitespace' => false,
			'ignoreCase' => false,
			'title_a'=>'Old Version',
			'title_b'=>'New Version'
		);

		require_once('../phpdiff/diff.class.php');
		\PhpDiff\Diff::autoloadRegister();

		// Initialize the diff class
		$diff = new \PhpDiff\Diff($a, $b, $options);

		?>		
		<h2>Side by Side Diff</h2>
		<?php

		// Generate a side by side diff
		//require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/SideBySide.php';
		$renderer = new \PhpDiff\Renderer\Html\RendererSideBySide();
		echo $diff->Render($renderer);

		?>
		<br />
		<hr />
		<br />
		<h2>Inline Diff</h2>
		<?php

		// Generate an inline diff
		//require_once dirname(__FILE__).'/../lib/Diff/Renderer/Html/Inline.php';
		$renderer = new \PhpDiff\Renderer\Html\RendererInline();
		echo $diff->render($renderer);

		?>
		<br />
		<hr />
		<br />
		<h2>Unified Diff</h2>
		<pre><?php

		// Generate a unified diff
		//require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Unified.php';
		$renderer = new \PhpDiff\Renderer\Text\RendererUnified();
		echo htmlspecialchars($diff->render($renderer));

		?>
		</pre>
		<br />
		<hr />
		<br />
		<h2>Context Diff</h2>
		<pre><?php

		// Generate a context diff
		//require_once dirname(__FILE__).'/../lib/Diff/Renderer/Text/Context.php';
		$renderer = new \PhpDiff\Renderer\Text\RendererContext();
		echo htmlspecialchars($diff->render($renderer));
		?>
		</pre>
	</body>
</html>
