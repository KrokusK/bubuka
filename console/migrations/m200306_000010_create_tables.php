<?php

use yii\db\Migration;

/**
 * Class m200306_000010_create_tables
 */
class m200306_000010_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // create continent table
        $this->createTable('{{%continent}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        // create country table
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'continent_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);

        // creates index for column continent_id
        $this->createIndex(
            'idx-country-continent-id',
            '{{%country}}',
            'continent_id'
        );

        // add foreign key for table profile
        $this->addForeignKey(
            'fk-country-continent-id',
            '{{%country}}',
            'continent_id',
            '{{%continent}}',
            'id',
            'CASCADE'
        );

        // create city table
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'population' => $this->integer()->notNull()
        ]);

        // creates index for column country_id
        $this->createIndex(
            'idx-city-country-id',
            '{{%city}}',
            'country_id'
        );

        // add foreign key for table city
        $this->addForeignKey(
            'fk-city-country-id',
            '{{%city}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table city
        $this->dropForeignKey(
            'idx-city-country-id',
            '{{%city}}',
        );

        // drop index for column country_id
        $this->dropIndex(
            'fk-city-country-id',
            '{{%city}}'
        );

        // drops foreign key for table country
        $this->dropForeignKey(
            'fk-country-continent-id',
            '{{%country}}'
        );

        // drop index for column continent_id
        $this->dropIndex(
            'idx-country-continent-id',
            '{{%country}}'
        );

        // drop profile tables
        $this->dropTable('{{%city}}');
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%continent}}');
    }
}
