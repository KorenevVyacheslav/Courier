<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

<body class="bg-secondary">
<div class="container text-center mt-5" style="margin-top: 10px; margin-bottom: 30px">
<?php if (!$data['errors'] && $data['reg'] == false): ?> 
    <h3 class="text-center text-warning"> Регистрация нового заказа </h3> 
</div>
    <div class="container mt-5">
            <form enctype="multipart/form-data" method="post">

                <label for="town" class="mb-3 offset-md-4 col-4 text-warning"> <h5> Выберите город: </h5> </label>
                    <div class="mb-3 offset-md-4 bg-primary col-4">
                        <select class="form-select" id="town" name="town_id">                  <!-- name для POST  -->
                            <?php foreach ($data['towns'] as $item) : ?> 
                                <option value = "<?php echo $item['id']; ?>" > 
                                    <?php echo $item['town']; ?> 
                                </option>                               
                                    <?php endforeach; ?>
                        </select>
                    </div>

                    <label for="courier" class="mb-3 offset-md-4 col-4 text-warning"> <h5> Выберите курьера: </h5> </label>
                    <div class="mb-3 offset-md-4 bg-primary col-4">
                        <select class="form-select" id="courier" name="courier_id">             <!-- name для POST  -->
                            <?php foreach ($data['couriers'] as $item) : ?> 
                                <option value = "<?php echo $item['id']; ?>" >                  
                                    <?php echo $item['surname']; ?> 
                                </option>                               
                                    <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3 offset-md-4 col-4 text-warning"> <h5> Выберите дату начала поездки: </h5>  </div>
                    <div class="mb-3 offset-md-5 col-2">
                    <input id="txtdate" class="form-control" name="date" placeholder="ГГГГ-ММ-ДД" type="text"  required/>
                    </div>


                <div class="offset-md-5 px-5">
                    <button class="btn-primary text-dark" type="submit" name="action">
                        <b>Записать</b>
                    <i class="material-icons right">&#xE163;</i>
                    </button>
                </div>
        </form>
    </div>
    <div class="container mt-5 col-2">
        <div class="row">
                <a href="javascript:history.back()" class="btn btn-primary text-dark" role="button" ><b>&laquo; <b>Назад</b></a>
        </div>
    </div>
    <?php else : ?>
        <?php foreach ($data['errors'] as $error): ?>
            <div class="alert alert-danger">
            <h3 class="center"><?php echo $error; ?> </h3>
            </div>
        <?php endforeach; 
     endif;  
    if($data['reg'] == true): ?>
        <h3 class="center text-warning" >Новый заказ внесен!</h3>
            <div class="center-align mt-3"><a href="/input" class="btn btn-primary text-dark" role="button" >На главную страницу &raquo;</a></div> 
    <?php elseif ($data['errors']): ?>
        <div class="center-align"><a href="javascript:history.back()" class="btn btn-info text-dark">&laquo; Назад</a></div>
    <?php endif; ?> 
    


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


