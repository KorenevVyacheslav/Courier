
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

<!-- <body class="bg-secondary"> -->
<!-- <div class="bg-image" style="background-image: url('pictures/Fon.jpg');"> -->

<div class="container text-center">
         <div class="align-items-center text-warning" style="margin-top: 50px"> 
            <h3> Расписание поездок курьеров в регионы </h3>
        </div>
</div>

<div class="container text-center">
    <div class="align-items-center text-warning" >       
            <h5> Отфильтровать поездки по дате: </h5>
    </div>

    <div class="mt-3 offset-md-5 col-2">
        <input id="txtdate" class="form-control" name="date" placeholder="ГГГГ-ММ-ДД" type="text"  required/>
    </div>
        

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="margin-top: 10px"> <h4 class = "text-warning"> Заказы :</h4></div>
                    <table id="table" class="table table-bordered  border-warning text-dark data-table bg-secondary" style="margin-top: 20px">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Город</th>
                                <th>Курьер</th>
                                <th>Дата начала поездки</th>
                                <th>Продолжительность в днях</th>
                            </tr>
                        </thead>
                            <tbody></tbody>
                    </table>
        </div>  <!-- <div class="col-md-8">  -->
    </div>      <!-- <div class="row justify-content-center">   -->

                        
    <div class="container mt-5 col-3">
        <div class="row">
                <a href="/courier" class="btn btn-primary text-dark" role="button" ><b>На страницу с курьерами <i> <b>&raquo;</b></i></b></a>
        </div>
    </div>

    <div class="container mt-5 col-3">
        <div class="row">
                <a href="/order" class="btn btn-primary text-dark" role="button" ><b>Внести новый заказ <i> <b>&raquo;</b></i></b></a>
        </div>
    </div>

    <?php if ($data['check'] == false): ?>
        <div class = "text-warning" style="margin-top: 20px"> <h5> Ваша таблица заказов пустая. Нажмите кнопку "Заполнить". </h5></div>
            <div class="col s12 center-align" style="margin-top: 20px">
                <a href="/fill" class="btn btn-primary text-dark" ><b>Заполнить таблицу </b><i class="material-icons right">&#128190;</i></a>
            </div>
    <?php endif; ?>

</div> <!--class="container text-center"> -->


<!-- <div class="bg-image" style="background-image: url('pictures/Fon.jpg');">
  Этот div имеет фоновое изображение. [1](https://www.demo2s.com/g/css/how-to-use-bootstrap-5-background.html) -->
</div>








<script type="text/javascript">

$(document).ready(function(){ 

        Load_table(0);                  // прорисовка таблицы без фильтрации даты (date = 0)

        //блок для работы с datepicker
        var date_input=$('#txtdate');          
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        $('#txtdate').datepicker({
            uiLibrary: 'bootstrap5', 
            dateFormat: 'yy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            onSelect: function (dateText, inst) {  
                Load_table(dateText);              // после выбора даты прорисовка таблицы с фильтрацией по дате Load_table(date != 0)
            }
        })
});


        
 
</script>