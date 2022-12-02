<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m221202_145014_criar_table_cursos
 */
class m221202_145014_criar_table_cursos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cursos', [
            'codigo_curso' => 'pk',
            'data_inicio' => Schema::TYPE_DATE . ' NOT NULL',
            'data_termino' => Schema::TYPE_DATE . ' NOT NULL',
            'qtd_turma' => Schema::TYPE_INTEGER,
            'codigo_categoria' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addForeignKey('FK_cursos_categorias', 'cursos', 'codigo_categoria', 'categorias', 'codigo_categoria');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_cursos_categorias', 'cursos');
        $this->dropTable('cursos');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221202_145014_criar_table_cursos cannot be reverted.\n";

        return false;
    }
    */
}
