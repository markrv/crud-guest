/////////////////////////////////вывод всех стран в селект
//При полной загрузке документа
$(document).ready(function () {
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
                    $('.ccountry').html('<option value="0">- выберите регион -</option>'+options);
                    $('.ccountry').attr('disabled', false);
                }
            },
            "json"
        );
});


