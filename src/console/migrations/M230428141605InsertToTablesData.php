<?php

namespace app\console\migrations;

use yii\db\Migration;

final class M230428141605InsertToTablesData extends Migration
{
    public function up(): void
    {
        $this->batchInsert(
            'form_diseases',
            [
                'id',
                'name',
                'sort',
            ],
            [
                [1, 'Легкая', NULL],
                [2, 'Средней тяжести', NULL],
                [3, 'Тяжело', NULL],
                [4, 'Бессимптомно', NULL]
            ],
        );

        $this->batchInsert(
            'polyclinics',
            [
                'id',
                'name',
            ],
            [
                [2, 'Поликлиника первая'],
                [3, 'поликлиника 2'],
            ],
        );

        $this->batchInsert(
            'statuses',
            [
                'id',
                'name',
                'sort',
            ],
            [

                [1, 'Контакт', NULL],
                [2, 'Не подтвердился', NULL],
                [3, 'Болен', NULL],
                [4, 'Поправился', NULL],
                [5, 'Умер', NULL],
            ],
        );

        $this->batchInsert(
            'treatments',
            [
                'id',
                'name',
                'sort',
            ],
            [

                [1, 'Госпитализация', NULL],
                [2, 'Амбулаторно', NULL],
            ],
        );

        $this->batchInsert(
            'user',
            [
                'id',
                'polyclinic_id',
                'username',
                'auth_key',
                'password_hash',
                'confirmation_token',
                'status',
                'superadmin',
                'created_at',
                'updated_at',
                'registration_ip',
                'bind_to_ip',
                'email',
                'email_confirmed',
            ],
            [

                [1, 0, 'superadmin', 'YpBGl_EWteH_sAUPHVWTpbgdJDE7mrXy', '$2y$13$uwzoN00JcxSMo2zungt6Hubis6w5GLtcLzdwzZZ1ij3bvgLCiKbvS', NULL, 1, 1, 1590500440, 1590683188, NULL, '', NULL, 0],
                [9, 2, 'a.plotnikov', 'qyftGvqeDsWenw2pVFzOlm_7u1OhdwpZ', '$2y$13$RXC/s.EQoxntoq9zbVgqreAO7ht9MTMhnV8RaXcVaRQ4eJFF2iVXe', NULL, 1, 1, 1590683226, 1590683226, '188.32.22.19', '', '', 0],
                [10, 2, 'user.poilclinica.1', '5Z372ETTEPlibgXrOOK7XzjVH_glLfnY', '$2y$13$TKyulybBOSs3LIf/jb3MeODgl.vPQ43zbtRRkl.h9bohtuSDD5P7W', NULL, 1, 0, 1590683290, 1590683290, '188.32.22.19', '', '', 0],
            ],
        );

        $this->batchInsert(
            'user_visit_log',
            [
                'id',
                'token',
                'ip',
                'language',
                'user_agent',
                'user_id',
                'visit_time',
                'browser',
                'os',
            ],
            [
                [1, '5ecd32603a185', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1, 1590506080, 'Chrome', 'Windows'],
                [2, '5ecf5690e0075', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1, 1590646416, 'Chrome', 'Windows'],
                [3, '5ecf59cb0e140', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1, 1590647243, 'Chrome', 'Windows'],
                [9, '5ecfe672bfb1b', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 9, 1590683250, 'Chrome', 'Windows'],
                [10, '5ecfe6b1d026b', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 10, 1590683313, 'Chrome', 'Windows'],
                [11, '5f0d5605d355f', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 9, 1594709509, 'Chrome', 'Windows'],
                [12, '60377dd4bdec5', '188.32.22.19', 'ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 9, 1614249428, 'Chrome', 'Windows'],
            ],
        );

        $this->batchInsert(
            'patients',
            [
                'id',
                'name',
                'birthday',
                'phone',
                'address',
                'polyclinic_id',
                'treatment_id',
                'status_id',
                'form_disease_id',
                'created',
                'created_by',
                'updated',
                'updated_by',
                'diagnosis_date',
                'recovery_date',
                'analysis_date',
                'source_id',
            ],
            [
                [1, 'Пациент', '1971-07-27', '', 'Маяковского, 122-222', 2, 2, 3, 1, NULL, NULL, '2020-05-28 18:43:16', 1, NULL, NULL, NULL, NULL],
                [2, 'Пациент', '1970-05-31', '', 'Маяковского, 122-222', 2, 2, 3, 1, NULL, NULL, '2020-05-28 18:41:54', 1, NULL, NULL, NULL, NULL],
                [8, 'Пациент', '1966-05-21', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 14:36:37', 1, '2020-05-28 18:42:48', 1, NULL, NULL, NULL, NULL],
                [14, 'Пациент', '1992-09-06', '', 'Маяковского, 122-222', 2, 2, 3, 2, '2020-05-28 18:32:45', 1, '2020-05-28 18:44:04', 1, NULL, NULL, NULL, NULL],
                [15, 'Пациент', '1980-04-18', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:33:17', 1, '2020-05-28 18:44:19', 1, NULL, NULL, NULL, NULL],
                [16, 'Пациент', '1990-09-05', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:33:59', 1, '2020-05-28 18:44:32', 1, NULL, NULL, NULL, NULL],
                [17, 'Пациент', '1955-09-10', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:34:20', 1, '2020-05-28 18:44:43', 1, NULL, NULL, NULL, NULL],
                [18, 'Пациент', '1939-09-21', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:34:43', 1, '2020-05-28 18:44:58', 1, NULL, NULL, NULL, NULL],
                [19, 'Пациент', '1949-04-27', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:35:03', 1, '2020-05-28 18:45:17', 1, NULL, NULL, NULL, NULL],
                [20, 'Пациент', '1959-04-12', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:35:24', 1, '2020-05-28 18:45:31', 1, NULL, NULL, NULL, NULL],
                [21, 'Пациент', '1955-10-31', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:35:47', 1, '2020-05-28 18:45:48', 1, NULL, NULL, NULL, NULL],
                [22, 'Пациент', '1981-03-18', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:36:07', 1, '2020-05-28 18:46:01', 1, NULL, NULL, NULL, NULL],
                [23, 'Пациент', '1997-12-27', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:36:30', 1, '2020-05-28 18:46:14', 1, NULL, NULL, NULL, NULL],
                [24, 'Пациент', '1970-09-19', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:36:50', 1, '2020-05-28 18:46:28', 1, NULL, NULL, NULL, NULL],
                [25, 'Пациент', '1965-04-15', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:37:09', 1, '2020-05-28 18:46:41', 1, NULL, NULL, NULL, NULL],
                [26, 'Пациент', '1979-04-22', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:37:32', 1, '2020-05-28 18:46:55', 1, NULL, NULL, NULL, NULL],
                [27, 'Пациент', '1972-03-01', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:37:52', 1, '2020-05-28 18:47:07', 1, NULL, NULL, NULL, NULL],
                [28, 'Пациент', '1982-11-25', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:38:10', 1, '2020-05-28 18:47:24', 1, NULL, NULL, NULL, NULL],
                [29, 'Пациент', '1992-05-28', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:38:31', 1, '2020-05-28 18:47:41', 1, NULL, NULL, NULL, NULL],
                [31, 'Пациент', '1995-12-22', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:39:14', 1, '2020-05-28 18:47:56', 1, NULL, NULL, NULL, NULL],
                [32, 'Пациент', '1977-04-04', '', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:39:53', 1, '2020-05-28 18:48:07', 1, NULL, NULL, NULL, NULL],
                [33, 'Пациент', '1973-07-12', '89995675156', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:48:37', 1, '2020-05-28 18:49:18', 1, NULL, NULL, NULL, NULL],
                [34, 'Пациент', '2020-05-28', '89995675156', 'Маяковского, 122-222', 2, 2, 3, 1, '2020-05-28 18:49:02', 1, '2020-05-28 18:49:02', 1, NULL, NULL, NULL, NULL],
            ],
        );
    }
}
