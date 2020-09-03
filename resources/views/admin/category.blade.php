@extends('layouts.app')
@section('title','Dashboard')
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
                    <li class="breadcrumb-item active">category</li>
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
                          <h3 class="card-title">Title</h3>
          
                          <div class="card-tools">
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add">Add</a>
                          </div>
                        </div>
                        <div class="card-body">
                         <table class="table table-striped table-bordered datatable">
                             <thead>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </thead>
                             <tbody>
                                @foreach ($cat as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->name}}</td>
                                        <td><input type="checkbox" name="status" id="status"></td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                         </table>
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

  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ADD">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.add.Category')}}"  class="database_operation"  >
              @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" required="required" id="name" class="form-control" name="name" placeholder="Enter the name">
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
      </div>
    </div>
  </div>
@endsection