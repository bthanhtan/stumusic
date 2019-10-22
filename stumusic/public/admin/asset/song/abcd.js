// var local_link = 'http://localhost/Laravel/nhac/stumusic/stumusic/public/';
var local_link = 'http://localhost/stumusic/stumusic/public/';
function check_audio(this_btn) {
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
        url:  local_link + "admin/image/check_file", 
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(nameReturn) {
            $("#note_song").html("bài hát có thể upload!");
            $("#note_song").css('color', 'green');
            $("#nameaudio").val(nameReturn); 
            $("#url_song_input").val(''); 
            console.log(nameReturn);
        },
        error: function (reject) {
            var errors = $.parseJSON(reject.responseText);
            $.each(errors, function (key, val) {
                var error = val.audio;
            });
            $("#note_song").html("định dạng bài hát sai, vui lòng thêm lại bài hát đúng dạng audio như mpeg,mpga,mp3,wav");
            $("#note_song").css('color', 'red');
            $("#url_song_input").val(''); 
            $("#nameaudio").val(''); 
        }
    });
    return false;
}

function check_image(this_btn) {
    var data_file = this_btn.files;
    var token = $('meta[name="csrf-token"]').attr('content');
    var form_data = new FormData();
    form_data.append('_token', token);
    form_data.append('image', data_file[0]);
    for (var value of form_data.values()) {
       console.log(value); 
    }
    console.log(form_data);
    $.ajax({
        url:  local_link + "admin/image/check_image", 
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(nameReturn) {
            $('#image_change').attr('src',local_link+nameReturn);
            $("#note_image").css('display', 'none');
<<<<<<< HEAD
            $("#nameimage").val(nameReturn); 
            $("#url_image_input").val(''); 
=======
            $("#nameimage").val(nameReturn);
            $("#url_image_input").val('');  
>>>>>>> 0ac42f8d865979736c942268bf3957a3c1ab5bf5
        },
        error: function (reject) {
            $('#image_change').attr('src','');
            $("#note_image").html("định dạng hình ảnh sai, vui lòng thêm lại bài hát đúng dạng Image như jpeg,jpg,png,gif");
            $("#note_image").css('display', 'block');
            $("#note_image").css('color', 'red');
            $("#url_image_input").val(''); 
            $("#nameimage").val(''); 
        }
    });
    return false;
}