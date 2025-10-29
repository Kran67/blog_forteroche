<?php 
    /** 
     * Affichage de la partie admin : statistiques des articles. 
     */
?>

<h2>Statistiques des articles</h2>

<div class="container">
    <div class="table-responsive">
        <table class="table table-stats" id="statsTable">
            <thead>
                <tr>
                    <th class="sortable" data-column="title" data-order="asc">
                        Titre
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="sortable" data-column="views" data-order="desc">
                        Nombre de vues
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="sortable" data-column="comments" data-order="desc">
                        Nombre de commentaires
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="sortable" data-column="date" data-order="desc">
                        Date de publication
                        <span class="sort-indicator"></span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articleStat as $stat) { ?>
                    <tr>
                        <td>
                         <?= htmlspecialchars($stat->getTitle()) ?>
                        </td>
                        <td class="center">
                            <?= number_format($stat->getViewsCount(), 0, ',', ' ') ?>
                        </td>
                        <td class="center">
                            <?= number_format($stat->getCommentsCount(), 0, ',', ' ') ?>
                        </td>
                        <td>
                            <?= Utils::convertDateToFrenchFormat($stat->getDateCreation()); ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br />
<a class="submit" href="index.php?action=admin">Retour à l'adminstration des articles</a>
