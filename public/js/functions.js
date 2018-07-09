
   var notification = (function(title_data, text_data) {
        var number = Math.floor((Math.random() * 10000) + 1);
        var not = '<div class="alert dispalay-none alert-info alert-dismissible" id = "remove-' + number + '">';
        not += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        not += title_data;
        not += text_data;
        not += '</div>';
        $('#panel_notifications').append(not);
        $('#remove-' + number).show("slow", function() {
            $('#remove-' + number).removeClass("in").show();
            $(this).css('display', 'block');
            $('#remove-' + number).delay(200).addClass("in").fadeOut(20000, function() {
                if ($('#remove-' + number).css('display', 'none')) {
                    $(this).remove();
                }

            });
        });

        $('#remove-' + number).mouseover(function() {
            $(this).css('display', 'block');
            $(this).css('opacity', '10');
            $('#remove-' + number).stop(true, false).fadeIn(0);
        });
        $('#remove-' + number).mouseout(function() {
            $(this).css('display', 'block');
            $('#remove-' + number).delay(200).addClass("in").fadeOut(20000, function() {

                if ($('#remove-' + number).css('display', 'none')) {
                    $(this).remove();
                }
            });
        });

       /* var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/sounds/notification.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');*/

    });
