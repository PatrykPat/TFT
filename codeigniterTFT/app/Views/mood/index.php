<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/style/index.css">
</head>
<h2>Uw stemming</h2>
<div class="div">

</div>
<?php if (!empty($mood) && is_array($mood)): ?>
    <?php for ($id = 0; $id < count($mood); $id++): ?>
        <div class='mood'>
            <div class="main">

                <!-- Controleren of er een mood is ingevuld -->
                <?php 
                $sql= "DELETE FROM `mood` WHERE `id` = '$id' ";
                
                if($mood[$id]->datum == null): ?>
                    <?php
                    echo ("<a href=/mood/create/".$mood[$id]->id."> vul de ontbrekende gegevens in</a>");
                //    echo '<a href="admin.php?action=delete&id=$id">Delete this!</a>';
                    ?>
                <?php endif; ?>

                <h3>Op een schaal van 1 tot 10 voelde u zich een <?= esc($mood[$id]->mood) ?></h3>

                <!-- Controleren of er genoeg moods zijn om het gemiddelde te berekenen -->
                <?php if ($mood[$id]->mood == NULL): ?>
                    <?php if ($mood[$id - 1]->mood == NULL || $mood[$id + 1]->mood == NULL): ?>
                        <?php echo 'Niet genoeg stemmingen voor het berekenen van het gemiddelde.'; ?>
                    <?php else: ?>
                        <?php
                        $prev = $mood[$id - 1]->mood;
                        $next = $mood[$id + 1]->mood;
                        $mood[$id]->mood = ($prev + $next) / 2;
                        echo ($mood[$id]->mood);
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <h3>Op <?= esc($mood[$id]->plek) ?></h3>
                <h3><?= esc($mood[$id]->datum) ?></h3>

            <img height="200px" width="150px" src='<?php "http://" . $_SERVER['HTTP_HOST'] ?>/images/<?php echo ($mood[$id]->mood); ?>.jpg'>
        </div>
    <?php endfor; ?>

<?php else: ?>

    <h3>No Mood</h3>

    <p>Unable to find any mood for you.</p>

<?php endif ?>