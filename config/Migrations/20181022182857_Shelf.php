<?php
use Migrations\AbstractMigration;

class Shelf extends AbstractMigration
{
    public function up()
    {

        $this->table('shelf_log_registro')
        ->addColumn('modelo_table', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('modelo_pk', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addColumn('created_by', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ])
        ->addColumn('updated_by', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ])
        ->addColumn('created', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('deleted', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ])            
        ->create();

        $this->table('shelf_log_detalhe')
            ->addColumn('shelf_log_registro_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tipo_acao', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('dados_antigos', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_by', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])            
            ->addIndex(
                [
                    'shelf_log_registro_id',
                ]
            )
            ->create();

        $this->table('shelf_log_detalhe')
            ->addForeignKey(
                'shelf_log_registro_id',
                'shelf_log_registro',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('shelf_log_detalhe')
            ->dropForeignKey(
                'shelf_log_registro_id'
            )->save();

        $this->table('auditoria_logs')->drop()->save();
        $this->table('shelf_log_registro')->drop()->save();
    }
}
