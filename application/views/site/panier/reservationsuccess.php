<div class="container">
    <section class="contact">
    <?php if(isset($date) && isset($time) && isset($quantity) && isset($duree) && isset($tbnumber)): ?>
        <h1>Merci de reservez votre place en avance</h1>
        
        <p>Vous avez bien réservé votre place et un courrier a été envoyé à votre adresse e-mail concernant les détails de la réservation. Consultez toutes vos commandes à partir <a href="<?= site_url('profil/commandes'); ?>">d'ici</a>
        </p>
    
        <p>Merci d'utiliser Gustocoffee.fr A bientôt</p>
        <?php endif; ?>
    </section>
</div>