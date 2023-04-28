<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428134700AddForeignKeyPatients extends Migration
{
    public function up(): void
    {
        $this->addForeignKey(
            'FK_patients_form_diseases',
            'patients',
            'form_disease_id',
            'form_diseases',
            'id',
            null,
            'SET NULL',
        );

        $this->addForeignKey(
            'FK_patients_patients',
            'patients',
            'source_id',
            'patients',
            'id',
            'SET NULL',
            'SET NULL',
        );

        $this->addForeignKey(
            'FK_patients_polyclinics',
            'patients',
            'polyclinic_id',
            'polyclinics',
            'id',
            'SET NULL',
            'SET NULL',
        );

        $this->addForeignKey(
            'FK_patients_statuses',
            'patients',
            'status_id',
            'statuses',
            'id',
            'SET NULL',
            'SET NULL',
        );

        $this->addForeignKey(
            'FK_patients_treatments',
            'patients',
            'treatment_id',
            'treatments',
            'id',
            'SET NULL',
            'SET NULL',
        );

        $this->addForeignKey(
            'FK_patients_user',
            'patients',
            'created_by',
            'user',
            'id',
            'SET NULL',
            'SET NULL',
        );

        $this->addForeignKey(
            'FK_patients_user_2',
            'patients',
            'updated_by',
            'user',
            'id',
            'SET NULL',
            'SET NULL',
        );
    }

    public function down(): void
    {
        $this->dropForeignKey('FK_patients_form_diseases', 'patients');
        $this->dropForeignKey('FK_patients_patients', 'patients');
        $this->dropForeignKey('FK_patients_polyclinics', 'patients');
        $this->dropForeignKey('FK_patients_statuses', 'patients');
        $this->dropForeignKey('FK_patients_treatments', 'patients');
        $this->dropForeignKey('FK_patients_user', 'patients');
        $this->dropForeignKey('FK_patients_user_2', 'patients');
    }
}
