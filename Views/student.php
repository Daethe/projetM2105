<?php
/**
 * Created by IntelliJ IDEA.
 * User: marc
 * Date: 13/06/17
 * Time: 15:11
 */

require_once 'Object/Database/database.php';

if (isset($_GET['year']) && isset($_GET['group'])) {
    $students = find('etudiant', [
        'annee' => (int) $_GET['year'],
        'groupe' => $_GET['group']
    ], [
        'nom' => 'ASC',
        'prenom' => 'ASC'
    ]);
} else if (isset($_GET['year'])) {
    $students = find('etudiant', [
        'annee' => (int) $_GET['year']
    ], [
        'nom' => 'ASC',
        'prenom' => 'ASC'
    ]);
}

?>

<div class="row">
    <div class="medium-12 columns">
        <table class="stack">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="post">
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['nom'] ?></td>
                        <td><?= $student['prenom'] ?></td>
                        <td><input type="checkbox" name="absent<?= $student["id"] ?>"></td>
                    </tr>
                <?php endforeach; ?>
                </form>
            </tbody>
        </table>
    </div>
</div>