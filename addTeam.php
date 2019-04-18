<?php require 'header.php'; ?>
<div class="addteam-wrapper">

    <div class="addteam-div">
        <div class="team-name">
            <h3>Team Aanmaken</h3>
            <label for="teamName">Mijn Teamnaam is:</label>
            <input type="text" id="teamName" name="teamName">
        </div>
        <div class="new-player">
            <h3>Speler Toevoegen</h3>
            <label for="firstName">Voornaam:</label>
            <input type="text" id="firstName" name="firstName">
            <label for="lastName">Achternaam:</label>
            <input type="text" id="lastName" name="lastName">
            <button type="submit" id="addPlayer-button"><i class="fas fa-angle-right"></i></button>

        </div>
        <div class="team-display">
            <h2>Uw Team Naam</h2>
            <div class="players-display">
                <ul>
                    <li>Sven Steggerda</li>
                    <li>Lionel Messi</li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
