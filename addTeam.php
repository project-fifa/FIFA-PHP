<?php require 'header.php'; ?>
<div class="addteam-wrapper">
    <form action="playerController.php" method="post">
    <input type="hidden" name="type" value="addPlayer">
    <div class="addteam-div">
        <div class="team-name">
            <h3>Team Aanmaken</h3>
            <label for="teamName">Mijn Teamnaam is:</label>
            <input type="text" id="teamName" name="teamName">
        </div>
        <div class="new-player">
            <h3>Speler Toevoegen</h3>
            <label for="Name">Volledige Naam:</label>
            <input type="text" id="Name" name="Name">
            <input type="submit" id="addPlayer-button" value="Add">

        </div>
        <div class="team-display">
            <h2>Uw Team Naam</h2>
            <div class="players-display">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
    </form>
</div>
<?php require 'footer.php'; ?>
