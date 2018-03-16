{{-- Part of dashdoard project. --}}
@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LINE Bot 封鎖記錄
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>LINE Bot</li>
            <li class="active">封鎖紀錄</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <table id="example2" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>mid</th>
                <th>建立於</th>
            </tr>
            </thead>
            <tbody>
            @foreach($unfollows as $unfollow)
                <tr>
                    <td>{{ $unfollow->mid }}</td>
                    <td>{{ $unfollow->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
        <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
@stop