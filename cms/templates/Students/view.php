<?php echo $this->Html->css("bootstrap.min.css"); ?>
<?php echo $this->Html->css("bootstrap-grid.min.css"); ?>


<h3>Studentengegevens:</h3>
<p><?= h($student->naam) ?></p>
<p><?= h($student->adres) ?></p>
<p><?= h($student->telefoon) ?> </p>

<?= $this->Html->link("<i class='fa fa-plus-circle'></i> Nieuwe score", ['controller' => 'Scores', 'action' => 'add'], [ 'escape' => false, 'class' => 'btn btn-success btn-marg']) ?>



<div class="table-responsive">
    <table class="table  table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vak</th>
                <th scope="col">Score</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student->scores as $score) : ?>

                <tr>
                    <th scope="row"> <?= $score->id ?> </th>
                    <td><?= $score->vak ?></td>
                    <td><?= $score->score ?></td>
                    <td>
                        <?= $this->Form->postLink(
                            '<i class="fa fa-trash"></i> ',
                            ['controller' => 'Scores', 'action' => 'delete', $score->id],
                            [
                                'escape' => false,
                                'class' => 'btn btn-danger',
                                'confirm' => __('Bent u zeker dat u de score {0} voor het vak {1} wil verwijderen?', $score->score, $score->vak)
                            ]
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>