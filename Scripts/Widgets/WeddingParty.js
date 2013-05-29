$(document).ready(function() {
	$('div.WeddingParty div.WeddingPartyCell').click(function() {
		var cellElement = $(this);
		var idString = cellElement.attr("id");
		var id = idString.replace("WeddingPartyCell","");
		$('div.WeddingParty div.Biography').addClass("Hidden");
		$('#Biography' + id).removeClass("Hidden");
		$('div.WeddingParty div.WeddingPartyCell img').removeClass("Chosen");
		$('#WeddingPartyCell' + id + " img").addClass("Chosen");
	});
	
});