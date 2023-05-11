@extends('layouts.app')

@section('content')
    <h1>ログイン</h1>

    @if (session('danger'))
        <div class="alert alert-danger">{{ session('danger') }}</div>
    @endif

    <form action="{{ route('sessions.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">パスワード:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
@endsection
