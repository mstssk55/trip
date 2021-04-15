<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')

@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            新規旅程登録
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 旅程 -->
        <form enctype="multipart/form-data" action="{{ url('trips') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
            <!-- 旅行のタイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="trip" class="col-sm-3 control-label">タイトル</label>
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="出発日" class="col-sm-3 control-label">出発日</label>
                    <input type="date" name="departure" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="到着日" class="col-sm-3 control-label">到着日</label>
                    <input type="date" name="arrival" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="description" class="col-sm-3 control-label">内容</label>
                    <input type="text" name="description" class="form-control">
                </div>
            </div>
             <div class="col-sm-6">
                <label>サムネイル画像</label>
                <input type="file" name="fname">
            </div>
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Book: 既に登録されてる本のリスト -->
<!-- 現在の本 -->
    @if (count($trips) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>旅行</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($trips as $trip)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $trip->title }}</div>
                                </td>
                                <td>
                                    <form action="{{ url('tripsedit/'.$trip->id) }}" method="POST">
                                         {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                     </form>
                                </td>
                                <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('trip/'.$trip->id) }}" method="POST">
                                         {{ csrf_field() }}
                                         {{ method_field('delete') }}
                                        
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
@include('layouts.footer')

