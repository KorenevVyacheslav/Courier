<?php
    namespace App;
    use App\models\DB;

    // при AJAX-запросе компилятор теряет все классы, поэтому надо их загружать по новому
    // загружаем все классы:
    require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR. 'vendor' . DIRECTORY_SEPARATOR. 'autoload.php';
    require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR.'config.php';
    require_once 'models' . DIRECTORY_SEPARATOR .'DB.php';

    if (isset($_POST['act'])) { 
        header("Content-Type: application/json; charset=utf-8");

        switch ($_POST['act']) {
            case "find" :
                // поиск пользователя по findnick, исключая id автора ($id, $findnick)              
              //  $res['finds'] = DB::find_users ($_POST['id'], $_POST['val']);                
                echo json_encode($res);
                break;
            case "load" : 
                // загрузка всей таблицы курьеров для страницы со всеми курьерами              
                $arr =DB::get_courier_table();
                echo json_encode($arr);
                break;
            case "load_order" : 
                // загрузка всей таблицы заказов для главной страницы
                $arr =DB::get_orders_table();
                echo json_encode($arr);
                break;
            case "load_courier_by_id" : 
                // получаем курьера по id
                $arr =DB::get_courier_byId($_POST['id']);
                echo json_encode($arr);
                break;    
            case "load_town_by_id" : 
                // получаем курьера по id
                $arr =DB::get_town_byId($_POST['id']);
                echo json_encode($arr);
                break;                
                

            case "send" : 
                // сохранение сообщения в БД  ($text, $friend_id, $author_id);             
               // $status = DB::save_message ($_POST['text'], $_POST['friend_id'], $_POST['id']);         
                if ($status==TRUE)  $response['status'] = 'ok';
                    else $response['status'] = 'error';
                echo json_encode($response);
                break;      
            case "edit" : 
                // замена сообщения в БД  ($text, $message_id);             
               // $status = DB::edit_message ($_POST['text'], $_POST['message_id']);         
                if ($status==TRUE)  $response['status'] = 'ok';
                else $response['status'] = 'error';
                echo json_encode($response);
                break;  
            default :
            exit();
        }
    }








