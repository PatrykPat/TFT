<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/style/index.css">
</head>
<style>

  </style>
<form action="" method="post">
<?= csrf_field() ?>

  <label for="title"> kies wat u wilt gaan doen</label>
  <select value="<?= set_value('omschrijving') ?>" name="title" id ="title">
    <option value="kickboxen">kickboxen</option>
    <option value="fitness">fitness</option>
  </select>
<br>
  voer het aantal deelnemers toe<br>
  <input value="<?= set_value('deelnemers') ?>" type="number" max="20" name="" />
  <br>
  Instructeur naam:
  <input name="body" value='<?php echo (auth()->user()->username) ?>' disabled><br>
  Kies een tijdstip met een datum:
  <input type="date">
  <input type="time">
  <br>

  <input type="submit" name="submit" value="Voeg de les toe">
</form>

