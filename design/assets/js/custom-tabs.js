(function ($) {

    var tabs = $(".custom-options-list-li a");

    tabs.click(function () {
        var content = this.hash.replace('/', '');
        tabs.removeClass("active");
        $(this).addClass("active");
        $("#custom-options-content").find('.custom-options-content-div').hide();
        $(content).fadeIn(200);
    });

})(jQuery);