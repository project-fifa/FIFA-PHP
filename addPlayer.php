<?php
require 'header.php';

if($_SESSION == false) {
    header('location: login.php');
}
$id = $_GET['id'];
$PlayerSql = "SELECT fullName FROM player WHERE teamId = :teamId ";
$prepare =$db->prepare($PlayerSql);
$prepare->execute([
    ':teamId' => $id
]);
$names = $prepare->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="addteam-wrapper">
    <div class="homepage-header">
        <button><a href="index.php"><i class="fas fa-home"></i></a></button>
    </div>
    <form action="playerController.php?id=<?=$id?>" method="post">
    <input type="hidden" name="type" value="addPlayer">
    <div class="addteam-div">
        <div class="new-player">
            <h3>Speler Toevoegen</h3>
            <label for="name">Volledige Naam:</label>
            <input type="text" id="name" name="name">
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

                        echo "<li> {$name['fullName']} </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
</div>
<?php require 'footer.php'; ?>
