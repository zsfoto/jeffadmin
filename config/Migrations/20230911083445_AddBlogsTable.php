<?php
//declare(strict_types=1);

use Migrations\AbstractMigration;

class AddBlogsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
		$table = $this->table('blogs', [
			'collation' => 'utf8_hungarian_ci'
		]);		
		$table->addColumn('name', 'string', [
			'default' => null,
			'limit' => 255,
			'null' => false,
		]);		
		//$table->addColumn('email', 'string', [
		//	'default' => null,
		//	'limit' => 255,
		//	'null' => false,
		//]);		
		$table->addColumn('body', 'text', [
			'default' => null,
			'null' => true,
		]);		
		$table->addColumn('visible', 'boolean', [
			'signed' => false,
			'default' => true,
			'null' => false,
		]);		
		$table->addColumn('pos', 'integer', [
			'default' => 1000,
			'null' => true,
		]);
		
		//$table->addTimestamps();		
		$table->addColumn('created', 'datetime', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('modified', 'datetime', [
			'default' => null,
			'null' => false,
		]);

		$table->addIndex('name', ['unique' => true]);
		//$table->addIndex('email', ['unique' => true]);
		//$table->addIndex('email', ['unique' => true])
		$table->addIndex(['pos']);
		$table->addIndex(['visible']);
			
		$table->create();
		
    }
}
