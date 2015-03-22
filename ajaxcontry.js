
//При полной загрузке документа
$(document).ready(function () {
/////////////////////////////////вывод всех стран в селект
    //Очищаем селект
    $('.ccountry').attr('disabled', true);
    $('.ccountry').html('<option>загрузка...</option>');
    //url запроса регионов

    var url = 'main.php?';
/*
 * GET'овый AJAX запрос
 * подробнее о синтаксисе читайте
 * на сайте http://docs.jquery.com/Ajax/jQuery.get
 * Данные будем кодировать с помощью JSON
 */

        $.get(
            url, {f : "getcontry"},
            function (result) {
                if (result.type == 'error') {
                    alert('error');
                    return(false);
                }
                else {
                    /*
 * проходимся по пришедшему от бэк-энда массиву циклом
 */                    var options = ''; 
                    
                    $(result.regions).each(function() {
                        /*
 * и добавляем в селект по региону
 */

                        options += '<option value="' + $(this).attr('country_id') + '">' + $(this).attr('country_name') + '</option>';
                    });
                    $('.ccountry').html('<option value="" disabled>- выберите регион -</option>'+options);
                    $('.ccountry').attr('disabled', false);
                }
            },
            "json"
        );

/////////////////////////////Ajax-подгрузка контента в таблицу при прокрутке страницы
var inProgress = false;//индентефикатор выполнения вкрипта
var startFrom = 5;// С какой статьи надо делать выборку из базы при ajax-запросе 
var url = 'find.php';
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
        $.get(
            url, {func : "ajax", searchtext : $('#txtf').val(), "startFrom" : startFrom},
            function (result) {
                nProgress = true;
                if (result.type == 'error') {
                    alert('error');
                    return(false);
                }
                else {
//цикл оп массивы из бекенда
                  var line = ''; 
                    $(result.fn).each(function() {
                        line += '<tr><td>' + $(this).attr('guest_name') + '</td><td>' + $(this).attr('guest_surname') + '</td><td>' + $(this).attr('card') + '</td></tr>';
                        //'<option value="' + $(this).attr('country_id') + '">' + $(this).attr('country_name') + '</option>';
                    // 'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card' 
                    });
                    $('#records_table').append(line);
                    // По факту окончания запроса снова меняем значение флага на false 
                    inProgress = false;
                    // Увеличиваем на 10 порядковый номер статьи, с которой надо начинать выборку из базы
                    startFrom += 10;
                }
            },
            "json"
        );

        }
    });
});


