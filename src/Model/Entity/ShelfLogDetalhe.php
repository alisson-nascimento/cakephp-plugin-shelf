<?php
namespace Shelf\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShelfLogDetalhe Entity
 *
 * @property int $id
 * @property int $shelf_log_registro_id
 * @property string $tipo_acao
 * @property \Cake\I18n\FrozenTime $created
 * @property int $created_by
 * @property string $dados_antigos
 *
 * @property \Shelf\Model\Entity\ShelfLOgRegistro $shelf_log_registro
 */
class ShelfLogDetalhe extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'shelf_log_registro_id' => true,
        'tipo_acao' => true,
        'created' => true,
        'created_by' => true,
        'dados_antigos' => true,
        'shelf_log_registro' => true
    ];
}
