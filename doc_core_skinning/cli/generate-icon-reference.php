#!/usr/local/bin/php
<?php
require('librairies/class.tx_phptemplate.php');

// Defines variables

$wkhtmltopdf = $_SERVER['PWD'] . '/wkhtmltopdf';
$outputFolder = $_SERVER['PWD'] . '/output/';
$docFolder = $_SERVER['PWD'] . '/../doc/';
$documentTitle = 'TYPO3 Icon Reference';
$versionOfTYPO3 = '4.4.0';

// Handles arguement
$copyIcons = TRUE;
$pathTYPO3Source = '';
foreach ($argv as $argument) {

	if (preg_match('/--path=(.+)/is', $argument, $matches)) {
		$path = $pathTYPO3Source = $matches[1];
		if (substr($path, -1) != '/') {
			$path .= '/';
		}
		$path .= 'typo3/sysext/t3skin/images/icons';
	}
	elseif (preg_match('/--copy-icons=(.+)/is', $argument, $matches)) {
		$result = $matches[1];
		if ($result == 'true' || $result == 1) {
			$copyIcons = TRUE;	
		}
		else {
			$copyIcons = FALSE;
		}
	}
}

// Displays a help message
if (!isset($path)) {
	console('Generates document: "TYPO3 Icon Reference"');
	console('Usage:');
	console('generate-icon-reference.php --path=path/to/trunk [--copy-icons=true] [--dry-run]');
	exit(1);
}

// Error message when directory is not to be found
if (!is_dir($path)) {
	console('Error: icon directory does not exist at ' . $path);
	console('Script ended');
	exit(1);
}

// Everything OK, let's start the job
$template = new tx_phptemplate('template/icon-reference.php');

$groups = glob($path . '/*');
foreach ($groups as $group) {
	preg_match('/[^\/]+$/is', $group, $match);
	$groupName = $match[0];
	$datasource[$groupName] = getGroups($path, $groupName);
}

$numberOfIcons = 0;
$structure = array();
foreach ($datasource as $groupName => $groups) {
	$structure[$groupName] = array();
	$allIconsFromGroup = glob($path . '/' . $groupName . '/*');
	foreach ($groups as $subGroupName) {
		$iconGroupPath = $path . '/' . $groupName . '/' . $subGroupName . '*';
		$iconGroups = glob($iconGroupPath);
		$numberOfIcons = $numberOfIcons + count($iconGroups);
		$structure[$groupName][$subGroupName] = $iconGroups;
	}
}

$template->set('documentTitle', $documentTitle);
$template->set('version', $versionOfTYPO3);
$template->set('numberOfIcons', $numberOfIcons);
$template->set('structure', $structure);

$content = $template->fetch();

// For performance reasons write a file with images in local
file_put_contents($outputFolder . 'icon-reference.html', $content);

// Write an other file for the web. (i.e image have a proper URL)
$urlPath = 'https://svn.typo3.org/TYPO3v4/Core/tags/TYPO3_' . str_replace('.', '-', $versionOfTYPO3);
#$contentForWeb = str_replace($pathTYPO3Source, $urlPath, $content);
#file_put_contents($docFolder . 'icon-reference.html', $contentForWeb);

// options available: http://madalgo.au.dk/~jakobt/wkhtmltopdf-0.9.0_beta2-doc.html
$options = array();
#$options[] = '--lowquality';
#$options[] = '--grayscale';
#$options[] = '--toc';
$options[] = '--zoom 0.9';
$options[] = '--default-header';
$options[] = '--outline';
$options[] = '--header-left "' . $documentTitle  . '"';
$command =  $wkhtmltopdf . ' ' . implode(' ', $options) . ' ' . $outputFolder . 'icon-reference.html ' . $docFolder . 'icon-reference.pdf';
system($command);

/***********************/
//// USEFUL METHOD ////
/***********************/

/**
 * Return the groups in folder actions, apps, etc...
 *
 * @param string $path: path to trunk
 * @param string $groupName: the group name
 */
function getGroups($path, $groupName) {
	$groups = array();
	$icons = glob($path . '/' . $groupName . '/*');
	$previousPart = '';
	foreach ($icons as $icon) {	
		preg_match('/[^\/]+$/is', $icon, $match);
		$iconName = $match[0];
		$iconNameParts = explode('-', $iconName);
		$firstPart = $iconNameParts[0];
		if ($firstPart != $previousPart) {
			$groups[] = str_replace('.png', '', $firstPart);
			$previousPart = $firstPart;
		}
	}
	return $groups;
}

/**
 * Nice output on the console
 * @param mixed $output: the output to be displayed
 */
function console($output) {
	if (is_array($output)) {
		print_r($output);	
	}
	else {
		print $output . chr (10);	
	}
}
?>