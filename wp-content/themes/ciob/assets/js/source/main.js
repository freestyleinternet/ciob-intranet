(function($) {

	$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=78393564@N06&format=json&jsoncallback=?", function(data) {
			 var target = "#latest-flickr-images"; // Where is it going?
			 for (i = 0; i <= 1; i = i + 1) { // Loop through the 10 most recent, [0-2]
					 var pic = data.items[i];
					 var liNumber = i + 1; // Add class to each LI (1-10)
					 $(target).append("<div class='flickr-image no-" + liNumber + "'><a title='" + pic.title + "' href='" + pic.link + "'><img src='" + pic.media.m + "' /></a></div>");
			 }
	 });

})(jQuery);
