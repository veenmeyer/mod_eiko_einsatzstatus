 <?php
// Definieren der Pfade zu der Joomla-Installation

define( '_JEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );

$ordner ='';
if (isset ($_POST["ordner"])) {
$ordner =  escape($_POST["ordner"]);
}

if (isset ($_GET["ordner"])) {
$ordner =  escape($_GET["ordner"]);
}
if (!$ordner) { $ordner = ''; }


$ordner = real_htmlspecialchars ($ordner);

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
	

define('JPATH_BASE', $_SERVER['DOCUMENT_ROOT']."/".$ordner );    // Absoluter Pfad zu der Joomla Installation
 
// Einbinden der Notwendigen Klassen falls diese noch nicht geladen wurden
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
 
//JHtml::_('bootstrap.framework');


$app = JFactory::getApplication('site');
$postData = $app->input->post;
$einsatz = $postData->get('einsatz','', 'int');
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
					   if (!$status) : $status = '200'; endif;
					}
				
				if ($einsatz=='300') {
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
				}
				if ($einsatz=='999') {
					$status = $einsatz; 
						$params['einsatzstatus'] = $status;
						$query = "UPDATE #__modules SET params = '".$params."' WHERE module = 'mod_eiko_einsatzstatus' and published ='1'";
						$db = JFactory::getDBO();
						$db->setQuery($query);
						$db->execute();
				}
		}
		
		

		else {
			$status = '100';
		}









echo $status; 

					
?>





 