<script>
jQuery('.page-sidebar .has-sub > a').click(function () {
            var last = jQuery('.has-sub.open', $('.page-sidebar'));
            last.removeClass("open");
            jQuery('.arrow', last).removeClass("open");
            jQuery('.sub', last).slideUp(200);
                
            var sub = jQuery(this).next();
            if (sub.is(":visible")) {
                jQuery('.arrow', jQuery(this)).removeClass("open");
                jQuery(this).parent().removeClass("open");
                sub.slideUp(200);
            } else {
                jQuery('.arrow', jQuery(this)).addClass("open");
                jQuery(this).parent().addClass("open");
                sub.slideDown(200);
            }
        });
</script>