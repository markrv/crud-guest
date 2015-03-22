
function searchNum(){
if ($("#txtf").val().length<4) return;
//отчистка таблиц!!!!!!!!!!!!!!!
$('#records_table').html('<tr><th>Имя</th><th>Фамилия</th><th>Карта</th></tr>');
//url запрос 
        var url = 'find.php';
        $.get(
            url, {func : "first", searchtext : $('#txtf').val()},
            function (result) {
                if (result.type == 'error') {
                    alert('error');
                    return(false);
                }
                else {
//цикл оп массивы из бекенда
                  var line = ''; 
                           //           alert();
                    $(result.fn).each(function() {
                        line += '<tr><td>' + $(this).attr('guest_name') + '</td><td>' + $(this).attr('guest_surname') + '</td><td>' + $(this).attr('card') + '</td></tr>';
                        //'<option value="' + $(this).attr('country_id') + '">' + $(this).attr('country_name') + '</option>';
                    // 'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card' 
                    });
                    $('#records_table').append(line);
                }
            },
            "json"
        );
}           