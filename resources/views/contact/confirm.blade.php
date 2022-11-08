@extends('layouts.common')

@section('content')
<div class="container mt-5">
    <h3 class="text-danger font-weight-bold">入力確認ページ</h3>
    <hr class="bg-danger" />

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="confirm">お名前<br>
            {{ $inputs['name'] }}
            <input type="hidden" name="name" value="{{ $inputs['name'] }}" class="form-control"></label>
        </div>

        <div class="form-group">
            <label class="confirm">メールアドレス<br>
            {{ $inputs['email'] }}
            <input type="hidden" name="email" value="{{ $inputs['email'] }}" class="form-control"></label>
        </div>

        <div class="form-group">
            <label class="confirm">タイトル<br>
            {{ $inputs['title'] }}
            <input type="hidden" name="title" value="{{ $inputs['title'] }}" class="form-control"></label>
        </div>

        <div class="form-group">
            <label class="confirm">お問い合わせ内容</label><br>
            {!! nl2br(e($inputs['body'])) !!} 
            <input name="body" value="{{ $inputs['body'] }}" type="hidden">
        </div>

        <button type="submit" name="action" value="back" class="btn btn-outline-primary">入力内容を修正する</button>
        <button type="submit" name="action" value="submit" class="btn btn-primary">送信する</button>
    </form>

@endsection