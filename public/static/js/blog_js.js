/**
 * Created by user on 2017/1/23.
 */
$(window).scroll(function() {
    if($("body").scrollTop() >100) {
        document.getElementById("totop").style="display:block;";
    }
    else
    {
        document.getElementById("totop").style="display:none;";
    }
} );
window.onload=function() {
    $("#totop").click(function () {
        $("body").animate({scrollTop: '0px'}, 300);
    });
}
