 <?php
// Definieren der Pfade zu der Joomla-Installation

define( '_JEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );
define('JPATH_BASE', $_SERVER['DOCUMENT_ROOT']."/" );    // Absoluter Pfad zu der Joomla Installation
 
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





 