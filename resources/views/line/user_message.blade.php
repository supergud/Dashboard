{{-- Part of dashdoard project. --}}
@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$line->display_name}}
                <small>詳細資料</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">LINE</a></li>
                <li class="active">{{$line->display_name}} 的使用者資料</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">{{$line->display_name}}</h3>
                                <h5 class="widget-user-desc">
                                    @if(!empty($info->statusMessage))
                                        {{$info->statusMessage}}
                                    @else
                                        這個人很懶，什麼狀態也沒留下
                                    @endif
                                </h5>
                                </div>
                                <div class="widget-user-image">
                                @if(!empty($info->pictureUrl))   
                                    <img class="img-circle" src="{{$info->pictureUrl}}" alt="User Avatar">
                                @else
                                    <img class="img-circle" src="https://i.imgur.com/XXiXbii.png" alt="User Avatar">
                                 @endif
                                </div>
                                <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <span class="description-text">使用者名稱</span>
                                        <h5 class="description-header">
                                        @if(!empty($info->displayName))
                                            {{$info->displayName}}
                                        @else
                                            未知的名稱
                                        @endif</h5>
                                    </div>
                                    <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <span class="description-text">LINE Mid</span>
                                        <h5 class="description-header">{{$line->line_user_id}}</h5>
                                    </div>
                                    <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                    <div class="description-block">
                                        <span class="description-text">綁定時間</span>
                                        <h5 class="description-header">{{$line->created_at}}</h5>
                                    </div>
                                    <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                </div>
                                
                            </div>

                        <form action="{{ route('line.send.user.message') }}" method="post">
                        @csrf
                            <div class="input-group">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            
                                @if(!empty($info->displayName))
                                    <input type="text" name="message" placeholder="和 {{ $info->displayName }} 說點什麼..." class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">LINE TA</button>
                                    </span>
                                @else
                                    <input type="text" name="message" placeholder="使用者封鎖我們了，想說也說不出去了" class="form-control" readonly>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat" disabled>LINE TA</button>
                                    </span>
                                @endif
                                
                            </div>
                        </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop