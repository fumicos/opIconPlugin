成功です
<?php if($user): ?>
<?php var_dump($user->getUsername()); ?>
<?php else: ?>
そのIDのユーザはいません。
<?php endif; ?>
