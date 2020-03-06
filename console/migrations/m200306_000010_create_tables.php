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
            'name' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);

        // create country table
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'continent_id' => $this->integer()->notNull(),
            'capital' => $this->string()->notNull(),
            'population' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
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
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%continent}}');
    }
}
