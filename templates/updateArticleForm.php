<?php 
    /** 
     * Modèle du formulaire de mise à jour / creation d'un article.
     */
?>

<form action="index.php" method="post" class="foldedCorner">
    <h2><?= /** @var Article $article */
        $article->getId() == -1 ? "Création d'un article" : "Modification de l'article "?></h2>
    <div class="formGrid">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?= $article->getTitle() ?>" required>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10" required><?= $article->getContent() ?></textarea>
        <input type="hidden" name="action" value="updateArticle">
        <input type="hidden" name="id" value="<?= $article->getId() ?>">
        <button class="submit"><?= $article->getId() == -1 ? "Ajouter" : "Modifier" ?></button>
    </div>
</form>

<script>

    
    

</script>