<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  table {
    border-collapse: collapse;
    border: 1px solid black;
    width: 100%;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: lightgray;
    font-weight: bold;
  }
</style>
<body>
    <table>
  <thead>
    <tr>
      <th>Time</th>
      <th>Monday</th>
      <th>Tuesday</th>
      <th>Wednesday</th>
      <th>Thursday</th>
      <th>Friday</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>09:00</td>
      <?php $lesson = get_lesson(9, 1); ?>
      <?php if ($lesson) { ?>
        <td><?= $lesson ?></td>
      <?php } else { ?>
        <td>&nbsp;</td>
      <?php } ?>
      <?php $lesson = get_lesson(9, 2); ?>
      <?php if ($lesson) { ?>
        <td><?= $lesson ?></td>
      <?php } else { ?>
        <td>&nbsp;</td>
      <?php } ?>
      <?php $lesson = get_lesson(9, 3); ?>
      <?php if ($lesson) { ?>
        <td><?= $lesson ?></td>
      <?php } else { ?>
        <td>&nbsp;</td>
      <?php } ?>
      <?php $lesson = get_lesson(9, 4); ?>
      <?php if ($lesson) { ?>
        <td><?= $lesson ?></td>
      <?php } else { ?>
        <td>&nbsp;</td>
      <?php } ?>
      <?php $lesson = get_lesson(9, 5); ?>
      <?php if ($lesson) { ?>
        <td><?= $lesson ?></td>
      <?php } else { ?>
        <td>&nbsp;</td>
      <?php } ?>
    </tr>
    <!-- repeat the above row for each time slot from 10:00 to 17:00 -->
  </tbody>
</table>
        <tbody>
            <?php foreach ($lessons as $lesson): ?>
                <?php $time = $lesson['tijd']; ?>
                <tr>
                    <td><?= $time ?></td>
                    <td><?= ($lesson['dag'] == 'Maandag') ? $lesson['Instructeur'] : '' ?></td>
                    <td><?= ($lesson['dag'] == 'Dinsdag') ? $lesson['Instructeur'] : '' ?></td>
                    <td><?= ($lesson['dag'] == 'Woensdag') ? $lesson['Instructeur'] : '' ?></td>
                    <td><?= ($lesson['dag'] == 'Donderdag') ? $lesson['Instructeur'] : '' ?></td>
                    <td><?= ($lesson['dag'] == 'Vrijdag') ? $lesson['Instructeur'] : '' ?></td>
                    <td><?= ($lesson['dag'] == 'Zaterdag') ? $lesson['Instructeur'] : '' ?></td>
                    <td><?= ($lesson['dag'] == 'Zondag') ? $lesson['Instructeur'] : '' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>