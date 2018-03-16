{{-- Part of dashdoard project. --}}
@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LINE Bot 總覽
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>LINE Bot</li>
            <li class="active">總覽</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>訊息數</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">更多資訊<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px"></sup></h3>

              <p>好友增加</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">更多資訊<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>好友封鎖</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">更多資訊 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>65</h3>

              <p>有效好友數</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">更多資訊<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-smile-o"></i>
              <h3 class="box-title">LINE Bot 正式版</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ol>
                    <li>狀態：運作中</li>
                    <li>版本號：v 1.2.0</li>
                </ol>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-bomb"></i>
              <h3 class="box-title">LINE Bot Beta</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ol>
                    <li>狀態：運作中</li>
                    <li>版本號：v 1.2.0</li>
                </ol>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-bell-o"></i>
              <h3 class="box-title">更新日誌</h3>
            </div>
            <!-- /.box-header -->
            <div class="card mb-3">
        <div class="list-group list-group-flush small">
          <a class="list-group-item list-group-item-action" href="note#120">
            <div class="media">
              <div class="media-body">
                <strong>1.2.0</strong> 釋出，提供了全新的<strong>快速選單</strong>
                <div class="text-muted smaller">2018-02-13 05:43 </div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="note#110">
            <div class="media">
              <div class="media-body">
                <strong>1.1.0</strong> 釋出，可以看到商家圖片、通知也變得更完善
                <div class="text-muted smaller">2018-02-10 16:37</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="note#101">
            <div class="media">
              <div class="media-body">
                <strong>1.0.1</strong> 釋出，客服接棒給 <strong>Facebook</strong>，和<strong>搜尋</strong>功能說再見
                <div class="text-muted smaller">2018-02-05 16:00</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="note#100">
            <div class="media">
              <div class="media-body">
                <strong>1.0.0</strong> Line protostar 初版誕生
                <div class="text-muted smaller">2018-02-01 15:54</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="note">看更多更新日誌</a>
        </div>
      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- END TYPOGRAPHY -->

    </section>
        <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
@stop