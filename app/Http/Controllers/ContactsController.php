<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactsController extends Controller
{

//    private $types = [
//        'product' => '商品について',
//        'service' => 'サービスについて',
//        'etc' => 'その他'
//    ];

    private $types = [
        '商品について',
        'サービスについて',
        'その他'
    ];

    private $genders = [
      '男', '女'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->types;
        $genders = $this->genders;

//        $types = $contact->types();
//        dd($contact->types());

        return view('contacts.index', compact('types', 'genders'));
    }

    public function confirm(ContactRequest $request)
    {

        // 「お問い合わせ」を配列から文字列に
//        $type = '';
//        if (isset($request->types)) {
//            foreach ($request->types as $key => $value) {
//                if ($key > 0) $type .= '、';
//                $type .=  $this->types[$value];
//            }
////            $request->types = $type;
//
//            $request->merge(['type' => $type]);
//        }


        $contact = new Contact($request->all());


        // 「お問い合わせ」を配列から文字列に
        $type = '';
        if (isset($request->type)) {
            foreach ($request->type as $key => $value) {
                if ($key > 0) $type .= '、';
                $type .=  $value;
            }
        }

        // 「性別」文字列を取り出す
//        $gender = '';
//        if (isset($request->gender)) {
//            $gender = $this->genders[$request->gender];
//        }

        return view('contacts.confirm', compact('contact', 'type'));
    }

    public function send(ContactRequest $request) {

        $input = $request->except('action');


        if ($request->action === '戻る') {
//            return redirect()->action('ContactsController@index')->withInput($input);
            return redirect()->action('ContactsController@index')->withInput($input);
        }



//        $action = $request->get('action', '戻る');
//        dd($action);

        return view('contacts.send');

    }

}
