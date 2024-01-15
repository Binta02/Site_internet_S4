<?php
require 'view_begin.php';
require 'view_header.php';
?>
<div class='liste-prestataire-contrainer'>
    <h1><?= $title ?> </h1>
    <div class="element-recherche">
        <input type="text" id="recherche" name="recherche" placeholder="Rechercher un <?= $title ?>...">
        <button type="submit" class="button-primary"
                onclick="window.location='<?= $buttonLink ?>'">Ajouter
        </button>
    </div>

    <div class="element-block">
        <?php foreach ($person as $p): ?>
            <a href='<?= $cardLink ?>&id=<?= $p['id'] ?>' class="block">
                <h2><?php
                    if (array_key_exists('nom', $p)): echo $p['nom'] . ' ' . $p['prenom']; endif;
                    if (array_key_exists('nom_client', $p) and array_key_exists('telephone_client', $p)): echo $p['nom_client']; endif;
                    if (array_key_exists('nom_composante', $p) and array_key_exists('nom_client', $p)): echo $p['nom_composante']; endif;
                    ?></h2>
                <h3><?php
                    if (array_key_exists('interne', $p)): if ($p['interne']): echo 'Interne';
                    else: echo 'Indépendant'; endif; endif;
                    if (array_key_exists('nom_client', $p) and !array_key_exists('telephone_client', $p)): echo $p['nom_client']; endif;
                    if (array_key_exists('nom_composante', $p) and !array_key_exists('nom_client', $p)): echo $p['nom_composante']; endif;
                    if (array_key_exists('telephone_client', $p)): echo $p['telephone_client']; endif;
                    ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php
require 'view_end.php';
?>
