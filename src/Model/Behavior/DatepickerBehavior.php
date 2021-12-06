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
use Cake\I18n\I18n;

class DatepickerBehavior extends Behavior
{
	
    public function beforeMarshal(EventInterface $event, ArrayObject $data, ArrayObject $options)
	{	
		$separator = '-';
		
		//$locale = Configure::read('App.defaultLocale');
		$locale = I18n::getLocale();
		$table = $event->getSubject()->getTable();
		$db = ConnectionManager::get('default');
		$collection = $db->getSchemaCollection();
		$tables = $collection->listTables();
		$tableSchema = $collection->describe($table);
		$columns = $tableSchema->columns();
		
		//$name = $tableSchema->name();
		
		//foreach($columns as $c){			// Ebben benne van a created és a modified mező is.
		foreach($data as $field => $value){	// Nincs benne a created és a modified mező. Hmm!
		
			//debug($field);
			//debug($value);
			//die();
		
			$type = $tableSchema->getColumnType($field);

			if($type == 'date' || $type == 'time' || $type == 'datetime'){
				$data[$field] = str_replace('/', '-', $data[$field]);
				$data[$field] = str_replace('.', '-', $data[$field]);
				if ($locale == 'pt_BR') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'hu_HU') {
					list($y, $m, $d) = explode($separator, $data[$field]);
				}
				if ($locale == 'en_GB') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'en_US') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'fr_FR') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'hr_HR') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'ru_RU') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				if ($locale == 'ch_CH') {
					list($d, $m, $y) = explode($separator, $data[$field]);
				}
				
				$data[$field] = $y .'-'. $m .'-'. $d;

				switch( $type ){
					case 'date': 
						//$data[$field] = FrozenDate::parseDate( $data[$field] );
						$data[$field] = FrozenDate::parse($data[$field])->i18nFormat('yyyy-MM-dd');
						break;
					case 'time': 
						//$data[$field] = FrozenDate::parseTime( $data[$field] );
						$data[$field] = FrozenDate::parse($data[$field])->i18nFormat('HH:ii:ss');
						break;
					case 'datetime':
						//$data[$field] = FrozenDate::parseDateTime( $data[$field] );
						$data[$field] = FrozenDate::parse($data[$field])->i18nFormat('yyyy-MM-dd HH:ii:ss');
						break;
				}
				
			}
			
		}

	}

}