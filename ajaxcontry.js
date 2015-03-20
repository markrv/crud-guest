/*
 * При полной загрузке документа
 */
$(document).ready(function () {
    /*
 * Очищаем второй селект с регионами
 * и блокируем его через атрибут disabled
 * туда мы будем класть результат запроса
 */
        $('#g_country').attr('disabled', true);
        $('#g_country').html('<option>загрузка...</option>');
/*
 * url запроса регионов
 */

        var url = 'getcontry.php';
/*
 * GET'овый AJAX запрос
 * подробнее о синтаксисе читайте
 * на сайте http://docs.jquery.com/Ajax/jQuery.get
 * Данные будем кодировать с помощью JSON
 */

        $.get(
            url,
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
                    $('#g_country').html('<option value="0">- выберите регион -</option>'+options);
                    $('#g_country').attr('disabled', false);
                }
            },
            "json"
        );
});
