<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230430182906CreateTableToken extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'token',
            [
                'id' => 'pk',
                'id_user' => $this->integer(11)->notNull(),
                'token' => $this->string(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
        );
    }

    public function down(): void
    {
        $this->dropTable('token');
    }
}
