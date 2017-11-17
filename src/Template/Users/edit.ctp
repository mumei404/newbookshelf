<h1>編集</h1>
<?= $this->Form->create($user) ?>
<?php
echo $this->Form->control('name');
echo $this->Form->control('password');
echo $this->Form->button(__('save'));
echo $this->Form->end();
 ?>
