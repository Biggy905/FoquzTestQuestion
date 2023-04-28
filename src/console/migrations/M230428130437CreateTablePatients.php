<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428130437CreateTablePatients extends Migration
{
    public function up(): void
    {
        $this->createTable(
            'patients',
            [
                'id' => 'pk',
                'name' => $this->string(255)->notNull()->defaultValue(null),
                'birthday' => $this->date()->defaultValue(null),
                'phone' => $this->string(50)->defaultValue(null),
                'address' => $this->string(512)->defaultValue(null),
                'polyclinic_id' => $this->integer(11)->defaultValue(null),
                'treatment_id' => $this->integer(11)->defaultValue(null),
                'status_id' => $this->integer(11)->defaultValue(null),
                'form_disease_id' => $this->integer(11)->defaultValue(null),
                'created' => $this->dateTime(),
                'created_by' => $this->integer(11)->defaultValue(null),
                'updated'=> $this->dateTime(),
                'updated_by' => $this->integer(11)->defaultValue(null),
                'diagnosis_date' => $this->date()->defaultValue(null),
                'recovery_date' => $this->date()->defaultValue(null),
                'analysis_date' => $this->date()->defaultValue(null),
                'source_id' => $this->integer(11)->defaultValue(null),
            ],
        );
    }

    public function down(): void
    {
        $this->dropTable('patients');
    }
}
