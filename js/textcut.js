(function($) {
    var truncate = function(el) {
        var text = el.text(),
            height = el.height()-50,
            clone = el.clone();

	  clone.css({
            position: 'absolute',
            visibility: 'hidden',
            height: 'auto',	
		 
        });
        el.after(clone);

        var l = text.length - 1;
        for (; l >= 0 && clone.height() > height; --l) {
            clone.text(text.substring(0, l) + '...');
        }

        el.text(clone.text());
        clone.remove();
    };

    $.fn.truncateText = function() {
        return this.each(function () {
            truncate($(this));
        });
    };
}(jQuery));



$(function() {
   $('.entry-excerpt.image-caption').truncateText();
	$('.entry-excerpt.image-caption').css({
            'padding': '15px',
  
        });
});