<?php echo $this->Html->css("bootstrap.min.css"); ?>
<?php echo $this->Html->css("bootstrap-grid.min.css"); ?>


<h1 class="center">Score toevoegen</h1>

<div class="d-flex justify-content-center">
    <?php
    echo $this->Form->create($score);
    // Hard code the user for now.
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('vak', ['class' => 'form-control']);
    echo $this->Form->label('Student');
    echo $this->Form->select('studenten_id', array('select'=>$studentsArray), ['class' => 'form-control']);
    echo $this->Form->control('score', ['class' => 'form-control']);
    echo $this->Form->button(__('Opslaan'), ['class' => 'btn btn-primary btn-margin']);
    echo $this->Form->end();
    ?>
</div>