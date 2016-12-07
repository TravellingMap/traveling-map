function getCity(city_id) {
    $.get('city.php?city_id=' + city_id, function (raw_info) {
        info = JSON.parse(raw_info)
        $('#city_title').html(info.name);
        $('#city_description').html(info.description);
        $('#city_photo').attr('src', info.photo_link);
        $('#city_photo').attr('alt', info.name);
        toggle_visibility('popupBoxPosition');
    })
    
    $.get('sites_get.php?city_id=' + city_id, function (raw_info) {
        info = JSON.parse(raw_info);
        var list = $('#sites_list').empty();
        $.each(info, function (index, item) {
            element = $("<label/>").addClass("tasks-list-item").html('<input type="checkbox" name="task_' + item.id_site + '" value="' + item.id_site + '" class="tasks-list-cb">' + 
            '<span class="tasks-list-mark"></span>' + 
            '<span class="tasks-list-desc">' + item.name + '<span>')
            list.append(element);
        })
    })
}

/* 
<label class="tasks-list-item">
        <input type="checkbox" name="task_1" value="1" class="tasks-list-cb" checked>
        <span class="tasks-list-mark"></span>
        <span class="tasks-list-desc">Go!<span>
      </label>
*/