<?php
require 'header.php';
$PlayerSql = "SELECT fullName FROM player";
$query = $db->query($PlayerSql);
$names = $query->fetch(PDO::FETCH_ASSOC);

$id = $_GET['id'];
?>
<div class="addteam-wrapper">
    <form action="playerController.php?id=<?=$id?>" method="post">
    <input type="hidden" name="type" value="addPlayer">
    <div class="addteam-div">
        <div class="new-player">
            <h3>Speler Toevoegen</h3>
            <label for="name">Volledige Naam:</label>
            <input type="text" id="name" name="Name">
            <input type="submit" id="addPlayer-button" value=">">

        </div>
    </form>
        <div class="team-display">
            <h2>Uw team naam: </h2>
            <div class="players-display">
                <ul>
                    <?php
                    foreach ($names as $name)
                    {
                        echo "<li>$name</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
</div>
<?php require 'footer.php'; ?>
