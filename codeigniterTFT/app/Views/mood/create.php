<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/style/create.css">
</head>
<style>

  </style>
<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/mood/create" method="post">
    <?= csrf_field() ?>

    <label for="datum">datum</label>
    <input type="date" name="datum" value="<?= set_value('datum') ?>">
    <br>

    <!-- <label for="mood">mood</label>
    <textarea name="mood" cols="45" rows="4"><?= set_value('mood') ?></textarea>
    <br> -->

    <label for="mood">kies een mood</label>
  <select id="mood" name="mood" size="4">
    <option <?= set_value('mood') ?>>1</option>
    <option <?= set_value('mood') ?>>2</option>
    <option <?= set_value('mood') ?>>3</option>
    <option <?= set_value('mood') ?>>4</option>
    <option <?= set_value('mood') ?>>5</option>
    <option <?= set_value('mood') ?>>6</option>
    <option <?= set_value('mood') ?>>7</option>
    <option <?= set_value('mood') ?>>8</option>
    <option <?= set_value('mood') ?>>9</option>
    <option <?= set_value('mood') ?>>10</option>
  </select>

  <img src="<?php echo base_url('images/ja.jpg'); ?>" alt=""/>

  <select id="plek" name="plek" size="4">
    <option <?= set_value('plek') ?>>thuis</option>
    <option <?= set_value('plek') ?>>school</option>
    <option <?= set_value('plek') ?>>werk</option>
    <option <?= set_value('plek') ?>>stage</option>
  </select>
    <input type="submit" name="submit" value="Create news item"><br>
    <img width="150px" height="150px" src='<?php "http://".$_SERVER['HTTP_HOST']?>/images/gus.jpg'>
</form>