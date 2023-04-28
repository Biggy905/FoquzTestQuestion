<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428124406CreateTableUsers extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'user',
            [
                'id' => 'pk',
                'polyclinic_id' => $this->integer(11)->defaultValue(null),
                'registration_ip' => $this->string(15)->defaultValue(null),
                'username' => $this->string(255)->notNull(),
                'email' => $this->string(128)->defaultValue(null),
                'email_confirmed' => $this->smallInteger(1)->defaultValue(0),
                'password_hash' => $this->string(255)->notNull(),
                'auth_key' => $this->string(32)->notNull(),
                'confirmation_token' => $this->string(255)->defaultValue(null),
                'status' => $this->integer(11)->notNull()->defaultValue(1),
                'superadmin' => $this->smallInteger(6)->defaultValue(0),
                'bind_to_ip' => $this->string(255)->defaultValue(null),
                'created_at' => $this->integer(11)->notNull(),
                'updated_at' => $this->integer(),
                'deleted_at' => $this->integer(),
            ]
        );
    }

    public function down(): void
    {
        $this->dropTable('user');
    }
}
