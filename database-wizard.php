<?php
include_once('utils/database-helpers.php');

$dbConnection = connectToDatabase();
$isDropped = dropDatabase($dbConnection);
$isCreated = createDatabase($dbConnection);
closeDatabaseConnection($dbConnection);
?>

<h1>Database wizard</h1>
<?php if ($isDropped) { ?>[...] Usunięto bazę danych <strong>biblioteka</strong><br><?php } ?>
<?php if ($isCreated) { ?>[...] Stworzono bazę danych <strong>biblioteka</strong><?php } ?>

