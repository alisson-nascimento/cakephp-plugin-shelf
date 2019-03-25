<section class="content-header">
    <h1>
        <?php echo __('Auditoria Registro') . ' #' . $log->id; ?>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Listagem'), ['action' => 'index'], ['escape' => false]) ?>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title"><?php echo __('Dados'); ?></h3>
                </div>
                <!-- /.box-header -->
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
                            <?= $this->Number->format($log->created_by) ?>
                        </dd>
                        <dt><?= __('Updated By') ?></dt>
                        <dd>
                            <?= $this->Number->format($log->updated_by) ?>
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
</section> 