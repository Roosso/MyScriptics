/*
 * http://www.black-web.ru
 * http://habrahabr.ru/post/148945/
 * Пользуйтесь, если надо.
 */

$(document).ready(function() {
    /* Placeholder for IE */
    if($.browser.msie) {
        $("form").children("input[type='text']").each(function() {
            var tp = $(this).attr("placeholder");
            if(tp != undefined) $(this).attr('value',tp).css('color','#ccc');
        }).focusin(function() {
            var val = $(this).attr('placeholder');
            if($(this).val() == val) {
                $(this).attr('value','').css('color','#303030');
            }
        }).focusout(function() {
            var val = $(this).attr('placeholder');
            if($(this).val() == "") {
                $(this).attr('value', val).css('color','#ccc');
            }
        });

        /* Protected send form */
        $("form").submit(function() {
            $(this).children("input[type='text']").each(function() {
                var val = $(this).attr('placeholder');
                if($(this).val() == val) {
                    $(this).attr('value','');
                }
            })
        });
    }
});