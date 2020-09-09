@extends('layouts.portal')
@section('title','Poratl Dashboard')
@section('content')
     <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Portal Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    @foreach ($exam as $key=>$e)
                        <?php 
                            if (strtotime(date('Y-m-d'))>strtotime($e->exam_date))
                                $cls="bg-danger";
                            else
                                if ($key%2==0)
                                    $cls="bg-info";
                                else
                                    $cls="bg-success";
                        ?>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box {{$cls}}">
                                <div class="inner">
                                    <h3>{{$e->title}}</h3>

                                    <p>{{$e->oex_category->name}}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                @if (strtotime(date('Y-m-d'))>strtotime($e->exam_date))
                                <p  class="small-box-footer">Exam date Gone.. <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>
                                @else                                
                                    <a href="{{route('portal.exam_form',$e->id)}}   " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                @endif
                            </div>
                        </div>

                        
                    @endforeach
                </div>
                <!-- ./col -->
           
                
                
                
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
  <!-- /.content-wrapper -->
@endsection