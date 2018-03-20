{{-- Part of dashdoard project. --}}
@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LINE Bot 更新日誌
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>LINE Bot</li>
            <li class="active">總覽</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div id="130" class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 1.3.0 - <a target="_blank" href="https://drive.google.com/open?id=18BzwP8vdPNSDFGzY3TwiSm26E0uSLs43G4Sx1fdUmxs">PRD</a></div>
      <div class=" small text-muted">更新於 2018-02-21</div>
      <div class="card-body">
        <ol>
            <li>增加 API
                <ul>
                    <li>Rich menu 分級 - 未綁定</li>
                    <li>Rich menu 分級 - 綁定的新會員</li>
                    <li>Rich menu 分級 - 綁定的老會員</li>
                    <li>Rich menu 分級 - 老闆</li>
                    <li>推播 - 成功訂單</li>
                    <li>推播 - 預約訂單</li>
                    <li>推播 - 異常訂單</li>
                    <li>Dashboard 報表推播</li>
                </ul>
            </li>
            <li>推薦店家清單增加地圖導覽</li>
            <li>訂單預約/成功/失敗/取消/的 UI</li>
        </ol>
      </div>
    </div>

    <div class="card mb-3">
      <div id="120" class="card-header">
        <i class="fa fa-sticky-note"></i> V 1.2.0 - <a target="_blank" href="https://drive.google.com/open?id=1y5lfb-FqwdyeIpjFTLLz8aUeJZ9JqCCF-LsrimhtMIE">PRD</a></div>
        <div class="small text-muted">更新於 2018-02-13</div>
      <div class="card-body">
        <ol>
            <li>快速選單『常用位址』調整成『住家』『公司』『常用』</li>
        </ol>
      </div>
      
    </div>

    <div id="110" class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 1.1.0 - <a target="_blank" href="https://drive.google.com/open?id=1Q-0gUbVS7u6Dorx5_xPW5SR7Yv0k6dObuCNzQcjFxLE">PRD</a></div>
      <div class="small text-muted">更新於 2018-02-10</div>
      <div class="card-body">
        <ol>
            <li>商家圖片</li>
            <li>通知優化</li>
            <li>推薦商家的城市列表</li>
        </ol>
      </div>
    </div>

    <div id="101" class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 1.0.1 - <a target="_blank" href="https://drive.google.com/open?id=1bZIqy7A3J4iTPF2kZsJOhmt7Ste3uONEBsU_sgyGiNc">PRD</a></div>
        <div class="small text-muted">更新於 2018-02-05</div>
      <div class="card-body">
        <ol>
            <li>修正客服</li>
            <li>移除搜尋功能</li>
        </ol>
      </div>
    </div>

    <div id="100" class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 1.0.0 - <a target="_blank" href="https://drive.google.com/open?id=1RvDgsjOTMFXOih5euafioDYFPCzY4UMSNSWRCyOIztc">PRD</a> </div>
      <div class="small text-muted">更新於 2018-02-01</div>
      <div class="card-body">
        <ol>
            <li>全新的 Rich Menu UI/UX</li>
            <li>全新的主選單</li>
            <li>增加『會員專區』 </li>
            <li>改善『處理中訂單』</li>
            <li>改善『歷史訂單』</li>
            <li>主動通知功能</li>
            <li>改善『老樣子』</li>
            <li>增加『快捷菜單』</li>
            <li>增加『快速選單』</li>
            <li>改善『商家功能』</li>
            <li>訂單新增『分享訂單』</li>
        </ol>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 0.1.1</div>
      <div class="small text-muted">更新於 2017-12-13</div>
      <div class="card-body">
        <ol>
            <li>常用店家、推薦店家、收藏店家最佳化</li>
            <li>自動抓取商家圖片</li>
            <li>更聰明的推薦商家</li>
            <li>附近店家的搜尋做些範圍的調整</li>
            <li>更新 Rich menu</li>
            <li>Carousel 圖片重新繪製</li>
        </ol>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 0.1.1</div>
      <div class="small text-muted">更新於 2017-11-30</div>
      <div class="card-body">
        <ol>
            <li>全新的 Rich menu</li>
            <li>全新的主選單</li>
            <li>教學圖 </li>
            <li>Line 權限驗證</li>
        </ol>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> V 0.0.1</div>
      <div class="small text-muted">更新於 2017-11-15</div>
      <div class="card-body">
        <ol>
            <li>Line protostar draft</li>
        </ol>
      </div>
    </div>
    </section>
        <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
@stop