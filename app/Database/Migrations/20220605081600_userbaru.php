<?php

namespace App\Database\Migrations;

class Userbaru extends \CodeIgniter\Database\Migration
{

	public function up()
	{
		$this->forge->addField([
			'id_user' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type' => 'TEXT',
			],
			'salt' => [
				'type' => 'TEXT'
			],
			'role' => [
				'type' => 'INT',
				'constraint' => 1,
				'default' => 1,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'created_date' => [
				'type' => 'DATETIME',
			],
			'updated_by' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE,
			],
			'updated_date' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			]
		]);

		$this->forge->addKey('id_user', TRUE);
		$this->forge->createTable('userbaru');
	}

	public function down()
	{
		$this->forge->dropTable('userbaru');
	}
}
