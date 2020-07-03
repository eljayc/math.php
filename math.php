<?php

$plugin['name'] = 'math';
$plugin['allow_html_help'] = 0;
$plugin['version'] = '0.1';
$plugin['author'] = 'Lee J. Cundall';
$plugin['author_uri'] = 'http://www.eljaycee.com/';
$plugin['description'] = 'Conveniently embed simple mathematical formulae into articles';
$plugin['order'] = 5;
$plugin['type'] = 0;
if (!defined('PLUGIN_HAS_PREFS')) define('PLUGIN_HAS_PREFS', 0x0001); // This plugin wants to receive "plugin_prefs.{$plugin['name']}" events
if (!defined('PLUGIN_LIFECYCLE_NOTIFY')) define('PLUGIN_LIFECYCLE_NOTIFY', 0x0002); // This plugin wants to receive "plugin_lifecycle.{$plugin['name']}" events

if (!defined('txpinterface'))
	@include_once('zem_tpl.php');

if (0) {
?>

# --- BEGIN PLUGIN HELP ---

h1. How to use the 'math' plugin for Textpattern

p. 1) Before use, you must first you must copy the accompanying 'mimetex.cgi' file to a folder called 'cgi-bin' your server, and rename it to 'math.cgi' (Or you could edit the php file and get it to point to a different filename and/or location).

p. 2) Within the article editor, place any LaTeX commands between the tags <txp:math> and </txp:math>. For example:

@code@ <txp:math>x+y=z</txp:math>

p. 3) When the article is published, you should see a computed PNG image of the mathematical formula in a nicely centered position.

# --- END PLUGIN HELP ---

<?php
}

# --- BEGIN PLUGIN CODE ---

function math($attrs, $thing='') {
    $mimetex_path = 'cgi-bin/math.cgi'; // Relative server path to your installed mimetex.cgi file
    $content = '';
    if (array_key_exists('content', $attrs)) {
        $content .= $attrs['content'];
    }
    $content .= $thing;
    return "<p style='text-align:center'><img src='" . $mimetex_path . "?".urlencode($content)."' alt='Mathematical Formula' /></p>";
}

# --- END PLUGIN CODE ---

?>
