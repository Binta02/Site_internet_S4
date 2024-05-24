<!-- Vue permettant de faire la liste d'un type de personne -->
<?php
require 'Views/view_begin.php';
require 'Views/view_header.php';
?>
<section class="main">
    <div class="main-body">
        <div class="box">
            <form action="<?= $rechercheLink ?>" method="post" class="search_form">
                <input type="checkbox" id="check">
                <div class="search-box">
                    <?php if (!empty($buttonLink)): ?>
                        <button type="button" class="button-primary font"
                            onclick="window.location='<?= htmlspecialchars($buttonLink) ?>'">Ajouter</button>
                    <?php endif; ?>
                    <input name="recherche" type="text" placeholder="Rechercher une <?= strtolower($title) ?>..." value="<?php if (isset($val_rech)) {
                          echo htmlspecialchars($val_rech);
                      } ?>">
                    <label for="check" class="icon">
                        <i class="fas fa-search"></i>
                    </label>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <p>Il y a plus de <span><?= count($person) ?></span> <?= strtolower($title) ?></p>
    </div>
    <h1>
        <!-- TODO Binta tu peux mettre une classe qui affiche ca un peu mieux stp -->
        <?php if (isset($message)) {
            echo $message;
        } ?>
    </h1>

    <div class="element-block">
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
                            <a href='<?= $cardLink ?>&id=<?php if (isset($p['id_personne'])):
                                  echo htmlspecialchars($p['id_personne']);
                              endif; ?>' class="block">
                                <h2>
                                    <?php if (array_key_exists('nom', $p)): ?>
                                        <?= htmlspecialchars($p['nom'] . ' ' . $p['prenom']); ?>
                                    <?php endif; ?>
                                </h2>
                                <span>
                                    <?php if (array_key_exists('mail', $p)): ?>
                                        <?= htmlspecialchars($p['mail']); ?>
                                    <?php endif; ?>
                                </span>

                            </a>
                        </div>
                    </div>
                    <div class="job_action">
                        <span>
                            <?php if (array_key_exists('telephone', $p)): ?>
                                <?= htmlspecialchars($p['telephone']); ?>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="job_salary">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span>Voir BDL</span>
                    </div>

                </div>

            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (
            ((str_contains($_GET['controller'], 'gestionnaire') || str_contains($_GET['controller'], 'administrateur')) && !isset($_GET['id']))
            || ((str_contains($_GET['controller'], 'prestataire') && isset($person[0]['id_bdl'])))
        ): ?>

        <?php endif; ?>
    </div>
    </div>
</section>

<?php
require 'Views/view_end.php';
?>