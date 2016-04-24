/**
 * jTinder initialization
 */
$("#tinderslide").jTinder({
	// dislike callback
    onDislike: function (item) {
		var url = '?';
	    // set the status text
        $('#status').html('Dislike image ' + (item.index()+1)); 
        var query = 'user=' + item.attr('class') + '&like=' + 0;
        window.location.href = url + query;
               
    },
	// like callback
    onLike: function (item) {
		var url = '?';

	    // set the status text
        $('#status').html('Like image ' + (item.index()+1));
        //console.log(item.attr('class'));
        var query = 'user=' + item.attr('class') + '&like=' + 1;
		window.location.href = url + query;
    },
	animationRevertSpeed: 200,
	animationSpeed: 400,
	threshold: 1,
	likeSelector: '.like',
	dislikeSelector: '.dislike'
});

/**
 * Set button action to trigger jTinder like & dislike.
 */
$('.actions .like, .actions .dislike').click(function(e){
	e.preventDefault();
	$("#tinderslide").jTinder($(this).attr('class'));
});
