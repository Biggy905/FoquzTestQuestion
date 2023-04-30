<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230430184132ModifyTableUser extends Migration
{
    public function up(): void
    {
        $this->addColumn('user', 'logged_at', $this->dateTime());
    }

    public function down(): void
    {
        $this->dropColumn('user', 'logged_at');
    }
}
