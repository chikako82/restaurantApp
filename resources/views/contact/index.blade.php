@extends('layouts.common')

@section('content')
<div class="container mt-5">
    <h3 class="text-danger font-weight-bold">お問い合わせ</h3>
    <hr class="bg-danger" />

    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <div class="form-group col-6">
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
            @if ($errors->has('name'))
            <p class="error-message">{{ $errors->first('name') }} </p>
            @endif
        </div>

        <div class="form-group col-6">
            <label for="email">メールアドレス</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
            @if ($errors->has('email'))
            <p class="error-message">{{ $errors->first('email') }} </p>
            @endif
        </div>

        <div class="form-group col-6">
            <label for="mail-title">タイトル</label>
            <input type="text" id="mail-title" name="title" value="{{ old('title') }}" class="form-control">
            @if ($errors->has('title'))
            <p class="error-message">{{ $errors->first('title') }} </p>
            @endif
        </div>

        <div class="form-group">
            <label><p>お問い合わせ内容</p>
            <textarea name="body" id="mail-content" cols="50" rows="3" class="form-textarea">{{ old('body')  }}</textarea></label>
            @if ($errors->has('body'))
            <p class="error-message">{{ $errors->first('body') }} </p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">入力内容確認</button>

    </form>

</div>
@endsection
