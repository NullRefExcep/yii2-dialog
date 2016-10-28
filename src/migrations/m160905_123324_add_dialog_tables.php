<?php

namespace nullref\dialog\migrations;

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

class m160905_123324_add_dialog_tables extends Migration
{
    use MigrationTrait;

    public $dialogTable = '{{%dialog}}';
    public $userHasDialogTable = '{{%user_has_dialog}}';
    public $dialogMessageTable = '{{%dialog_message}}';

    public function up()
    {
        $this->createTable($this->dialogTable, [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
        ], $this->getTableOptions());


        $this->createTable($this->userHasDialogTable, [
            'user_id' => $this->integer()->notNull(),
            'dialog_id' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        $this->addPrimaryKey('user_has_dialog_pk', $this->userHasDialogTable, ['user_id', 'dialog_id']);

        $this->addForeignKey('fk_user_has_dialog_dialog', $this->userHasDialogTable, 'dialog_id',
            $this->dialogTable, 'id', 'CASCADE', 'CASCADE');


        $this->createTable($this->dialogMessageTable, [
            'id' => $this->bigPrimaryKey(),
            'dialog_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->null()->defaultValue(null),
            'text' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $this->getTableOptions());

        $this->addForeignKey('fk_dialog_message_dialog', $this->dialogMessageTable, 'dialog_id',
            $this->dialogTable, 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_dialog_message_dialog', $this->dialogMessageTable);
        $this->dropTable($this->dialogMessageTable);

        $this->dropForeignKey('fk_user_has_dialog_dialog', $this->userHasDialogTable);

        $this->dropTable($this->userHasDialogTable);

        $this->dropTable($this->dialogTable);
    }

}
