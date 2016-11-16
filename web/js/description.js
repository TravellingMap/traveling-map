function getCity(city_id) {
    $.get('city.php?city_id=' + city_id, function (raw_info) {
        info = JSON.parse(raw_info)
        $('#city_title').html(info.name);
        $('#city_description').html(info.description);
        $('#city_photo').attr('src', info.photo_link);
        $('#city_photo').attr('alt', info.name);
        toggle_visibility('popupBoxPosition');
    })
}