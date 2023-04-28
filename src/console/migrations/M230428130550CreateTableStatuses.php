<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428130550CreateTableStatuses extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'statuses',
            [
                'id' => 'pk',
                'name' => $this->string(255)->defaultValue(null),
                'sort' => $this->integer(11)->defaultValue(null),
            ],
        );
    }

    public function down(): void
    {
        $this->dropTable('statuses');
    }
}
