<?php
    /**
     * Ce modèle affiche un article et ses commentaires.
     * Il affiche également un formulaire pour ajouter un commentaire.
     */
?>

<article class="mainArticle">
    <h2> <?= /** @var Article $article */
        Utils::format($article->getTitle()) ?> </h2>
    <span class="quotation">«</span>
    <p><?= Utils::format($article->getContent()) ?></p>

    <div class="footer">
        <span class="info"> Publié le <?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></span>
        <?php if ($article->getDateUpdate() != null) { ?>
            <span class="info"> Modifié le <?= Utils::convertDateToFrenchFormat($article->getDateUpdate()) ?></span>
        <?php } ?>
    </div>
</article>

<div class="comments">
    <h2 class="commentsTitle">Vos Commentaires</h2>
    <?php 
        if (empty($comments)) {
            echo '<p class="info">Aucun commentaire pour cet article.</p>';
        } else {
            echo '<ul>';
            foreach ($comments as $comment) {
                echo '<li>';
                echo '  <div class="commentsAction">';
                echo '    <span class="smiley">☻</span>';
                if (isset($_SESSION) && isset($_SESSION['idUser'])) {
                    echo '<a href="?action=deleteComment&idArticle=' . $article->getId() . '&id=' . $comment->getId() . '" class="delete" title="Supprimer ce commentaire">&#x274C;</a>';
                }
                echo '  </div>';
                echo '  <div class="detailComment">';
                echo '      <h3 class="info">Le ' . Utils::convertDateToFrenchFormat($comment->getDateCreation()) . ", " . Utils::format($comment->getPseudo()) . ' a écrit :</h3>';
                echo '      <p class="content">' . Utils::format($comment->getContent()) . '</p>';
                echo '  </div>';
                echo '</li>';
            }               
            echo '</ul>';
        } 
    ?>

    <form action="index.php" method="post" class="foldedCorner">
        <h2>Commenter</h2>

        <div class="formComment formGrid">
            <label for="pseudo">Pseudonyme</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <label for="content">Commentaire</label>
            <textarea name="content" id="content" required></textarea>

            <input type="hidden" name="action" value="addComment">
            <input type="hidden" name="idArticle" value="<?= $article->getId() ?>">

            <button class="submit">Ajouter un commentaire</button>
        </div>
    </form>
</div>