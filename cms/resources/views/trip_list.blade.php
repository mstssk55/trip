@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')

@section('content')

<!-- 旅程一覧 -->
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
                                    @if($trip->fname!='')
                                        <div> <img src="../storage/trip_thumb/{{$trip->fname}}" width="100"></div>
                                    @else
                                        <div> <img src="../storage/trip_thumb/default.jpg" width="100"></div>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ url('trip_item/'.$trip->id) }}" method="G">
                                         {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            詳細
                                        </button>
                                     </form>
                                </td>
                                <td class="table-text">
                                    
                                    <div>作成者:{{ $trip->user_id->name }}</div>
                                    @if($trip->user_id->icon !='')
                                        <div> <img src="../storage/icon/{{$trip->user_id->icon}}" width="100"></div>
                                    @else
                                        <div> <img src="../storage/icon/default.png" width="100"></div>
                                    @endif
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

