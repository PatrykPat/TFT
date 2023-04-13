<?php if(auth()->user()->role == "klant"): 
  echo '
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
    </ul>
  </nav>';?>
<?php endif; ?>


<<<<<<< Updated upstream
  </style>
<h2><?= esc($title) ?></h2>
=======
<form action="" method="post">
<?= csrf_field() ?>
>>>>>>> Stashed changes

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/tft/create" method="post">
    <?= csrf_field() ?>

    <label for="datum">datum</label>
    <input type="date" name="datum" value="<?= set_value('datum') ?>">
    <br>

    <!-- <label for="tft">tft</label>
    <textarea name="tft" cols="45" rows="4"><?= set_value('tft') ?></textarea>
    <br> -->

    <label for="tft">kies een tft</label>
  <select id="tft" name="tft" size="4">
    <option <?= set_value('tft') ?>>1</option>
    <option <?= set_value('tft') ?>>2</option>
    <option <?= set_value('tft') ?>>3</option>
    <option <?= set_value('tft') ?>>4</option>
    <option <?= set_value('tft') ?>>5</option>
    <option <?= set_value('tft') ?>>6</option>
    <option <?= set_value('tft') ?>>7</option>
    <option <?= set_value('tft') ?>>8</option>
    <option <?= set_value('tft') ?>>9</option>
    <option <?= set_value('tft') ?>>10</option>
  </select>
<<<<<<< Updated upstream
=======
<br>
  voer het aantal deelnemers toe<br>
  <input value="<?= set_value('deelnemers') ?>" type="number" max="20" name="" />
  <br>
  Instructeur naam:
  <input name="body" value='<?php echo (auth()->user()->username) ?>' disabled><br>
  Kies een Datum:
  <input type="date"><br>
  En een tijdstip:
  <input type="time">
  <br>
>>>>>>> Stashed changes

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