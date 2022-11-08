<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactsSendmail;

class ContactsController extends Controller
{
    public function index() {
        return view('contact.index');
    }

    public function confirm(Request $request) {
        // validationの定義
        $request->validate ([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required',
        ]);

        // フォームからの送られた値を全て取得
        $inputs = $request->all();

        // 確認ページに表示
        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }

    public function send(Request $request) {
        // validation
        $request -> validate ([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required',
        ]);

        // actionの値を取得
        $action = $request->input('action');
        // action以外の値を取得
        $inputs = $request->except('action');

        if($action !== 'submit') {
            return redirect()
            ->route('contact.index')
            ->withInput($inputs);
        } else {
            // ユーザーにメールを送信
            \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
            // 自分にメールを送信
            \Mail::to('***@gmail.com')->send(new ContactsSendmail($inputs));

            // 二重送信対策(送信ボタンを複数押す、ページを戻り再度送信を押す）のためのトークンを発行
            $request->session()->regenerateToken();

            // 送信完了ページのview表示
            return view('contact.thanks');

        }


    }
}
