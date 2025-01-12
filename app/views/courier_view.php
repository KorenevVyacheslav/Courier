<body class="bg-secondary">

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="margin-top: 10px"> <h4 class = "text-warning"> Ваши курьеры:</h4></div>
                    <table id="table" class="table table-bordered  border-warning text-dark data-table bg-secondary" style="margin-top: 20px">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                 <th>Отчество</th>
                            </tr>
                        </thead>
                            <tbody></tbody>
                    </table>
        </div>  <!-- <div class="col-md-8">  -->
    </div>      <!-- <div class="row justify-content-center">   -->
                        

    <div class="container mt-5 col-3">
        <div class="row">
                <a href="/register" class="btn btn-primary text-dark" role="button" ><b>Добавить нового курьера <i> <b>&#43;</b></i></b></a>
        </div>
    </div>

    <div class="container mt-5 col-3">
        <div class="row">
                <a href="/" class="btn btn-primary text-dark" role="button" ><b>&laquo;<b>Назад на главную</b></a>
        </div>
    </div>

</div>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){ 

        Load_table_courier();
       
    });


</script>