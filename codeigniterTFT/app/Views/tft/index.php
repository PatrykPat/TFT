<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/style/index.css">
</head>
<h2>Uw stemming</h2>
<div class="div">

</div>

<?php if (!empty($tft) && is_array($tft)): ?>
    <?php for ($id = 0; $id < count($tft); $id++): ?>
        <div class='tft'>
            <div class="main">

                <!-- Controleren of er een tft is ingevuld -->
                <?php 
                $sql= "DELETE FROM `tft` WHERE `id` = '$id' ";
                
                if($tft[$id]->datum == null): ?>
                    <?php
                    echo ("<a href=/tft/create/".$tft[$id]->id."> vul de ontbrekende gegevens in</a>");
                //    echo '<a href="admin.php?action=delete&id=$id">Delete this!</a>';
                    ?>
                <?php endif; ?>

                <!-- Controleren of er genoeg tfts zijn om het gemiddelde te berekenen -->
                    
            </div>
                <h3><?= esc($tft[$id]->datum) ?></h3>
        </div>
    <?php endfor; ?>

<?php else: ?>

    <h3>No tft</h3>

    <p>Unable to find any tft for you.</p>

<?php endif ?>