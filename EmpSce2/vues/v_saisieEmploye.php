<?php include_once('v_entete.php');?>

<div class="container">
    <h2>Ajout d'un employé</H2>

    <form action="index.php?page=ajoutEmploye" method="post">
        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule : </label>
            <input type="text" class="form-control" name="matricule" size=4 /><br />
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom : </label>
            <input type="text" class="form-control" name="nom" size=50 /><br />
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom : </label>
            <input type="text" class="form-control" name="prenom" size=50 /><br />
        </div>
        <div class="mb-3">
            <label for="service" class="form-label">Service : </label>
            <?php
                echo '<select class="form-control" name="service" size="1">';
                foreach ($this->data['lesServices'] as $unService)
                {
                    echo '<option value="'.$unService->GetCode().'">'.
                        $unService->GetDesignation().'</option>';
                }
                echo '</select>';
            ?>
        </div>
        <hr />
        <input type="submit" class="btn btn-primary" value = "Enregistrer" />
    </form>

</div>
<?php include_once('v_piedPage.php');?>