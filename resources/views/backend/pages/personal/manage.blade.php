@extends('backend.template.layout')

@section('body-content')
<!-- main content start -->
<div class="main-content">
    <div class="container-fluid">
        
        <!-- page indicator start -->
        <section class="page-indicator">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <i class="fas fa-bars"></i>
                        </li>
                        <li>
                        Personal
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">

          
            <!-- add row start -->
            <div class="row add-row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        add new Personal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Personal</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('personalStore') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    
                                    <div class="row">
                                        

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>description</label>
                                                <textarea class="form-control" name="description" ></textarea>                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Job</label>
                                                <input type="text" class="form-control" name="job" >                                 
                                            </div>                                      
                                        </div>  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input type="text" class="form-control" name="birthday" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" >                                 
                                            </div>                                      
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" name="location" >                                 
                                            </div>                                      
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>link</label>
                                                <input type="text" class="form-control" name="link" >                                 
                                            </div>                                      
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" name="image" id="image">                                 
                                            </div>                                      
                                        </div>  

                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add</button>                                    
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>   

                </div>
            </div>
            <!-- add row end -->


            <!-- manage row start -->
            <div class="row">

                
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>title</td>
                                <td>description</td>
                                <td>name</td>
                                <td>job</td>
                                <td>phone</td>
                                <td>birthday</td>
                                <td>email</td>
                                <td>location</td>
                                <td>link</td>
                                <td>image</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($personals as $personal)
                            <tr>
                                <th>{{ $i }}</th>
                                <th>{{ $personal->title }}</th>
                                <th>{!! $personal->description !!}</th>
                               
                                <th>{{ $personal->name }}</th>
                                <th>{{ $personal->job }}</th>
                                <th>{{ $personal->phone }}</th>
                                <th>{{ $personal->birthday }}</th>
                                <th>{{ $personal->email }}</th>
                                <th>{{ $personal->location }}</th>
                                <th>{{ $personal->link }}</th>
                               
                                
                                <td>
                                    @if( $personal->image != NULL )
                                    <img src="{{ asset('images/'.$personal->image) }}" class="img-fluid" width="50px" alt="">
                                    @else
                                    <p class="badge badge-danger">No image uploaded</p>
                                    @endif
                                </td>

                              

                                
                                <td>
                                
                                <!-- edit start -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $personal->id }}">
                                    edit
                                </button>
                                <div class="modal fade" id="edit{{ $personal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">personal</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('personalUpdate', $personal->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                               
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label> Image *</label>
                                                            <img src="{{ asset('images/'. $personal->image) }}"  width="100px" alt=""> 
                                                            <input type="file" class="form-control-file" name="image">                                 
                                                        </div>                                      
                                                    </div>  
                                                    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{$personal->title}}" >                                 
                                                    </div>                                      
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <textarea class="form-control" name="designation" >{!!$personal->title!!}</textarea>                                 
                                                    </div>                                      
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{$personal->name}}">                                 
                                                    </div>                                      
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Job</label>
                                                        <input type="text" class="form-control" name="job" value="{{$personal->job}}" >                                 
                                                    </div>                                      
                                                </div>  
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{$personal->phone}}" >                                 
                                                    </div>                                      
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Birthday</label>
                                                        <input type="text" class="form-control" name="birthday" value="{{$personal->birthday}}">                                 
                                                    </div>                                      
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{$personal->email}}" >                                 
                                                    </div>                                      
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" name="location" value="{{$personal->location}}" >                                 
                                                    </div>                                      
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>link</label>
                                                        <input type="text" class="form-control" name="link" value="{{$personal->link}}" >                                 
                                                    </div>                                      
                                                </div>                                     
                                                    </div> 
                                                </div>
                                                
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button>                                    
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit end -->
                                <!-- delete start -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $personal->id }}">
                                    delete
                                </button>
                                <div class="modal fade" id="delete{{ $personal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">personal delete</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('personalDelete', $personal->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success">yes</button>
                                            </form>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete end -->

                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- manage row end -->

        </section>
        <!-- dashbaord statistics seciton end -->

    </div>
</div>
<!-- main content end -->
@endsection