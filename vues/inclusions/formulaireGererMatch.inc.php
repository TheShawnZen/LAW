<?php
include_once(DOSSIER_BASE_INCLUDE . "modele/DAO/SaisonDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "modele/DAO/MatchsDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE . "modele/DAO/EquipeDAO.class.php");
?>
<h1>Opérations</h1>
<div class="formulaire">
    <form action="" method="post">
        <?php
        $tabSaisons = SaisonDAO::chercherTous();
        $tabMatchs = MatchsDAO::chercherTous();
        $tabEquipes = EquipeDAO::chercherTous();
        ?>
        <input class="radio" type="radio" name="operation" value="ajouter" checked="checked">Ajouter un match <br />
        <input class="radio" type="radio" name="operation" value="supprimer">Supprimer un match existant<br /><br />

        <label for="id">ID</label>
        <input id="id" name="id" type="text" size="30" />
        <br>
        <label for="sessionlaw">Session</label>
        <select id="sessionlaw" name="sessionlaw">
            <?php foreach ($tabSaisons as $saisons => $s) { ?>
                <option value="<?php echo $s->getSession() ?>"><?php echo $s->getSession() ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="idDomicile">Équipe Domicile (ID)</label>
        <select id="idDomicile" name="idDomicile">
            <?php foreach ($tabEquipes as $equipe => $e) { ?>
                <option value="<?php echo $e->getId() ?>"><?php echo $e->getId() ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="idVisiteur">Équipe Visiteur (ID)</label>
        <select id="idVisiteur" name="idVisiteur">
            <?php foreach ($tabEquipes as $equipe => $e) { ?>
                <option value="<?php echo $e->getId() ?>"><?php echo $e->getId() ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="datematch">Date</label>
        <input id="datematch" name="datematch" type="datetime-local" size="30" />
        <br>
        <input type="Submit" value="Effectuer" />
        <br>
        <h2>Mise à jour</h2>
        <input class="radio" type="radio" name="operation" value="update">Mettre à jour score<br />
        <label for="idmatch">ID</label>
        <select id="idmatch" name="idmatch">
            <?php foreach ($tabMatchs as $matchs => $m) { ?>
                <option value="<?php echo $m->getId() ?>"><?php echo $m->getId() ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="scoredomicile">Score Domicile</label>
        <input id="scoredomicile" name="scoredomicile" type="text" size="30" />
        <br>
        <label for="scorevisiteur">Score Visiteur</label>
        <input id="scorevisiteur" name="scorevisiteur" type="text" size="30" />
        <br>
        <label for="matchfini">Match fini</label>
        <input class="radio" type="radio" name="matchfini" value="oui" checked="checked">oui
        <input class="radio" type="radio" name="matchfini" value="non">non</br>
        <input type="Submit" value="Mettre à jour" />
    </form>
</div>