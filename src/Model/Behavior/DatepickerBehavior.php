<?php

// https://stackoverflow.com/questions/31197051/beforemarshal-does-not-modify-request-data-when-validation-fails
// https://stackoverflow.com/questions/20334355/how-to-get-protected-property-of-object-in-php

namespace JeffAdmin\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use ArrayObject;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\I18n\I18n;

class DatepickerBehavior extends Behavior
{

    public function beforeMarshal(EventInterface $event, ArrayObject $data, ArrayObject $options)
	{	
		//$locale = Configure::read('App.defaultLocale');
		$locale = I18n::getLocale();
		$table = $event->getSubject()->getTable();
		$db = ConnectionManager::get('default');
		$collection = $db->getSchemaCollection();
		$tables = $collection->listTables();
		$tableSchema = $collection->describe($table);
		$columns = $tableSchema->columns();
		//$name = $tableSchema->name();
		
		foreach($data as $field => $value){	// Nincs benne a created és a modified mező. Hmm!
			$type = $tableSchema->getColumnType($field);
			if (in_array($type, ['date', 'time', 'datetime'])) {
				if ($locale == 'hu_HU') {
					switch( $type ){
						case 'date': 
							$data[$field] = FrozenDate::parseDate($data[$field], 'yyyy-MM-dd')->i18nFormat('yyyy-MM-dd');
							break;
						case 'time': 
							$data[$field] = FrozenTime::parseTime($data[$field], 'HH:mm:ss')->i18nFormat('HH:mm:ss');
							break;
						case 'datetime':
							$data[$field] = FrozenTime::parseDateTime($data[$field], 'yyyy-MM-dd HH:mm:ss')->i18nFormat('yyyy-MM-dd HH:mm:ss');
							break;
					}
				}
				
				/*
				if ($locale == 'en_GB') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'en_US') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				*/

			} // in_array types
		}	// /.foreach
		
	}
	
}