<?php require 'header.php';
$id =($_GET['id']);
$sql = "SELECT * FROM users WHERE id = :id";
?>

<div class="addteam-wrapper">
    <form action="playerController.php?id=<?=$id?>" method="post">
        <input type="hidden" name="type" value="addTeam">
        <div class="addteam-div">
            <div class="new-player">
                <h3>Team Toevoegen</h3>
                <label for="Name">Naam:</label>
                <input type="text" id="Name" name="Name">
                <input type="submit" id="addPlayer-button" value=">">
            </div>
        </div>
    </form>
</div>
<?php require 'footer.php'; ?>