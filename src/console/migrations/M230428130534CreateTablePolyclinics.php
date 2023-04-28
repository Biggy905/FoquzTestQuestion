<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428130534CreateTablePolyclinics extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'polyclinics',
            [
                'id' => 'pk',
                'name' => $this->string(255)->notNull(),
            ],
        );
    }

    public function down(): void
    {
        $this->dropTable('polyclinics');
    }
}
