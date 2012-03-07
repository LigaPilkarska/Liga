resizeHeader = function() {
	if(!jQuery.browser.msie)
		jQuery("#header").css("width", (window.innerWidth - 18) + "px");
	else
		jQuery("#header").css("width", (document.body.offsetWidth - 21) + "px");						
}

jQuery(function() {
	resizeHeader();	
	jQuery("#content, #header img, #nav_buttons").center("horizontal");
	jQuery(window).resize(function() {
		resizeHeader();
		jQuery("#header img, #content").center("horizontal");	
	});
  jQuery("#root a").click(function() {
		node = this.parentNode;
		next = jQuery(node).next();
		if(jQuery.browser.msie) {
      jQuery("li.list", node.parentNode).hide()
			jQuery("li.text", node.parentNode).hide()
		} else {
      jQuery("> li.list", node.parentNode).hide()
			jQuery("> li.text", node.parentNode).hide()								
		}							
		jQuery(node).siblings().removeClass("selected")
		jQuery(node).addClass("selected");							
		if(next.is(".text")) {
			next.corner();
			next.html(next.html().replace(/\n\s*\n\s*/g, "</p><p>").replace(/\*([^\*]*)\*/g, "<strong>$1</strong>") )
		}
    next.css("display", "inline")
    return false;
  });
});