<h1>ユーザ一覧</h1>
<?php echo $this->Html->link('ユーザ登録', 'users/add'); ?>
<?php foreach ($users as $user): ?>
    <h1><?php echo $user->name; ?></h1>
    <?php echo $this->Html->link('編集', ['controller' => 'Users', 'action' => 'edit', $user->id]); ?>
<?php endforeach; ?>
