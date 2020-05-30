<?php echo $this->Html->css("bootstrap.min.css"); ?>
<?php echo $this->Html->css("bootstrap-grid.min.css"); ?>


<h1 class="center">Student toevoegen</h1>

<div class="d-flex justify-content-center">
    <?php
    echo $this->Form->create($student);
    // Hard code the user for now.
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('naam', ['class' => 'form-control']);
    echo $this->Form->control('adres', ['class' => 'form-control']);
    echo $this->Form->control('telefoon', ['class' => 'form-control']);
    echo $this->Form->button(__('Opslaan'), ['class' => 'btn btn-primary btn-margin']);
    echo $this->Form->end();
    ?>
</div>