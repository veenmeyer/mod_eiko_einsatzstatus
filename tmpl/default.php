<?php
/**
 * @copyright	Copyright (c) 2017 einsatzkomponente.de. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

$api            		= $params->get( 'api', '' );
$einsatzstatus          = $params->get( 'einsatzstatus', '999' );
$status = '';

if ($einsatzstatus == '999') 
		{
			$status= 'Einsatzbereit';
		}
if ($einsatzstatus == '300') 
		{
			$status= 'Zur Zeit befinden wir uns im Einsatz !';
			$status.= '<br/>';
			$status.= '<b>(Feueralarm)</b>';
		}

if ($einsatzstatus == '400') 
		{
			$status= 'Zur Zeit befinden wir uns im Einsatz !';
			$status.= '<br/>';
			$status.= '<b>(Hilfeleistung)</b>';
		}

if ($einsatzstatus == '500') 
		{
			$status= 'Zur Zeit befinden wir uns im Einsatz !';
			$status.= '<br/>';
			$status.= '<b>(Sonstiger Einsatz)</b>';
		}

if ($einsatzstatus == '600') 
		{
			$status= 'Zur Zeit befinden wir uns im Einsatz !';
			$status.= '<br/>';
			$status.= '<b>(Übungseinsatz)</b>';
		}

?>

<div style="width:100%;height:auto;">
<?php echo $status; ?>
</div>


<?php

?>
