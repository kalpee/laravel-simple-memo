@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ作成</div>
    {{-- ruote('store')と書くと→ /store --}}
    <form class="card-body my-card-body" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">メモ内容を入力してください</div>
        @enderror
    @foreach ($tags as $t)
        <div class="form-check form-check-inline mb-3">
            <input type="checkbox" name="tags[]" class="form-check-input" id="{{ $t['id'] }}" value="{{ $t['id'] }}">
            <label for="{{ $t['id'] }}" class="form-check-label">{{ $t['name'] }}</label>
        </div>
    @endforeach
        <input type="text" name="new_tag" class="form-control w-50 mb-3" placeholder="新しいタグを入力">
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
