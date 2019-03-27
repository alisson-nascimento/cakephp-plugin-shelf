<section class="content-header">
    <h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i></li>
            <li><?=__('Log Registro') . ' #' . $log->id;?></li>
        </ol>
        <small>Detalhe</small>
        <div class="pull-right">
            <?=$this->Html->link('Listagem', '/shelf/log', ['class'=>'btn btn-default btn-sm btn-flat'])?>
        </div>
    </h1>
    
</section>
<?php 
    $displayField = \Cake\Core\Configure::read('Log.userDisplayField');
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= __('Modelo Table') ?></dt>
                        <dd>
                            <?= h($log->modelo_table) ?>
                        </dd>
                        <dt><?= __('Modelo Pk') ?></dt>
                        <dd>
                            <?= $this->Number->format($log->modelo_pk) ?>
                        </dd>
                        <dt><?= __('Created By') ?></dt>
                        <dd>
                          <?= $log->has('created_by') ? $log->created_by->{$displayField} : '' ?>
                        </dd>
                        <dt><?= __('Updated By') ?></dt>
                        <dd>
                            <?= $log->has('updated_by') ? $log->updated_by->{$displayField} : '' ?>
                        </dd>
                        <dt><?= __('Deleted') ?></dt>
                        <dd>
                            <?= h($log->deleted) ?>
                        </dd>
                    </dl>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- ./col -->
    </div>
    <!-- div -->

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Atividades') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
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
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
</section> 