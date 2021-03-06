function slugify(text)
{
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text
}

$(document).ready(function () {
    //confirmation popup
    $('.popup_confirm').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var what = $(this).data('what');
        var href = $(this).attr("href");
        swal({
            title: "Are you sure you want delete \"" + what + "\"",
            text: "You will not be able to recover this item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FC5050",
            confirmButtonText: "Yes, delete it!",
            animation: "slide-from-top",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: href
                }).done(function( data ) {
                    swal({
                        title: what,
                        text: data,
                        type: "success",
                        animation: "slide-from-top",
                    });
                    $parent = $this.parents('tr');
                    $parent.fadeOut();
                });
            }

        });
    });

    //toogle leftbar
    $('.toggle_applications').click(function (e) {
        $('body').toggleClass('leftbar_active');
        if (!Cookies.get('admin_leftbar')) {
            Cookies.set('admin_leftbar', 'active', { expires: 7, path: '/' });
        } else {
            Cookies.set('admin_leftbar', Cookies.get('admin_leftbar') == 'active' ? 'unactive' : 'active', { expires: 7, path: '/' });
        }
    });


    //color picker
    $('.color_picker').ColorPicker({
        color: '#0000ff',
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#color_picker div').css('backgroundColor', '#' + hex);
        }
    });


    //selects
    $(".select-basic").select2({
        minimumResultsForSearch: Infinity,
    });

    //chose a file
    $('.input-file').each(function() {
        var $input = $(this),
            $label = $input.next('.js-labelFile'),
            labelVal = $label.html();

        $input.on('change', function(element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
        });
    });

    //slugs
    $('.link-slug').each(function() {
        var $slug = $(this);
        var $link = $('#' + $slug.data('slug'));
        $link.on('change keyup', function(element) {
            $slug.val(slugify($link.val()));
        });
        $slug.on('keyup', function(element) {
            $slug.val(slugify($slug.val()));
        });
    });

});
