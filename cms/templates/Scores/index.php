<?php echo $this->Html->css("bootstrap.min.css"); ?>
<?php echo $this->Html->css("bootstrap-grid.min.css"); ?>


<h1>Overzicht scores</h1>
<?= $this->Html->link("<i class='fa fa-plus-circle'></i> Nieuw", ['controller' => 'Scores', 'action' => 'add'], ['escape' => false, 'class' => 'btn btn-success btn-marg']) ?>


<div class="table-responsive">
    <table class="table  table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vak</th>
                <th scope="col">Student</th>
                <th scope="col">Score</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $score) : ?>

                <tr>
                    <th scope="row"> <?= $score->id ?> </th>
                    <td><?= $score->vak ?></td>
                    <td><?= $score->student->naam ?></td>
                    <td><?= $score->score ?></td>
                    <td>
                        <?= $this->Form->postLink(
                            '<i class="fa fa-trash"></i> ',
                            ['action' => 'delete', $score->id],
                            [
                                'escape' => false,
                                'class' => 'btn btn-danger',
                                'confirm' => __('Bent u zeker dat u voor de student {0} de score van {1} voor het vak {2} wil verwijderen?', $score->student->naam, $score->score, $score->vak)
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