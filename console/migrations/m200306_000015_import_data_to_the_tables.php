<?php

use yii\db\Migration;

/**
 * Class m200306_000015_import_data_to_the_tables
 */
class m200306_000015_import_data_to_the_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // flush tables
        $this->delete('{{%continent}}');
        $this->delete('{{%country}}');

        $this->db->createCommand()->resetSequence('{{%continent}}', 1)->execute();
        $this->db->createCommand()->resetSequence('{{%country}}', 1)->execute();

        // import to the continent table
        $this->insert('{{%continent}}', [
            'name' => 'Азия',
        ]);
        $this->insert('{{%continent}}', [
            'name' => 'Америка',
        ]);
        $this->insert('{{%continent}}', [
            'name' => 'Африка',
        ]);
        $this->insert('{{%continent}}', [
            'name' => 'Европа',
        ]);

        // import to the country table
        $this->insert('{{%country}}', [
            'continent_id' => 1,
            'name' => 'Япония'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 1,
            'name' => 'Индонезия'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 1,
            'name' => 'Индия'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 1,
            'name' => 'Филиппины'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 1,
            'name' => 'Китай'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 2,
            'name' => 'США'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 2,
            'name' => 'Бразилия'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 2,
            'name' => 'Мексика'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 2,
            'name' => 'Аргентина'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 2,
            'name' => 'Перу'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'Египет'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'Нигерия'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'Конго'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'ЮАР'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'Ангола'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'Кения'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 3,
            'name' => 'Танзания'
        ]);

        // import to the city table
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Россия'
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Турция'
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Франция'
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Великобритания'
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Испания'
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Италия'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // flush tables
        $this->delete('{{%continent}}');
        $this->delete('{{%country}}');

        $this->db->createCommand()->resetSequence('{{%continent}}', 1)->execute();
        $this->db->createCommand()->resetSequence('{{%country}}', 1)->execute();
    }
}
