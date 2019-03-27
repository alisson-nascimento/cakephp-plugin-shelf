<?php
namespace Shelf\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShelfLogRegistro Entity
 *
 * @property int $id
 * @property string $modelo_table
 * @property int $modelo_pk
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 * @property int $created_by
 * @property int $updated_by
 *
 * @property \Shelf\Model\Entity\ShelfLogDetalhe[] $shelf_log_detalhe
 */
class ShelfLogRegistro extends Entity
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
        'modelo_table' => true,
        'modelo_pk' => true,
        'created' => true,
        'deleted' => true,
        'created_by_id' => true,
        'updated_by_id' => true,
        'shelf_log_detalhe' => true,
        'created_by'=>true,
        'updated_by'=>true,
    ];
}
