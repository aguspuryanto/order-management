<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'order_number' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'customer_name' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'total_amount' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        //
    }
}
