jQuery(document).ready(function( $ ) {
    // AJAX
    jQuery("#new_plugin_submit").click(function(event) {
        event.preventDefault();
        fullname = jQuery("#new_plugin_name").val();
        profile = jQuery("#new_plugin_profile").val();

        var data = {
            action: 'new_plugin_find',
            fullname: fullname,
            profile: profile
        }

        jQuery.post( myajax.url, data, function(response) {
            jQuery(".new_plugin_output").html(response);
        });
    });
});