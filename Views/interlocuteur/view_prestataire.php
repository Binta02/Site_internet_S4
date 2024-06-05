<?php
require 'Views/view_begin.php';
require 'Views/view_header.php';
?>

<section class="main">
    <div class="main-body">
        <div class="search-box">
            <form action="<?= $rechercheLink ?>" method="post" class="search_form">
                <input name="recherche" type="text" placeholder="Rechercher une <?= strtolower($title) ?>..." value="<?php if (isset($val_rech)) {
                      echo htmlspecialchars($val_rech);
                  } ?>">
                <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="cancel-icon">
                    <i class="fas fa-times"></i>
                </div>
                <div class="search-data">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <p>Il y a  <span><?= isset($person) && is_array($person) ? count($person) : 0 ?></span>
            <?= htmlspecialchars($title) ?></p>
    </div>
    <div id="errorMessage" style="display: none;"></div>

    <?php if (is_string($person)): ?>
        <p class=""><?= htmlspecialchars($person); ?></p>
    <?php elseif (isset($person) && !empty($person)): ?>
        <?php foreach ($person as $p): ?>
            <div class="job_card">
                <div class="job_details">
                    <div class="img">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text">
                            <div  class="block">
                                <h2>
                                <?= htmlspecialchars($p['nom'] . '' . $p['prenom']); ?>
                                </h2>
                                <span>
                                    <?= htmlspecialchars('mail : '. $p['mail']); ?>
                                    </br>
                                    <?= htmlspecialchars('téléphone : ' . $p['telephone']); ?>
                                </span>
                                </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (
        ((strstr($_GET['controller'], 'gestionnaire') || strstr($_GET['controller'], 'administrateur')) && !isset($_GET['id']))
        || ((strstr($_GET['controller'], 'prestataire') && isset($person[0]['id_bdl'])))
    ): ?>
        <!-- Ajoutez du contenu ici si nécessaire -->
    <?php endif; ?>
</section>

<script>
    <?php if (isset($bdl) && count($bdl) == 0): ?>
        document.getElementById('errorMessage').innerHTML = 'Aucun prestataires trouvé pour cet ID.';
        document.getElementById('errorMessage').style.display = 'block';
    <?php endif; ?>
</script>

<?php require 'Views/view_end.php'; ?>
