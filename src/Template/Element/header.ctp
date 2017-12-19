<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><?php echo $this->Html->link('NewBookshelf', ['controller' => 'Top', 'action' => 'index']); ?></h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="right">
            <li><?php echo $this->Html->link('漫画検索', ['controller' => 'Search', 'action' => 'index']); ?></li>
            <?php if ($this->request->session()->read('Auth')): ?>
                <li><?php echo $this->Html->link('ようこそ' . h($this->request->session()->read('Auth.User.name')) . 'さん', ['controller' => 'Users', 'action' => 'index']); ?></li>
                <li><?php echo $this->Html->link('ログアウト', ['controller' => 'Users', 'action' => 'logout']); ?></li>
            <?php else: ?>
                <li><?php echo $this->Html->link('ログイン', ['controller' => 'Users', 'action' => 'login']); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
