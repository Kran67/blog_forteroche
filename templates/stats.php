<?php 
    /** 
     * Affichage de la partie admin : statistiques des articles. 
     */
    use App\src\models\ArticleStatManager;
    use App\src\services\Utils;
?>

<h2>Statistiques des articles</h2>

<div class="container">
    <div class="table-responsive">
        <table class="table table-stats" id="statsTable">
            <thead>
                <tr>
                    <th class="sortable">
                        <a href="<?= /** @var string $sortBy */
                        /** @var string $order */
                        ArticleStatManager::getSortUrl('title', $sortBy, $order) ?>" class="sort-link <?= $sortBy === 'title' ? 'active' : '' ?>">
                            Titre<?= ArticleStatManager::getSortIndicator('title', $sortBy, $order) ?>
                        </a>
                    </th>
                    <th class="sortable">
                        <a href="<?= ArticleStatManager::getSortUrl('views_count', $sortBy, $order) ?>" class="sort-link <?= $sortBy === 'views_count' ? 'active' : '' ?>">
                            Nombre de vues<?= ArticleStatManager::getSortIndicator('views_count', $sortBy, $order) ?>
                        </a>                    </th>
                    <th class="sortable">
                        <a href="<?= ArticleStatManager::getSortUrl('comments_count', $sortBy, $order) ?>" class="sort-link <?= $sortBy === 'comments_count' ? 'active' : '' ?>">
                            Nombre de commentaires<?= ArticleStatManager::getSortIndicator('comments_count', $sortBy, $order) ?>
                        </a>
                    </th>
                    <th class="sortable">
                        <a href="<?= ArticleStatManager::getSortUrl('date_creation', $sortBy, $order) ?>" class="sort-link <?= $sortBy === 'date_creation' ? 'active' : '' ?>">
                            Date de publication<?= ArticleStatManager::getSortIndicator('date_creation', $sortBy, $order) ?>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                /** @var array $articleStat */
                foreach ($articleStat as $stat) { ?>
                    <tr>
                        <td>
                         <?= Utils::format($stat->getTitle()) ?>
                        </td>
                        <td>
                            <?= number_format($stat->getViewsCount(), 0, ',', ' ') ?>
                        </td>
                        <td>
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
