{{-- Part of dashdoard project. --}}
@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>店家名稱</th>
                                    <th>邀請碼</th>
                                    <th>清單</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($stores as $store)
                                    <tr>
                                        <td>
                                            {{ $store->id }}
                                        </td>
                                        <td>
                                            {{ $store->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('line.store.code', ['id' => $store->id]) }}"  class="btn btn-primary">
                                                索取
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">清單</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
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