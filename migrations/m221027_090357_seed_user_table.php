<?php

use yii\db\Migration;

/**
 * Class m221027_090357_seed_user_table
 */
class m221027_090357_seed_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insertFakeUsers();
    }

    private function insertFakeUsers()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 55; $i++) {
            $this->insert(
                'user',
                [
                    'name' => $faker->name,
                    'email' => $faker->unique()->email,
                    'phone' => $faker->phoneNumber,
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221027_090357_seed_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221027_090357_seed_user_table cannot be reverted.\n";

        return false;
    }
    */
}
