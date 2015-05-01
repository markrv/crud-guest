var country_id_name = {}; //ассоциативный массив country_id_name[id страны] = название страны
var inProgress = false;//флаг индентефикатор выполнения скрипта
var startFrom = 0;// С какой статьи надо делать выборку из базы при ajax-запросе
var numreq = 0;// количество ответов из б.д
var searchtext = '';

function searchNum(){ //////////////////////////////////Поисковый запрос
if ($("#txtf").val().length<4) return;
//отчистка таблиц
$('#records_table').html('<tr><th>Имя</th><th>Фамилия</th><th>Страна</th><th>Карта</th></tr>');
    if(!inProgress){
        searchtext = $('#txtf').val()
        startFrom = 0;// обнуление
        numreq=0;
        addintable();
    }
    ///// if(document.body.offsetHeight < window.innerHeight)addintable(); ///если монитор большой
}

function addintable(){//////////////////////////////////вывод в таблицы
           $.get(
            'find.php', {searchtext : searchtext, "startFrom" : startFrom},
            function (result1) {
                nProgress = true;
                if (result1.type == 'error') {
                    alert('error');
                    return(false);
                }
                else { //цикл оп массивы из бекенда и вывод в строки
                  var line = ''; 
                    $(result1.fn).each(function() {
                        line += '<tr><td>' + $(this).attr('guest_name') + '</td><td>' + $(this).attr('guest_surname') + '</td><td>' + country_id_name[$(this).attr('guest_country')] + '</td><td>' + $(this).attr('guest_card') + '</td></tr>';
                        numreq++;
                    // 'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'guest_card', 'guest_num' 
                    });
                    $('#records_table').append(line);
                    // По факту окончания запроса снова меняем значение флага на false 
                    inProgress = false;
                    startFrom += 15;
                }
            },
            "json"
        );
}

$(document).ready(function () { //При полной загрузке документа

/////////////////////////////////вывод всех стран в селект и в массив
    $('.ccountry').attr('disabled', true);//Очищаем селект и деактивируем
    $('.ccountry').html('<option>загрузка...</option>');

        $.get(
            'main.php', {f : "getcontry"},
            function (result) {
                if (result.type == 'error') {
                    alert('error');
                    return(false);
                }
                else {
                  var options = ''; 
                    
                    $(result.country).each(function() {
                    // и добавляем в селект 
                        options += '<option value="' + $(this).attr('country_id') + '">' + $(this).attr('country_name') + '</option>';
                        var key_id = $(this).attr('country_id');
                        country_id_name[key_id] = $(this).attr('country_name');
                    });
                    $('.ccountry').html('<option value="" disabled>- выберите регион -</option>'+options);
                    $('.ccountry').attr('disabled', false);
                }
            },
            "json"
        );

//////////////////////////////Ajax-подгрузка контента в таблицу при прокрутке страницы
    $(window).scroll(function() {
        if(numreq>14)//проверка что найденых гостей больше 15 и есть необходимость догружать
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 50 && !inProgress) {//догрузка происзадит за 50 пиксеелй при условии что она операция не выполняеться уже сейчас
        addintable();
        }
    });
});


