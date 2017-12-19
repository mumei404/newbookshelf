<h1><?php echo h($user['name']); ?></h1>
<a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'edit', $user['id']]); ?>"><button>編集</button></a>
<button><?php echo $this->Form->postLink('削除', ['controller' => 'Users', 'action' => 'delete', $user['id']]); ?></button>
