<?php
    nmc_get_template_part( 'partials/section-footer2',['footer' => 1]);
?>

<?php wp_footer(); ?>
<?= tr_options_field('tr_theme_options.script_footer');?>

<div style="visibility: hidden; position: fixed;bottom: -500px;" >
    <svg >
        <defs>
            <linearGradient id="floor_plan_stroke" x1="211.041" y1="440" x2="464.959" y2="765" gradientUnits="userSpaceOnUse">
            <stop stop-color="#CF8D32"/>
            <stop offset="0.148" stop-color="#FFFFC0"/>
            <stop offset="0.332" stop-color="#E0B158"/>
            <stop offset="0.475" stop-color="#FFFFC0"/>
            <stop offset="0.663" stop-color="#CF8C32"/>
            <stop offset="0.822" stop-color="#FFB63D"/>
            <stop offset="1" stop-color="#D99330"/>
            </linearGradient>
        </defs>
       
    </svg>
</div>

</body>
</html>