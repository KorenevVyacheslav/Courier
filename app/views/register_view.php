<body class="bg-secondary">

<div class="container text-center mt-5" style="margin-top: 10px; margin-bottom: 30px">
<?php if (!$data['errors'] && $data['reg'] == false): ?> 
    <h3 class="text-center text-warning"> Регистрация нового курьера </h3> 
</div>
    <div class="container mt-5">
            <form enctype="multipart/form-data" method="post">
                <div class="mb-3 offset-md-4 bg-primary col-4">
                    <input id="name_field" name="name" type="text" class="validate" length="20" maxlength="20" required>
                    <label for="name_field"><h5>Введите имя</h5></label>
                </div>
                <div class="mb-3 offset-md-4 bg-primary col-4">
                    <input id="surname_field" name="surname" type="text" class="validate" length="20" maxlength="20" required>
                    <label for="surname_field"><h5>Введите фамилию</h5></label>
                </div>   
                <div class="mb-3 offset-md-4 bg-primary col-4">
                    <input id="patronyc_field" name="patronyc" type="text" class="validate" length="20" maxlength="20" required>
                    <label for="patronyc_field"><h5>Введите отчество</h5></label>
                </div>
                <div class="mb-3 offset-md-4">
                    <p style="color:#8a8a0f">Каждая строка должна быть не менее 5 и не более 20 символов</p>
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
        <h3 class="center text-warning" >Новый курьер внесен!</h3>
            <div class="center-align mt-3"><a href="/courier" class="btn btn-primary text-dark" role="button" >На страницу с курьерами &raquo;</a></div> 
    <?php elseif ($data['errors']): ?>
        <div class="center-align"><a href="javascript:history.back()" class="btn btn-info text-dark">&laquo; Назад</a></div>
    <?php endif;  
    





