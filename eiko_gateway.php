<?php
	// Definieren der Pfade zu der Joomla-Installation

	define( '_JEXEC', 1 );
	define( 'DS', DIRECTORY_SEPARATOR );
	
	$prefordner ='';
	if (isset ($_POST["prefordner"])) {
		$prefordner =  escape($_POST["prefordner"]);
	}
	if (isset ($_GET["prefordner"])) {
		$prefordner =  escape($_GET["prefordner"]);
	}
	if (!$prefordner) { 
		$prefordner = '';
	} else {$prefordner = '/'.$prefordner;}

	$ordner ='';
	if (isset ($_POST["ordner"])) {
		$ordner =  escape($_POST["ordner"]);
	}
	if (isset ($_GET["ordner"])) {
		$ordner =  escape($_GET["ordner"]);
	}
	if (!$ordner) { 
		$ordner = '';
	}
	$ordner = real_htmlspecialchars ($ordner);
	$domain = parse_url($ordner, PHP_URL_HOST);
	
	$ordner = str_replace('http://', '', $ordner);
	$ordner = str_replace('https://', '', $ordner);
	$ordner = str_replace($domain, '', $ordner);
	function escape($value) {
		$return = '';
		for($i = 0; $i < strlen($value); ++$i) {
			$char = $value[$i];
			$ord = ord($char);
			if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
				$return .= $char;
			else
				$return .= '\\x' . dechex($ord);
		}
		return $return;
	}
	function real_htmlspecialchars($string)
	{
		return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
	}	
	
	define('JPATH_BASE', $_SERVER['DOCUMENT_ROOT'].$prefordner.$ordner );	// Absoluter Pfad zu der Joomla Installation
	// Einbinden der Notwendigen Klassen falls diese noch nicht geladen wurden
	require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
	require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
	 
	//JHtml::_('bootstrap.framework');
	$app = JFactory::getApplication('site');
	
	//GET und POST unterstützen
	$postData = $app->input->get;
	$einsatz = $postData->get('einsatz','', 'int');
	if(!$einsatz) {
		$postData = $app->input->post;
		$einsatz = $postData->get('einsatz','', 'int');
	}
	
	$api = $postData->get('api','', 'int');
	$status = '';
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select('params')->from('#__modules')->where('module = "mod_eiko_einsatzstatus" and published ="1"');
	$db->setQuery($query);
	$params = $db->loadResult();
	$registry = new JRegistry;
	$params = $registry->loadString($params);
	if ($api == $params['api']) {
		if ($einsatz=='') {
		   $status = $params['einsatzstatus']; 
		   if (!$status) : $einsatz = '999'; endif;
		}
		//Array mit möglichen Status, erleichertert die Erweiterung
		$possible_status = ['300','400','500','600','999'];
		
		//Alles auskommentiert, da immer der gleiche Code verwendet wird
		/*if ($einsatz=='300') {
			$status = $einsatz; 
			$params['einsatzstatus'] = $status;
			$query = "UPDATE #__modules SET params = '".$params."' WHERE module = 'mod_eiko_einsatzstatus' and published ='1'";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$db->execute();
		}
		if ($einsatz=='400') {
			$status = $einsatz; 
			$params['einsatzstatus'] = $status;
			$query = "UPDATE #__modules SET params = '".$params."' WHERE module = 'mod_eiko_einsatzstatus' and published ='1'";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$db->execute();
		}
		if ($einsatz=='500') {
			$status = $einsatz; 
			$params['einsatzstatus'] = $status;
			$query = "UPDATE #__modules SET params = '".$params."' WHERE module = 'mod_eiko_einsatzstatus' and published ='1'";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$db->execute();
		}
		if ($einsatz=='600') {
			$status = $einsatz; 
			$params['einsatzstatus'] = $status;
			$query = "UPDATE #__modules SET params = '".$params."' WHERE module = 'mod_eiko_einsatzstatus' and published ='1'";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$db->execute();
		}*/
		
		//Abfrage, ob empfangener Status im Array existiert
		if (in_array($einsatz, $possible_status)) {
			$status = $einsatz; 
			$params['einsatzstatus'] = $status;
			$query = "UPDATE #__modules SET params = '".$params."' WHERE module = 'mod_eiko_einsatzstatus' and published ='1'";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$db->execute();
			$response = '200';
		}
		else {
			$response = '404';
		}
	}
	else {
		$response = '401';
	}
	echo $response; 
				
?>