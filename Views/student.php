<?php
/**
 * Created by IntelliJ IDEA.
 * User: marc
 * Date: 13/06/17
 * Time: 15:11
 */

require_once 'Object/Database/database.php';

if (isset($_GET['year'])) {
    $students = find('etudiant', [
        'annee' => (int) $_GET['year']
    ], ['nom' => 'ASC', 'prenom' => 'ASC']);
}

?>

<div class="row">
    <div class="medium-12 columns">
        <table class="stack">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['nom'] ?></td>
                        <td><?= $student['prenom'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>