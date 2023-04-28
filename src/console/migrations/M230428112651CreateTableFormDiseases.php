<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428112651CreateTableFormDiseases extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'form_diseases',
            [
                'id' => 'pk',
                'name' => $this->string(255)->notNull(),
                'sort' => $this->integer(11)->defaultValue(null),
            ]
        );
    }

    public function down(): void
    {
        $this->dropTable('form_diseases');
    }
}
