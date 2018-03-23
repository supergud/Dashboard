{{-- Part of dashdoard project. --}}
@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            {{ $store->name }} 的專屬邀請碼
                <small>時效五分鐘的商家邀請碼</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">LINE</a></li>
                <li class="active">商家邀請碼</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">一組邀請碼</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <textarea  class="form-control" rows="1" cols="10">{{ $code }}</textarea><button class="btn btn-info">複製</button>
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

@section('script')
<script>
$("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
    alert("{{ $store->name }} 的邀請碼已經複製，請在五分鐘內使用！");
});
</script>
@stop