
/* функция добавления дней к дате*/
Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
}

/* функция загрузки записи курьера по id через AJAX*/
var Load_courier_by_id = function (id) { 
    $.ajax({             
        type: "POST",
        dataType: 'json',
        url: '/app/ajax.php',
        async: false,                               // чтобы result вернулся после выполнения запроса, иначе вернется undefined, сначала запрос - потом ответ
        data: {
            act: "load_courier_by_id",             // загружаем запись курьера по id
            id: id
        },
        success: function (data) {
            result = data.surname; 
        },
    });
    return result;
};

/* функция загрузки записи города по id через AJAX*/
var Load_town_by_id = function (id) { 
    $.ajax({             
        type: "POST",
        dataType: 'json',
        url: '/app/ajax.php',
        async: false,                               // чтобы result вернулся после выполнения запроса, иначе вернется undefined, сначала запрос - потом ответ
        data: {
            act: "load_town_by_id",                 // загружаем наименование города по id
            id: id
        },
        success: function (data) {
            //result = data.town;
            result = data;
        },
    });
    return result;
};

/* функция получения данных для таблицы заказов через AJAX
и вывода данных в таблице на странице */
var Load_table = function (date) {
    $("#table tbody").children().remove();
    $.ajax({              
        type: "POST",
        dataType: 'json',
        url: '/app/ajax.php',
        data: {
            act: "load_order"             // загружаем всю таблицу заказов
        },
        success: function (data) {
            var N = 1;                      // номер в таблице при выводе
            $.each(data, function (key, value) {

                 if (date==0) {                 // вывод таблицы без фильтрации (первая загрузка таблицы) 
                    $("#table tbody").append("<tr><td>"+N+"</td><td>" +Load_town_by_id(value.town_id).town+"</td><td>" + Load_courier_by_id(value.courier_id)+"</td><td>"+value.start_date+"</td><td>"+Load_town_by_id(value.town_id).duration_days+"</td></tr>");
                     N++;
                        }
                else {                      // вывод данных с фильтрацией после выбора пользователем даты
              
                        date_selected = new Date(date);                                 // дата, полученная в datepicker ( пример Sun Dec 01 2024 05:00:00 GMT+0500)                 
                        date_start = new Date (value.start_date);                       // дата старта поездки, полученная из таблицы orders          
                        duration_days = Load_town_by_id(value.town_id).duration_days;   // продолжительность поездки, полученная из таблицы orders 
                        date_finish = date_start.addDays(duration_days);                                                               

                        // если выбранная дата лежит в промежутке между стартом и финишом, то выводим строку        
                        if ((date_start.getTime()) <= (date_selected.getTime()) && (date_selected.getTime()) <= (date_finish.getTime()))   {
                            $("#table tbody").append("<tr><td>"+N+"</td><td>" +Load_town_by_id(value.town_id).town+"</td><td>" + Load_courier_by_id(value.courier_id)+"</td><td>"+value.start_date+"</td><td>"+Load_town_by_id(value.town_id).duration_days+"</td></tr>");
                            N++;
                       }
                    }
                });
        },
       // complete: function () { setTimeout(Load, 5000);  }
    });
};

/* функция получения данных для таблицы курьеров через AJAX
и вывода данных в таблице на странице */
var Load_table_courier = function () {
    $("#table tbody").children().remove();
    $.ajax({              
        type: "POST",
        dataType: 'json',
        url: '/app/ajax.php',
        data: {
            act: "load"             // метод загрузит всю таблицу
        },
        success: function (data) {
            var N = 1;                      // номер в таблице при выводе
            $.each(data, function (key, value) {
                   $("#table tbody").append("<tr><td><b>"+N+"</td><td><b>" +value.name+"</td><td><b>" + value.surname+"</td><td><b>"+value.patronyc+"</td></tr> </b>");
                N++;
                });
        },
       // complete: function () { setTimeout(Load, 5000);  }
    });
};