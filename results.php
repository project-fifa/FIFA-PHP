<?php require 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM matchups WHERE id = $id";
    $query = $db->query($sql);
    $match = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

    <div class="addteam-wrapper">
        <div class="team-display">
            <h2>eindstanden invullen </h2>
            <div class="schedule-display">
                <ul>
                    <form action="playerController.php?id=<?=$id?>" method="post">
                        <input type="hidden" name="type" value="addscore">


                            <h4>thuis team</h4>
                            <input type="number" name="home_score" id="home_score">

                            <h4>uit team</h4>
                            <input type="number" name="away_score" id="away_score">

                            <input type="submit"  id="addscore" value="Verzenden">
                    </form>
                </ul>
            </div>
        </div>
    </div>

<?php require 'footer.php'; ?>
