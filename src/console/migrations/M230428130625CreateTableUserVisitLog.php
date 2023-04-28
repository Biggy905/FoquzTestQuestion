<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428130625CreateTableUserVisitLog extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'user_visit_log',
            [
                'id' => 'pk',
                'token' => $this->string(255)->notNull(),
                'ip' => $this->string(15)->notNull(),
                'language' => $this->char(2)->notNull(),
                'user_agent' => $this->string(255)->notNull(),
                'user_id' => $this->integer(11)->defaultValue(null),
                'visit_time' => $this->integer(11)->notNull(),
                'browser' => $this->string(30)->defaultValue(null),
                'os' => $this->string(20)->defaultValue(null),
            ],
        );
    }

    public function down(): void
    {
        $this->dropTable('user_visit_log');
    }
}
