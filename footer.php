<?php $footer = get_field('footer', 'footer'); ?>

</main>

<footer class="footer" <?php if (get_field('header_footer_enabler', get_the_ID())) : ?> style="display:none;" <?php endif; ?>>
    <div class="container">
        <div class="footer__inner">

        </div>
    </div>

</footer>

<?php
load_template(get_template_directory() . '/components/modals.php', true);
wp_footer(); ?>
</body>
</html>

