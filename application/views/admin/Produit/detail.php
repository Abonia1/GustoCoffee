<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-eyedropper">
                </i>
                <strong>Détail produit</strong>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <tr>
                        <td colspan="4" class="text-left">
                            Nom de Produit
                        </td>
                        <td class="text-left">
                            <strong><?=  $produit->nom; ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-left">
                            Description Courte
                        </td>
                        <td class="text-left">
                            <strong><?= $produit->description_courte; ?></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>
                                Description de l'Accueil
                            </h5>
                            <hr>
                            <p>
                                <?= $produit->description_longue; ?></p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <h5>
                                    Image du produit
                                </h5>
                                <hr>
                                <?php if($produit->image != NULL) : ?>
                                <img class="img-fluid" src="
<?= site_url('assets/images/produit/accueil/'.$produit->image); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
