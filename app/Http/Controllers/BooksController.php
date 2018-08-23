<?php

namespace App\Http\Controllers;
use App\Group;
use App\Issure_book;
use App\Set_date_calendar;
use App\Ebook;
use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem as Filesystem;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Request;
use DateTime;
use App\Book;
use App\Testing\Lecture;
use App\Order;
use App\Order_books;
use DB;
use Carbon\Carbon;
use Symfony\Component\DomCrawler\Image;
use App\Order_book;
use MaddHatter\LaravelFullcalendar\Facades\Calendar ;


class BooksController extends Controller {

    //Контроллер для предоставления студентам списка книг
    public function index(){
        $studentStatus = 1;
        $role = User::whereId(Auth::user()['id'])->select('role')->first()->role;
        if ($role == "Студент"){
            $studentStatus = DB::table('users')
                ->leftJoin('groups', 'users.group', '=', 'groups.group_id')
                ->where('users.id', '=', [Auth::user()['id']])
                ->first();
            $studentStatus = $studentStatus->archived;
        }

       $books = Book::all();
        $searchquery = "";
        $messageFlag = "NO";
        if ($role== "Студент"){
            $results = DB::select('select * from issure_book where message= ? AND id_user=?', ["YES",Auth::user()['id']]);
            if ($results){
                $messageFlag = "YES";
                DB::table('issure_book')->where('id_user', '=', Auth::user()['id'])
                    ->update(['message' => 'NO']);
            }
        }
        return view("library.books", compact('books','searchquery','role','studentStatus',
            'messageFlag'));
    }

    public function search(){
        $role = User::whereId(Auth::user()['id'])->select('role')->first()->role;
        $search = Request::input('search');
        $book = Book::where('title', 'like', "%$search%");
        $book->orWhere('author', 'like', "%$search%");
        //$query = "SELECT id, coverImg, title, author, format FROM `book` WHERE UPPER(`title`) LIKE UPPER('%$search%') OR UPPER(`author`) LIKE UPPER('%$search%')";
        $books = $book->get();
        $searchquery = $search;
        return view("library.books", compact('books','searchquery','role'));
    }

    public function getBook($id){
        $studentStatus = DB::table('users')//если 0- то учится в этом семе, если 1, то нет
        ->join('groups', 'users.group', '=', 'groups.group_id')
            ->select('groups.archived')
            ->first()->archived;
        $role = User::whereId(Auth::user()['id'])->select('role')->first()->role;
        $book = Book::where('id', '=', "$id");
        $book = $book->first();

        return view("library.book", compact('book','role','studentStatus'));
    }

    public function add_new_book(){
        return view("library.add_new_book");
    }

//   public function store_book(AddBookRequest $request){
//
//
//
//       // $input = Request::all();
//        //$book = new Book($input);
//            $book = new Book($request->all());
//        /*$book->title = $input['title'];
//        $book->author = $input['author'];
//        $book->description = $input['description'];
//        $book->format = $input['format'];
//        $book->publisher = $input['publisher'];*/
//        $book->coverImg = 'libr_pic/'.$_FILES['picture']['name'];
//        $book->save();
//        @copy($_FILES['picture']['tmp_name'], 'img/library/'.$book->coverImg);
//        return redirect('library/books');
//    }




    public function store_book(\Illuminate\Http\Request $request){
        \Validator::extend('uniqueTitleAndAuthor', function ($attribute, $value, $parameters, $validator) {
            $count = \DB::table('book')->where('title', $value)
                ->where('author', $parameters[0])
                ->count();

            return $count === 0;
        });
//        $messages = array(
//            'validation.unique_title_and_author' => 'Автор и название такие уже есть.',
//        );
        $validator = \Validator::make($request->all(), [
            'title' => "required|between:5,150|uniqueTitleAndAuthor:{$request->author}",
            'author' => 'required|between:5,50',
            'description' => 'required|between:30,1000',
            'format' => 'required|between:5,30',
            'publisher' => 'required|between:5,30',
            'picture' => ['image','required'],

        ]);

        if ($validator->fails()) {
            return redirect('library/books/create')
                ->withErrors($validator)
                ->withInput();
        }

        // $input = Request::all();
        //$book = new Book($input);
        $book = new Book($request->all());
        /*$book->title = $input['title'];
        $book->author = $input['author'];
        $book->description = $input['description'];
        $book->format = $input['format'];
        $book->publisher = $input['publisher'];*/
        $book->coverImg = 'libr_pic/'.$_FILES['picture']['name'];
        $book->save();
        @copy($_FILES['picture']['tmp_name'], 'img/library/'.$book->coverImg);
        return redirect('library/books');
    }

    public function editBook($id){
        $book = Book::findOrFail($id);
        return view('library.edit_book', compact('book'));
    }

//    public function update_book($id, UpdateBookRequest $request){
//        $book = Book::findOrFail($id);
//        if (!empty($_FILES['picture']['name'])){
//            $book->coverImg = 'libr_pic/'.$_FILES['picture']['name'];
//            @copy($_FILES['picture']['tmp_name'], 'img/library/'.$book->coverImg);
//        }
//        $book->update($request->all());
//
//
//        return redirect('library/book/'.$book->id);
//    }

    public function update_book($id, \Illuminate\Http\Request $request){
        \Validator::extend('uniqueTitleAndAuthor', function ($attribute, $value, $parameters, $validator) {
            $count = \DB::table('book')->where('title', $value)
                ->where('author', $parameters[0])
                ->count();

            return $count === 0;
        });
//        $messages = array(
//            'validation.unique_title_and_author' => 'Автор и название такие уже есть.',
//        );
        $validator = \Validator::make($request->all(), [
            'title' => "required|between:5,150",
            'author' => 'required|between:5,50',
            'description' => 'required|between:30,1000',
            'format' => 'required|between:5,30',
            'publisher' => 'required|between:5,30',
            'picture' => ['image'],

        ]);
        if ($validator->fails()) {
            return redirect('library/book/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $book = Book::findOrFail($id);
        if (!empty($_FILES['picture']['name'])){
            $book->coverImg = 'libr_pic/'.$_FILES['picture']['name'];
            @copy($_FILES['picture']['tmp_name'], 'img/library/'.$book->coverImg);
        }
        $book->update($request->all());
        return redirect('library/book/'.$book->id);
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);
        $path = 'img/library/'.$book->coverImg;
        app(Filesystem::class)->delete(public_path($path ));
     $book->delete();
        return  redirect('library/books');
    }
//личный кабинет учителя
    public function teacherCabinet(){
        //отмечаем должников
        Issure_book::where('date_return', '<' , date("Y-m-d"))
            ->update(['status' => 'delay']);
// для таблицы Заказы книг
        $orders = DB::table('order_books')->leftJoin('book', 'order_books.id_book', '=', 'book.id')
            ->leftJoin('users', 'order_books.id_user', '=', 'users.id')
            ->leftJoin('groups', 'users.group', '=', 'groups.group_id')
            ->where('order_books.status', '=', 'active')
            ->select('order_books.id', 'order_books.date_order', 'order_books.id_user', 'order_books.id_book',
                'book.title', 'book.author', 'users.first_name', 'users.last_name', 'groups.group_name', 'order_books.status')
            ->get();

       $userDelays = DB::table('issure_book')->select('issure_book.id_user', 'issure_book.status')
       ->get();
        foreach ($orders as $order){
            foreach ($userDelays as $userDelay){
                if ($order->id_user == $userDelay->id_user && $userDelay->status=='delay'){
                    $order->status = 'delay';
                }
            }
        }

        $groupOrders = [];
        foreach ($orders as $order){
            $groupOrders[] = $order->group_name;
        }
        $groupOrders = array_unique($groupOrders);
        $titleOrders = [];
        foreach ($orders as $order){
            $titleOrders[] = $order->title;
        }
        $titleOrders = array_unique($titleOrders);
        $authorOrders = [];
        foreach ($orders as $order){
            $authorOrders[] = $order->author;
        }
        $authorOrders = array_unique($authorOrders);
        $dateOrders = [];
        foreach ($orders as $order){
            $dateOrders[] = $order->date_order;
        }
        $dateOrders= array_unique($dateOrders);
        $nameOrders = [];
        foreach ($orders as $order){
            $nameOrders [] = $order->first_name." ".$order->last_name;
        }
        $nameOrders = array_unique($nameOrders );

        $issureBooks = DB::table('issure_book')->leftJoin('book', 'issure_book.id_book', '=', 'book.id')
            ->leftJoin('users', 'issure_book.id_user', '=', 'users.id')
            ->leftJoin('groups', 'groups.group_id', '=', 'users.group')
            ->select('issure_book.id', 'issure_book.date_issure', 'issure_book.date_return',
                'issure_book.id_book', 'book.title', 'book.author', 'users.first_name', 'users.last_name', 'groups.group_name',
                'issure_book.status')->orderBy('date_return')->get();
        $groupIssureBooks = [];
        foreach ($issureBooks as $issureBook){
            $groupIssureBooks[] = $issureBook->group_name;
        }
        $groupIssureBooks= array_unique($groupIssureBooks);
        $titleIssureBooks = [];
        foreach ($issureBooks as $issureBook){
            $titleIssureBooks[] = $issureBook->title;
        }
        $titleIssureBooks= array_unique($titleIssureBooks);
        $authorIssureBooks = [];
        foreach ($issureBooks as $issureBook){
            $authorIssureBooks[] = $issureBook->author;
        }
        $authorIssureBooks= array_unique($authorIssureBooks);
        $dateIssureIssureBooks = [];
        foreach ($issureBooks as $issureBook){
            $dateIssureIssureBooks[] = $issureBook->date_issure;
        }
        $dateIssureIssureBooks= array_unique($dateIssureIssureBooks);
        $dateReturnIssureBooks = [];
        foreach ($issureBooks as $issureBook){
            $dateReturnIssureBooks[] = $issureBook->date_return;
        }
        $dateReturnIssureBooks= array_unique($dateReturnIssureBooks);

        // для таблицы Книги в наличии
        $inLibraryBooks = DB::table('book')->leftJoin('issure_book', 'book.id', '=', 'issure_book.id_book')
            ->whereNull('issure_book.id_book')->get();
        $titleInLibraryBooks = [];
        foreach ($inLibraryBooks as $inLibraryBook){
            $titleInLibraryBooks[] = $inLibraryBook->title;
        }
        $titleInLibraryBooks= array_unique($titleInLibraryBooks);
        $authorInLibraryBooks = [];
        foreach ($inLibraryBooks as $inLibraryBook){
            $authorInLibraryBooks[] = $inLibraryBook->author;
        }
        $authorInLibraryBooks= array_unique($authorInLibraryBooks);
        return view("personal_account.teacher_cabinet", compact("orders","groupOrders", "titleOrders", "authorOrders", "dateOrders",
            "issureBooks", "groupIssureBooks", "titleIssureBooks", "authorIssureBooks", "dateIssureIssureBooks", "dateReturnIssureBooks",
            "inLibraryBooks", "titleInLibraryBooks", "authorInLibraryBooks", "nameOrders"));

    }
//Выдача книг студентам
    public function teacherIssureBook($id){
        $result = Request::all();
        $issureDate = date("Y-m-d");
        $returnDate = new DateTime('+7 days');
        $returnDate = $returnDate->format('Y-m-d');
        DB::table('issure_book')->insert(array('id_user' => $result['user_id'], 'id_book' => $result['book_id'],
            'date_issure' => $issureDate, 'date_return' => $returnDate, 'status' => "notDelay", 'message' => "NO"));

        DB::table('order_books')->where('id', '=', $result['order_id'])->delete();
        return $result['order_id'];
    }

    //Отмена заказа преподавателем
    public function teacherOrderDelete($id){
        $request = Request::all();
        DB::table('order_books')->where('id', '=', $id)->update(array('status' => 'cancel'));
        return $id;

    }

    // перенос заказа преподавателем
    public function teacherExtendDate($id){
        $request = Request::all();
        $NewFormatDate = preg_replace('/\./', '-', $request["date_extend"]);
        $dateReturn = strtotime($NewFormatDate);
        $dateReturnToBD = date("Y-m-d", $dateReturn);
        DB::table('order_books')->where('id', '=', $request["id_order"])->update(array('date_order' => $request["date_extend"]));

        DB::table('order_books')->where([
            ['order_books.id_book', '=', $request["id_book"]],
            ['order_books.date_order', '<=', $request["date_extend"]],
                ['order_books.id', '<>', $request["id_order"]]
        ])->update(array('status' => "extendT"));

       return ['date_extend' => $request["date_extend"], 'id_order' => $request["id_order"], 'id_book' => $request["id_book"],
           'date_order' => $request["date_order"], 'dateReturnToBD' => $dateReturnToBD];
    }
//Возврат книг
    public function teacherReturnBook($id){
        $request = Request::all();
        DB::table('issure_book')->where('id', '=', $id)->delete();
        return $id;

    }
// Отправка сообщения студенту о вовремя не сданной книге
    public function teacherSendMessage($id){
        $request = Request::all();
        DB::table('issure_book')->where('id', '=', $request['id_issureBook'])->update(array('message' => 'YES'));
        return $request['id_issureBook'];

    }
//сохраняем параметры календаря
    public function set_Date_Calendar(){
        $result = Request::all();
       if (empty(Set_date_calendar::all()->toArray())) {
            $setCalendar = new Set_date_calendar;
            $setCalendar->start_date = $result['start_date'];
            $setCalendar->end_date = $result['end_date'];
            $setCalendar->days = $result['1Day'].$result['2Day'].$result['3Day'].$result['4Day'].
                $result['5Day'].$result['6Day'].$result['7Day'];
            $setCalendar->save();

        }else{
           $setCalendar = Set_date_calendar::find(1);
           $setCalendar->start_date = $result['start_date'];
           $setCalendar->end_date = $result['end_date'];
           $setCalendar->days = $result['1Day'].$result['2Day'].$result['3Day'].$result['4Day'].
               $result['5Day'].$result['6Day'].$result['7Day'];
           $setCalendar->save();
        }
        return redirect('library/books/teacherCabinet');

    }
    // заказ книг
    public function book_order($id){
        $results = DB::table('order_books')->where([
            ['id_book', '=', $id],
            ['status', '=', 'active']
        ])->select('date_order')->get();
        $order_date= [];
        foreach ($results as $result) {
            $order_date[] = $result->date_order;
        }
        $result = DB::table('set_date_calendar')->where('id', '=', 1)->select('days')->get();
       $possible_date = str_split($result[0]->days);
       $allday = ["0", "1", "2", "3", "4", "5", "6"];
        $possible_date = array_diff($allday, $possible_date);
        $return_possible_date = [];
        foreach ($possible_date as $date){
            $return_possible_date[] = $date;
        }
        $minDay = DB::table('set_date_calendar')->where('id', '=', 1)
        ->select('start_date')->get();
        $maxDay = DB::table('set_date_calendar')->where('id', '=', 1)
                ->select('end_date')->get();

return view('personal_account.calendar_order', ["order_date" => json_encode($order_date), "possible_date" =>
  json_encode($return_possible_date), "book_id" => $id , "minDay" => json_encode($minDay[0]->start_date),
    "maxDay" => json_encode($maxDay[0]->end_date)]);
    }

    public function book_send_order($id){
        $user_id = Auth::user()['id'];
        $status = "active";
        $order_date = Request::all();
        $date = strtotime($order_date["date_order"]);
        $dateToBD = date("Y-m-d", $date);
        DB::table('order_books')->insert(array('id_user' => $user_id, 'id_book' => $id,
            'status' => $status, 'date_order' => $dateToBD));
       return redirect('library/books');

    }

//личный кабинет студента
    public function studentCabinet(){
        DB::table('issure_book')->where('date_return', '<', date("Y-m-d"))
            ->update(array('status' => "delay"));

        $orders = DB::table('order_books')->join('book', 'order_books.id_book', '=', 'book.id')
            ->where('id_user', '=', Auth::user()['id'])
            ->select('order_books.id', 'order_books.date_order', 'order_books.id_user', 'order_books.status',
                'order_books.status', 'order_books.id_book', 'book.title', 'book.author')
            ->orderBy('date_order')->get();

        $books = DB::table('issure_book')->join('book', 'issure_book.id_book', '=', 'book.id')
            ->where('id_user', '=', Auth::user()['id'])
            ->select('issure_book.id', 'issure_book.date_issure', 'issure_book.date_return', 'issure_book.id_user',
                'issure_book.status', 'issure_book.id_book', 'book.title', 'book.author')->orderBy('date_return')->get();
// для таблицы мои заказы
        $dateOrders = [];
        foreach ($orders as $order){
            if ($order->status == "active"){
                $dateOrders[] = $order->date_order;
            }
        }
        $dateOrders = array_unique($dateOrders);
        $titleOrders = [];
        foreach ($orders as $order){
            if ($order->status =="active") {
                $titleOrders[] = $order->title;
                }
        }
        $titleOrders  = array_unique($titleOrders );
        $authorOrders = [];
        foreach ($orders as $order){
            if ($order->status == "active") {
                $authorOrders[] = $order->author;
            }
        }
        $authorOrders  = array_unique($authorOrders );

        // для таблицы книги на руках
        $titleMyBooks = [];
        foreach ($books as $book){

                $titleMyBooks[] = $book->title;

        }
        $titleMyBooks = array_unique($titleMyBooks);
        $authorMyBooks = [];
        foreach ($books as $book){

                $authorMyBooks[] = $book->author;

        }
        $authorMyBooks = array_unique($authorMyBooks);
        $dateReturnMyBooks = [];
        foreach ($books as $book){

            $dateReturnMyBooks[] = $book->date_return;

        }
        $dateReturnMyBooks = array_unique($dateReturnMyBooks);
        $dateIssureMyBooks = [];
        foreach ($books as $book){

            $dateIssureMyBooks[] = $book->date_issure;

        }
        $dateIssureMyBooks = array_unique($dateIssureMyBooks);

        return view("personal_account.student_cabinet", compact("orders","books", "dateOrders", "titleOrders", "authorOrders", "titleMyBooks",
            "authorMyBooks", "dateReturnMyBooks", "dateIssureMyBooks"));
    }

    //Отмена заказов студентом
    public function studentOrderDelete($id){
        $request = Request::all();
        DB::table('order_books')->where('id', '=', $id)->delete();
      return $id;

    }
    //// Удаление сообщений об отменённом заказе студентом
    public function studentMessageDelete($id){
        $request = Request::all();
        DB::table('order_books')->where('id', '=', $id)->delete();
        return $id;
    }
    //// Настройка календаря для продления книги студентом
    public function studentSettingCalendar(){
        $result = DB::table('set_date_calendar')->where('id', '=', 1)
            ->select('days')->get();
        $possible_date = str_split($result[0]->days);
        $allday = ["0", "1", "2", "3", "4", "5", "6"];
        $possible_date = array_diff($allday, $possible_date);
        $return_possible_date = [];
        foreach ($possible_date as $date){
            $return_possible_date[] = $date;
        }
        $minDay =DB::table('set_date_calendar')->where('id', '=', 1)
            ->select('start_date')->get();
        $maxDay =DB::table('set_date_calendar')->where('id', '=', 1)
            ->select('end_date')->get();
        return  [ "possible_date" => json_encode($return_possible_date), "minDay" => json_encode($minDay[0]->start_date),
            "maxDay" => json_encode($maxDay[0]->end_date)];
    }
// перенос даты возврата книги студентом
    public function studentExtendDate($id){
        $request = Request::all();
        $dateReturn = strtotime($request["date_extend"]);
        $dateReturnToBD = date("Y-m-d", $dateReturn);
        DB::table('issure_book')->where('id', '=', $id)->update(['date_return' => $request["date_extend"]]);
        DB::table('order_books')->where([
            ['id_book', '=', $request["id_book"]],
            ['date_order', '<=', $request["date_extend"]
                ]
        ])->update(['status' => 'extendS']);
        return $request["date_extend"];
    }



    public function getvalues($arr) {
        return $arr['date'];
         }

     public function lection($id){
       $book_id = $id;
       $ordered = Order::where('book_id', '=', $book_id);
         $ordered->select('date');
         $arr = $ordered->get()->toArray();
         $arr_processed = [];
         foreach($arr as $elem){
             $arr_processed[] = $elem['date'];
         }
       $result1 = Lecture::whereNotIn('date', $arr_processed)->get();
 	   //$query1 = "SELECT Lecture.id, Lecture.date FROM `Lecture` where Lecture.date not in (SELECT date FROM `order` where order.book_id ='$book_id')";
       $success = false;
    return view("library.lection", compact('book_id','result1', 'success'));
     }

    public function ebookindex(){
        $ebook=Ebook::select();
        $results=$ebook->get();
        /*$link = mysqli_connect('localhost','root','root','libr');
        $link->query("SET CHARACTER SET utf8");*/
        //$results = array();
        for ($i = 0; $i < 5; $i++){
            //$query = "SELECT * FROM ebook WHERE section=$i";
            $query=Ebook::where('section', '=', "$i");
            $results[$i] = $query->get();
        }
        $searchquery = "";
        return view("library.ebooks", compact('results','searchquery'));
    }
    public function esearch(){
        $search = Request::input('search');
        $ebook=Ebook::where('title', 'like', "%$search%");
        $ebook->orWhere('author', 'like', "%$search%");
        //$query = "SELECT * FROM `ebook` WHERE UPPER(`title`) LIKE UPPER('%$search%') OR UPPER(`author`) LIKE UPPER('%$search%')";
        //$results = $link->query($query);
        $results= $ebook->get();
        $searchquery = $search;
        return view("library.ebooks", compact('results','searchquery'));
    }


    public function library_calendar(){
        $success = false;
        return view("personal_account.library_calendar", compact('success'));
    }

    public function create_date(){
        $datapicker = Request::input('data_picker');
        //fuck the ORM
        DB::delete("TRUNCATE TABLE `Lecture`");
            $date = new DateTime($datapicker);
            //$query = DB::insert("INSERT INTO `Lecture`(`id`, `date`) VALUES(NULL,'".$date->format('Y-m-d')."')");
            //$result = $link->query($query);

            for ($j=0; $j<16; $j++) {
                DB::insert("INSERT INTO `Lecture`(`id`, `date`) VALUES(NULL,'".$date->format('Y-m-d')."')");
                $date->modify('+7 day');
            }
        $success = true;
        return view("personal_account.library_calendar", compact('success'));
    }

    public function     library_order_list(){
        $result = DB::Select("SELECT `order`.`id`, `order`.`student_id`, `order`.`date`,`order`.`status`, `order`.`book_id`, `book`.`title`, `book`.`author` FROM `order` INNER JOIN `book` ON book.id=order.book_id ORDER BY date");
        $result = json_decode(json_encode($result), true);
        return view("personal_account.library_order_list", compact('result'));
    }

    public function order_list_delete(){
      //  $link = mysqli_connect('localhost','root','root','libr');
      // $link->query("SET CHARACTER SET utf8");
        $return = Request::input('return');
        if (count($return) > 0){
            foreach ($return as $id) {
                //$query = DB::delete ("DELETE FROM `order` WHERE order.id=".$id);
                $result = DB::delete ("DELETE FROM `order` WHERE order.id=".$id);
                $result = json_decode(json_encode($result), true);
               // $result = $link->query($query);
            }
        }

        $result = DB:: Select("SELECT `order`.`id`, `order`.`student_id`, `order`.`date`, `order`.`status`, `order`.`book_id`, `book`.`title`, `book`.`author` FROM `order` INNER JOIN `book` ON book.id=order.book_id  ORDER BY date");
        $result = json_decode(json_encode($result), true);
        // $result = $link->query($query);

        return view("personal_account.library_order_list", compact('result'));
    }


    public function student_lib_account(){
        //TODO: сюда нужна авторизация для пользователя
        $result = DB::Select("SELECT `order`.`id`, `order`.`student_id`, `order`.`date`, `order`.`book_id`, `book`.`title`, `book`.`author` FROM `order` INNER JOIN `book`  WHERE `order`.student_id = 'vasya' && book.id=`order`.book_id && `order`.date > CURDATE() ORDER BY date");
        $result = json_decode(json_encode($result), true);
        return view("personal_account.student_lib_account", compact('result'));
    }
    public function student_order_delete(){
        $return = Request::input('return');
        if (count($return) > 0){
            foreach ($return as $id) {

                $result = DB::delete ("DELETE FROM `order` WHERE order.id=".$id);
                $result = json_decode(json_encode($result), true);
            }
        }
//TODO: сюда тоже нужна авторизация для пользователя
        $result = DB:: Select("SELECT `order`.`id`, `order`.`student_id`, `order`.`date`, `order`.`book_id`, `book`.`title`, `book`.`author` FROM `order` INNER JOIN `book`  WHERE `order`.student_id = 'vasya' && book.id=`order`.book_id && `order`.date > CURDATE() ORDER BY date");
        $result = json_decode(json_encode($result), true);


        return view("personal_account.student_lib_account", compact('result'));
    }
    public function student_lib_account2(){
        //TODO: сюда нужна авторизация для пользователя
        $result = DB::Select("SELECT `order`.`id`, `order`.`student_id`, `order`.`status`, `order`.`date`, `order`.`book_id`, `book`.`title`, `book`.`author` FROM `order` INNER JOIN `book`  WHERE `order`.student_id = 'vasya' && book.id=`order`.book_id && `order`.date <= CURDATE() ORDER BY date");
        $result = json_decode(json_encode($result), true);
        return view("personal_account.student_lib_account2", compact('result'));
    }
    public function edit_order_status0($order_id){
       // $order_id = DB::Select("SELECT `order`.`id` FROM `order` INNER JOIN `book` ON book.id=order.book_id");
        $result = DB:: Update("UPDATE `order` SET `status`='1' where `order`.id=".$order_id);
        $result = json_decode(json_encode($result), true);
        return BooksController::library_order_list();

    }
    public function edit_order_status1($order_id){
       // $order_id = DB::Select("SELECT `order`.`id` FROM `order` INNER JOIN `book` ON book.id=order.book_id");
        $result = DB:: Update("UPDATE `order` SET `status`='0' where `order`.id=".$order_id);
        $result = json_decode(json_encode($result), true);
        return BooksController::library_order_list();

    }
  }