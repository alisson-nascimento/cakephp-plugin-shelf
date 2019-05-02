<?php
$displayField = \Cake\Core\Configure::read('Log.userDisplayField');
?>

<?php if (!empty($log->shelf_log_detalhe)) : ?>
    <table class="table table-bordered" class="table table-hover">
        <tbody>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Tipo Acao
                </th>
                <th>
                    Created By
                </th>
                <th>
                    Dados Antigos
                </th>
                <th>
                    Criado em
                </th>
            </tr>

            <?php foreach ($log->shelf_log_detalhe as $detalhe) : ?>
                <tr>
                    <td>
                        <?= h($detalhe->id) ?>
                    </td>
                    <td>
                        <?= h($detalhe->tipo_acao) ?>
                    </td>
                    <td>
                        <?= $detalhe->has('created_by') ? $detalhe->created_by->{$displayField} : '' ?>
                    </td>
                    <td>
                        <?= h($detalhe->dados_antigos) ?>
                    </td>
                    <td>
                        <?= h($detalhe->created) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>