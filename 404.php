<?php get_header(); ?>
<div class="site-content">
    <div class="main-content">
        <?php $lang = strtolower(get_locale()); ?> 
                    <article id="post-not-found">
                <header>
                    <?php if ($lang == "en_us") : ?>
                        <h1>Error 404: The site you are looking for could unfortunately not be found.</h1>
                        <p>Please check the URL, return to our home page or send us your questions by email to <a href="mail@spraachen.de">mail@spraachen.de</a>.</p>
                        <p>Thank you</p>
                    <?php elseif ($lang == "de_de") : ?>
                        <h1>Fehler 404: Die Seite, nach der Sie suchen, konnte leider nicht gefunden werden. </h1>
                        <p>
                            Bitte überprüfen Sie die URL, kehren Sie zur Startseite zurück oder stellen Sie uns Ihre Fragen in einer E-Mail an <a href="mail@spraachen.de">mail@spraachen.de</a>.
                            
                        </p>
                        <p>Vielen Dank!</p>
                    <?php endif; ?>
                </header>
            </article>
    </div>
</div>

<?php get_footer(); ?>
