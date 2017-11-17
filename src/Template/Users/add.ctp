<h1>ユーザー追加</h1>
<?php
echo $this->Form->create($user);
echo $this->Form->control('name');
echo $this->Form->control('password');
echo $this->Form->button(__('save'));
echo $this->Form->end();
 ?>
