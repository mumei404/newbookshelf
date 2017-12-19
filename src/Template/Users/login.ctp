<h1>ログイン</h1>
<?php echo $this->Form->create(); ?>
<?php echo $this->Form->control('name'); ?>
<?php echo $this->Form->control('password'); ?>
<?php echo $this->Form->button('ログイン'); ?>
<?php echo $this->Form->end(); ?>
<hr />
<a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'add']); ?>"><button>ユーザ登録</button></a>
