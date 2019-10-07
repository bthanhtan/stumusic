var local_link = 'http://localhost/Laravel/nhac/stumusic/stumusic/public/';
function check(this_btn) {
	var data_file = this_btn.files;
    var token = $('meta[name="csrf-token"]').attr('content');
    var form_data = new FormData();
    form_data.append('_token', token);
    form_data.append('audio', data_file[0]);
    for (var value of form_data.values()) {
	   console.log(value); 
	}
    console.log(form_data);
    $.ajax({
        url:  local_link + "admin/song/check_file", 
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {
        }
    });
    return false;
}