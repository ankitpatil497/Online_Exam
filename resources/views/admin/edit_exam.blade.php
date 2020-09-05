@extends('layouts.app')
@section('title','Category')
@section('content')
     <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">edit category</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <!-- Default box -->
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Edit Category</h3>
                        </div>
                        <div class="card-body">
                          <form action="{{route('admin.update.exam',$exam->id)}}"  class="database_operation"  >
                            @csrf

                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="title">Exam Title</label>
                                      <input type="text" value="{{$exam->title}}" required="required" id="title" class="form-control" name="title" placeholder="Enter the title">
                                  </div>
                              </div>                
                            </div>
              
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="exam_date">Exam Date</label>
                                      <input type="date" value="{{$exam->exam_date}}" required="required" id="exam_date" class="form-control" name="exam_date">
                                  </div>
                              </div>                
                            </div>
              
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="category">Category</label>
                                      <select class="form-control" required name="category">
                                          <option value="">Select</option>
                                          @foreach ($cat as $c)
                                              <option <?php if($exam->oex_category_id==$c->id){ {echo('selected');} }?> value="{{$c->id}}">{{$c->name}}</option>                                
                                          @endforeach
                                        </select>
                                  </div>
                              </div>                
                            </div>
              
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group" >
                                      <button type="submit" class="btn btn-primary">Add</button>
                                  </div>
                              </div>
                            </div>
                        </form>
                        </div>
                        <!-- /.card-body -->
                        
                        <!-- /.card-footer-->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
              </section>
        </div>
  <!-- /.content-wrapper -->
@endsection