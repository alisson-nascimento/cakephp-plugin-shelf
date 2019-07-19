<?php 

use Cake\Error\Debugger; 

?>
<h2><?='Localization terms translated' ?></h2>

<?php if (!empty($content)): ?>
<table cellspacing="0" cellpadding="0" class="debug-table">
    <thead>
        <tr>
            <th><?='Constant' ?></th>
            <th><?='Value' ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($content as $key => $val): ?>
        <tr>
            <td><?= h($key) ?></td>
            <td><?= h(Debugger::exportVar($val)) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<div class="warning">
    <?= 'No localization terms translated' ?>
</div>
<?php endif; ?>