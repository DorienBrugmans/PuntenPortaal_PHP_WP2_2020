<?php echo $this->Html->css("bootstrap.min.css"); ?>
<?php echo $this->Html->css("bootstrap-grid.min.css"); ?>


<h1>Studenten</h1>
<?= $this->Html->link("<i class='fa fa-plus-circle'></i> Nieuw", ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-success btn-marg']) ?>


<div class="table-responsive">
    <table class="table  table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Adres</th>
                <th scope="col">Telefoon</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>

                <tr>
                    <th scope="row"> <?= $student->id ?> </th>
                    <td><?= $this->Html->link($student->naam, ['action' => 'view', $student->id]) ?></td>
                    <td><?= $student->adres ?></td>
                    <td><?= $student->telefoon ?></td>
                    <td>
                        <?= $this->Form->postLink(
                            '<i class="fa fa-trash"></i> ',
                            ['action' => 'delete', $student->id],
                            [
                                'escape' => false,
                                'class' => 'btn btn-danger',
                                'confirm' => __('Bent u zeker dat u student {0} wil verwijderen?', $student->naam)
                            ]
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <ul class="pagination">
        <?= $this->Paginator->prev("<<") ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(">>") ?>
    </ul>
</div>