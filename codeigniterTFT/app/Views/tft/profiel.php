<h1>Edit uw Profiel hier</h1>

<?php if (session()->has('success')): ?>
    <p><?= session('success') ?></p>
<?php endif ?>

<?php
  helper('form');
  echo form_open('profiel', array('method' => 'POST'))
?>

<label for="username">Username:</label>
<input type="text" name="username" value="<?= $user['username'] ?>">
<?php if (isset($validation) && $validation->getError('username')): ?>
    <p><?= $validation->getError('username') ?></p>
<?php endif ?>
<?php if (isset($validation) && $validation->getError('password')): ?>
    <p><?= $validation->getError('password') ?></p>
<?php endif ?>

<label for="email">Email:</label>
<input type="email" name="email" value="<?= $auth_email ?>">
<?php if (isset($validation) && $validation->getError('email')): ?>
    <p><?= $validation->getError('email') ?></p>
<?php endif ?>
<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

<button type="submit" name="update" value="Update">Save changes</button>
