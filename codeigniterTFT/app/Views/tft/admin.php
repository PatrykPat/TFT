<?php if(auth()->user()->role == "klant"):
  echo '<nav>
  <ul>
  <li><a href="/">Home</a></li>
  </ul>
</nav>';?>

<?php endif; ?>
<?php
if(auth()->user() && auth()->user()->role == "admin"){
    echo("<h2>Hier kunt u de rollen van gebruikers aanpasesen.</h2>");
    if($users) {
        foreach($users as $user): ?>
            <div class="container">
                <div class="users">
                    <?php
                    echo("naam: ". $user->username. '<br>');
                    echo("email: ". $user->secret . '<br>');
                    echo("rol: ". $user->role);
                    ?>
                </div>
            </div><?php
        endforeach;
    }
}
if(auth()->user()->role == "instructeur"){
    echo("<h2> Maak hier uw lessen aan</h2>");
    // include("create.php");
    
}
?>