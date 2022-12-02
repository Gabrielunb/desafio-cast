<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m221202_144909_criar_table_categorias
 */
class m221202_144909_criar_table_categorias extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categorias', [
            'codigo_categoria' => 'pk',
            'descricao' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
        $this->insert('categorias', ['descricao' => 'Comportamental']);
        $this->insert('categorias', ['descricao' => 'Programação']);
        $this->insert('categorias', ['descricao' => 'Qualidade']);
        $this->insert('categorias', ['descricao' => 'Processos']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categorias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221202_144909_criar_table_categorias cannot be reverted.\n";

        return false;
    }
    */
}
