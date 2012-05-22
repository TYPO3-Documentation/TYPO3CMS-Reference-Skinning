<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title><?php print $documentTitle ?></title>
		<style>
			h1 {				
				color:#69A550;
				font-family:Tahoma;
				font-size:20pt;
				font-weight:bold;
				text-align:left !important;
				text-decoration:none !important;
			}
			
			h2 {
				color:#666666;
				font-family:Tahoma;
				font-size:20pt;
				font-style:normal;
				font-weight:normal;
				margin-bottom:0.101cm;
				margin-top:0.499cm;
				text-align:left !important;	
			}
			
			h3 {
				color:#69A550;
				font-family:Tahoma;
				font-size:15pt;
				font-style:normal;
				font-weight:normal;
				margin-bottom:0.101cm;
				margin-top:0.4cm;
				text-align:left !important;
			}
			
			body {
				color:#000000;
				font-family:Tahoma;
				font-size:9pt;
				text-align:left !important;
			}
			
			table {
				border-collapse:collapse;
				width: 99%;
			}
			
			table, th, td {
				border-color: #000;
				border-width: 1px;
				border-style: solid;
			}
			
			th {
				background-color: #999
			}
			
			td {
				margin: 0;
				padding: 4px;
			}

			td.odd {
				background-color: #E6E6E6;	
			}
			
		</style>
	</head>
	<body>
	
		<h1>
			<?php print $documentTitle ?>
		</h1>
		<p>
			Keywords: Iconset, Icon reference, CSS Coding Guidelines
		</p>
		<p>
			Copyright 2010, Team 3@T3UXW 2010, TYPO3 Core Team, TYPO3 Documentation Team
		</p>
		
		<p>
			The content of this document is related to TYPO3 - a GNU/GPL CMS/Framework available from www.typo3.org
		</p>
		
		<h2>
			Introduction
		</h2>
		<p>
			This document is aimed to be a reference for icons in TYPO3 backend and is designed to facilitate the browsing of icons. Currently there are <?php print $numberOfIcons ?> official icons in TYPO3 version <?php print $version ?>. Those icons are not used directly within the Backend but are concatenated in sprites. 
		</p>
		
		<?php foreach ($structure as $groupName => $elements): ?>
	
			<h2>
				<?php print ucfirst($groupName) ?>
			</h2>
			
			<?php foreach ($elements as $subGroupName => $subelements): ?>
				<h3>
					<?php print $groupName . '-' . $subGroupName ?>
				</h3>
				
				<table>
					<thead>
						<tr>
							<th style="text-align: center; width: 75px">
								Icons
							</th>
							<th>
								Naming
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $loop = 0 ?>
						<?php foreach ($subelements as $element): ?> 
						<?php 
							$className = $loop % 2 == 0 ? 'even' : 'odd';
							$loop++
						?>
						<tr>
							<td style="text-align: center" class="<?php print $className ?>">
								<img src="<?php print $element ?>" alt="" />
							</td>
							<td class="<?php print $className ?>">
								<?php
									preg_match('/[^\/]+$/is', $element, $match);
									$iconName = str_replace('.png', '', $match[0]);
								?>
								<?php print $groupName . '-' . $iconName ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endforeach ?>
		<?php endforeach ?>
	</body>
</html>


