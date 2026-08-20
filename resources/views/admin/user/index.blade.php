@extends('admin.layouts.master')
@section('admin_main')

<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Manage All Users </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_user_create')}}">Add User</a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>    
                                                    <th> Name</th>
                                                    <th>Email</th>
                                                    <th>Addres</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($users as $item)
                                                      <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    @if ($item->photo)
                                                    <td>
                                                        <img style="width:70px;" src="{{ asset(  $item->photo) }}" alt="">
                                                    </td>
                                                    @else
                                                    <td>
                                                         No image
                                                    </td>
                                                        
                                                    @endif
                                                     <td>{{$item->name}}</td>
                                                     <td>{{$item->email}}</td>
                                                    <td>{{ $item->address }}</td>

                                                     <td>
                                                        @if ($item->status == 1)
                                                         <span class="btn btn-success" >
                                                            Active
                                                         </span>
                                                            
                                                        @elseif($item->status ==2)
                                                          <span class="btn btn-danger" >
                                                            Blocked
                                                         </span>
                                                        @else
                                                         <span class="btn btn-warning" >
                                                            Pending
                                                         </span>
                                                        @endif
                                                     </td>
                                                    <td class="pt_10 pb_10">
                                                        
                                                      <a href="{{ route('admin_user_edit', $item->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i></a>
                                                        <a href="{{route('admin_user_delete',$item->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?. you went to delete this user');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    <div class="modal fade" id="modal_1" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">Item Name</label></div>
                                                                        <div class="col-md-8">Laptop</div>
                                                                    </div>
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">Description</label></div>
                                                                        <div class="col-md-8">This is a very good product. This is a very good product. This is a very good product. This is a very good product. This is a very good product. This is a very good product. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection