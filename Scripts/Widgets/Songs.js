var addSongUrl = "NetworkCalls/AddSong.php";
var deleteSongUrl = "NetworkCalls/DeleteSong.php";

var setUserSongs = function(id) {
	$("div.Song").addClass("Hidden");
	$("div.UserId" + id).removeClass("Hidden");
};

var getSelectedId = function() {
	return $("#UserSelector").val();
};

var addSongFailure = function(jqXHR, textStatus, errorThrown) {
	var error = $.parseJSON(jqXHR.responseText);
	console.log(error);
	alert(error.error.message);
};

var addSongSuccess = function(response, textStatus) {
	$('div.SongList').append(response.songHtml);
};

var deleteSong = function (id){
	$('#SongId' +id).remove();
	$.ajax({
		type : "POST",
		data : {
			songId : id
		},
		url : deleteSongUrl,
	});
};

$(document).ready(function() {
	$('#AddSong').submit(function() {
		$.ajax({
			type : "POST",
			data : {
				userId : getSelectedId(),
				artist : $('#Artist').val(),
				song : $('#Song').val(),
				hasHighlight : $('div.UserId' + getSelectedId()).length % 2 == 0
			},
			url : addSongUrl,
			success : addSongSuccess,
			error : addSongFailure
		});
		return false;
	});

	$("#UserSelector").change(function() {
		var id = getSelectedId();
		setUserSongs(id);
	});
});