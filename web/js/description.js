function getCity(city_id) {
    $.get('getCity.php?city_id=' + city_id, function (raw_infoC) {
        infoC = JSON.parse(raw_infoC)
        if(infoC){
           $('#city_title').html(infoC.name);
           $('#city_description').html(infoC.description);
           $('#city_photo').attr('src', infoC.photo_link);
           $('#city_photo').attr('alt', infoC.name);
           toggle_visibility('popupBoxPosition');
        }
    })

    $.get('sites_get.php?city_id=' + city_id, function (raw_info) {
        info = JSON.parse(raw_info);
        user_sites = info['user'];
        info = info['all'];

        var list = $('#sites_list').empty();
        $.each(info, function (index, item) {
           var checked = false;
           user_sites.map(function(user_item,i,arr){
             if( user_item.id_site == item.id_site ){
                checked = true;
             }
           })
           var input = window.location.href.indexOf('profile.php') > -1 ? '<input type="checkbox" '+ (checked ? 'checked' : '' )+' onclick="checkSite(this)"  name="task_' + item.id_site + '" id_city='+item.id_city+' id='+item.id_site+' value="' + item.id_site + '" class="tasks-list-cb">' : '';
           var circle = window.location.href.indexOf('profile.php') > -1 ? '<span class="tasks-list-mark"></span>' : '';
           var element = $("<label/>")
                  .addClass("tasks-list-item")
                  .html(input + circle
                     +'<span class="tasks-list-desc">' + item.name + '<span>');
            list.append(element);
        })
    })
}

function checkSite(target){
   var id_site = target.id;
   var id_city = target.attributes.id_city.value;
   var checked = (target.checked)? 1 : 0;
   $.get('sites_set.php?id_city='+id_city+'&id_site='+id_site + '&checked='+checked, function(data){
      if(data == 1){
         if(checked){
            $('#sites_count').text(parseInt($('#sites_count').text())+1);
         } else {
            $('#sites_count').text(parseInt($('#sites_count').text())-1);
         }
      }
   });
}

/*
<label class="tasks-list-item">
        <input type="checkbox" name="task_1" value="1" class="tasks-list-cb" checked>
        <span class="tasks-list-mark"></span>
        <span class="tasks-list-desc">Go!<span>
      </label>
*/
