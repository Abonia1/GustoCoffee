<div class="container mentions-legales">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="produit-titre">
            <h1>Mentions légales</h1>
        </div>
    </div>

    <div class="col-xs-12">
        <p>
            Conformément aux dispositions des Articles 6-III et 19 de la Loi n’2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique dite LCEN
            il est porté à la connaissance des utilisateurs et visiteurs du site les présentes mentions légales.<br><br>
            Le site est accessible à l’adresse suivante : <strong><a href="<?= $data['generale']['site_url']; ?>"><?= $data['generale']['site_url']; ?></a></strong>.<br>
            L’accès et l’utilisation du site sont soumis aux présentes « Mentions légales » détaillées ci-après ainsi qu’aux lois et/ou règlements applicables.<br><br>
            La connexion, l’utilisation et l’accès à ce site impliquent l’acceptation intégrale et sans réserve de l’internaute de toutes les dispositions
            des présentes Mentions Légales.
        </p>


        <h2>INFORMATIONS LÉGALES</h2>

        <p>
            En vertu de l’Article 6 de la Loi n°2004-575 du 21 juin 2004 pour la confiance de l’économie numérique,
            il est précisé dans cet article l’identité des différents intervenants et de son suivi.<br><br>

            Le site est édité par : <strong class="color"><?= $data['informations_legales']['societe']; ?></strong><br><br>

            Domicilié à l’adresse suivante : <?= $data['informations_legales']['adresse']; ?> – <?= $data['informations_legales']['code_postal']; ?> <?= $data['informations_legales']['ville']; ?> – France<br>
            Téléphone : <?= $data['informations_legales']['telephone']; ?><br>
            Adresse mail : <a href="mailto:<?= $data['informations_legales']['adresse_email']; ?>" class="color"><?= $data['informations_legales']['adresse_email']; ?></a><br><br>

            Le Directeur de publication est : <strong class="color"><?= $data['informations_legales']['directeur_publication']; ?></strong><br><br>

            Photographies : <a href="http://www.istockphoto.com/fr" class="color">iStock Photo</a><br><br>

            Sont considérés comme utilisateurs tous les internautes qui naviguent, lisent, visionnent et utilisent le site.
        </p>


        <h2>PROPRIÉTAIRE DU SITE</h2>

        <p>
            Société <strong class="color"><?= $data['proprietaire']['societe']; ?></strong><br>
            <strong><?= $data['proprietaire']['responsable']; ?></strong><br>
            <?= $data['proprietaire']['adresse']; ?><br>
            <?= $data['proprietaire']['code_postal']; ?> <?= $data['proprietaire']['ville']; ?><br>
            <?= $data['proprietaire']['pays']; ?><br>
            Tél : <?= $data['proprietaire']['telephone']; ?><br>
            <?= $data['proprietaire']['rcs']; ?>
        </p>


        <h2>HÉBERGEMENT</h2>

        <p>
            L’hébergement et le stockage des données sont réalisés par la société :<br><br>

            <strong>OVH SAS</strong><br>
            2 rue Kellermann<br>
            BP 80157<br>
            59100 ROUBAIX<br>
            France<br>
            Tél. : 09 72 10 10 07
        </p>


        <h2>COOKIES</h2>

        <p>
            Le site <?= $data['generale']['short_url']; ?> utilise des cookies à des fins de statistiques.
        </p>


        <h2>INFORMATIQUE ET LIBERTÉ</h2>

        <p>
            Les informations recueillies sur le site <?= $data['generale']['short_url']; ?> via les formulaires, sont utilisées à des fins de contact.
            Aucune donnée personnelle n’est transmise à un tiers ou revendue.
            Dans le cadre la loi informatique et liberté vous disposez d’un droit de modification ou de retrait. Pour cela merci de vous adresser à :<br><br>

            <strong>Société <?= $data['proprietaire']['societe']; ?></strong><br>
            <?= $data['proprietaire']['adresse']; ?><br>
            <?= $data['proprietaire']['code_postal']; ?> <?= $data['proprietaire']['ville']; ?><br>
            <?= $data['proprietaire']['pays']; ?>
        </p>
    </div>
</div>
