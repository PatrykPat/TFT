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
<?php
date_default_timezone_set('Europe/Amsterdam');

// Get the current week and year
$week_number = isset($_GET['week']) ? $_GET['week'] : date('W');
$first_day_of_week = strtotime(date('Y') . 'W' . str_pad($week_number, 2, '0', STR_PAD_LEFT) . '1');
$year = date('Y', $first_day_of_week);
$data = [];
if (isset($array['tijd'])) {
    echo($year);
} else {
    // Key 'tijd' does not exist in the array
}
$tijd = $data['tijd'];

// Create an array of dates for the current week
$date_array = [];
for ($i = 0; $i < 7; $i++) {
    $date_array[] = date('Y-m-d', strtotime('+' . $i . ' days', $first_day_of_week));
}
?>

<table>
    <tr>
        <th></th>
        <?php foreach ($date_array as $date): ?>
            <th><?php echo date('Y-m-d', strtotime($date)); ?></th>
        <?php endforeach; ?>
    </tr>
    <?php for ($i = 0; $i <= 23; $i++): ?>
        <tr>
            <td><?php echo $i.':00'; ?></td>
            <?php for ($j = 0; $j < 7; $j++): ?>
                <?php $is_meeting = false; ?>
                <?php $date = ''; ?>
                <?php if (!empty($date_array) && array_key_exists($j, $date_array)): ?>
                    <?php $date = $date_array[$j]; ?>
                <?php endif; ?>
                <?php foreach ($rooster as $row): ?>
                    <?php
                        $start_time = strtotime($row->tijd);
                        $end_time = strtotime('1 hour', $start_time);
                        if (date('H', $start_time) == $i && date('Y-m-d', $start_time) == $date) {
                            $is_meeting = true;
                            break;
                        }
                    ?>
                <?php endforeach; ?>
                <?php if ($is_meeting): ?>
                    <td style="background-color: orange;"><?php echo $row->datum; ?></td>
                <?php else: ?>
                    <td style="background-color: green;"></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>
</body>
</html>