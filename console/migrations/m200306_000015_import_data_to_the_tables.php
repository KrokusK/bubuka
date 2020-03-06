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
        $this->delete('{{%city}}');

        $this->db->createCommand()->resetSequence('{{%continent}}', 1)->execute();
        $this->db->createCommand()->resetSequence('{{%country}}', 1)->execute();
        $this->db->createCommand()->resetSequence('{{%city}}', 1)->execute();

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
        $this->insert('{{%country}}', [
            'continent_id' => 4,
            'name' => 'Россия'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 4,
            'name' => 'Турция'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 4,
            'name' => 'Франция'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 4,
            'name' => 'Великобритания'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 4,
            'name' => 'Испания'
        ]);
        $this->insert('{{%country}}', [
            'continent_id' => 4,
            'name' => 'Италия'
        ]);

        // import to the city table
        $this->insert('{{%city}}', [
            'country_id' => 1,
            'name' => 'Токио',
            'population' => 38500
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 2,
            'name' => 'Индонезия',
            'population' => 32275
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 3,
            'name' => 'Дели',
            'population' => 27280
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 4,
            'name' => 'Манила',
            'population' => 24650
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 5,
            'name' => 'Шанхай',
            'population' => 24115
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 3,
            'name' => 'Мумбаи',
            'population' => 23265
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 5,
            'name' => 'Пекин',
            'population' => 21200
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 5,
            'name' => 'Гуанчжоу',
            'population' => 20060
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 1,
            'name' => 'Осака',
            'population' => 17165
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 6,
            'name' => 'Нью-Йорк',
            'population' => 21757
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 7,
            'name' => 'Сан-Пауло',
            'population' => 21100
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 8,
            'name' => 'Мехико',
            'population' => 20500
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 6,
            'name' => 'Лос-Анджелес',
            'population' => 15620
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 9,
            'name' => 'Буэнос-Айрес',
            'population' => 15520
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 10,
            'name' => 'Лима',
            'population' => 11300
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 6,
            'name' => 'Чикаго',
            'population' => 9100
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 6,
            'name' => 'Даллас',
            'population' => 6600
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 6,
            'name' => 'Сан-Хосе',
            'population' => 6500
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 11,
            'name' => 'Каир',
            'population' => 16545
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 12,
            'name' => 'Лагос',
            'population' => 13900
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 13,
            'name' => 'Киншаса',
            'population' => 12500
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 14,
            'name' => 'Йоханнесбург',
            'population' => 9115
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 15,
            'name' => 'Луанда',
            'population' => 7560
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 16,
            'name' => 'Найроби',
            'population' => 5700
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 17,
            'name' => 'Дар-эс-Салам',
            'population' => 4980
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 11,
            'name' => 'Александрия',
            'population' => 4960
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 11,
            'name' => 'Гиза',
            'population' => 3300
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 18,
            'name' => 'Москва',
            'population' => 16855
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 19,
            'name' => 'Стамбул',
            'population' => 13995
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 20,
            'name' => 'Париж',
            'population' => 10900
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 21,
            'name' => 'Лондон',
            'population' => 10500
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 22,
            'name' => 'Мадрид',
            'population' => 6385
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 23,
            'name' => 'Милан',
            'population' => 5200
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 18,
            'name' => 'Санкт-Петербург',
            'population' => 5175
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 19,
            'name' => 'Анкара',
            'population' => 4850
        ]);
        $this->insert('{{%city}}', [
            'country_id' => 22,
            'name' => 'Барселона',
            'population' => 4840
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
        $this->delete('{{%city}}');

        $this->db->createCommand()->resetSequence('{{%continent}}', 1)->execute();
        $this->db->createCommand()->resetSequence('{{%country}}', 1)->execute();
        $this->db->createCommand()->resetSequence('{{%city}}', 1)->execute();
    }
}
