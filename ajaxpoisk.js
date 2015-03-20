
    //Функция возвращает объект XMLHttpRequest
function getXmlHttpRequest(){
    if (window.XMLHttpRequest){
        try {
            return new XMLHttpRequest();
        } 
        catch (e){}
    } 
    else if (window.ActiveXObject){
        try {
            return new ActiveXObject('Msxml2.XMLHTTP');
        } catch (e){}
        try {
            return new ActiveXObject('Microsoft.XMLHTTP');
        } 
        catch (e){}
    }
    return null;
}
    // Очистка списка
function clearList()
{
    var ulResult = document.getElementById("ulResult");
    while (ulResult.hasChildNodes())
        ulResult.removeChild(ulResult.lastChild);
}
    // Добавление нового элемента списка
function addListItem(text){
    if (text.length == 0) return;
    var ulResult = document.getElementById("ulResult");
    var li = document.createElement("li");   
    ulResult.appendChild(li);
    var liText = document.createTextNode(text);  
    li.appendChild(liText);
}
    //Поиск совпадения
function searchNum(){
    // Параметры поиска
    var title = document.getElementById("txtTitle").value;
    // Формирование строки поиска
    var searchString = "query=" + encodeURIComponent(title);
    // Запрос к серверу
    var req = getXmlHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState != 4) return;
        var responseText = new String(req.responseText);
        var num = responseText.split('\n');
        clearList();
        for (var i = 0; i < num.length; i++)
            addListItem(num[i]);
    }           
    // Метод POST
    req.open("POST", "./find.php", true);
    // Установка заголовков
    req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    req.setRequestHeader("Content-Length", searchString.length);           
    // Отправка данных
    req.send(searchString);                    
}