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
                            Experience
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
                        add new Contacts
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Experience</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('contactStore') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>address</label>
                                               
                                                <input type="text" class="form-control-file" name="address" >                                 
                                            </div>                                      
                                        </div>    

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>contact</label>
                                                <input type="text" class="form-control-file" name="contact" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>email</label>
                                                <input type="text" class="form-control-file" name="email" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>facebook</label>
                                                <input type="text" class="form-control-file" name="facebook" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>instagram</label>
                                                <input type="text" class="form-control-file" name="instagram" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>linkedin</label>
                                                <input type="text" class="form-control-file" name="linkedin" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>github</label>
                                                <input type="text" class="form-control-file" name="github" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>youtube</label>
                                                <input type="text" class="form-control-file" name="youtube" >                                 
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
                                <td>address</td>
                                <td>contact</td>
                                <td>email</td>
                                <td>facebook</td>
                                <td>instagram</td>
                                <td>linkedin</td>
                                <td>github</td>
                                <td>youtube</td>
                               
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($contacts as $contact)
                            <tr>
                                <th>{{ $i }}</th>
                                <td>
                                    {{$contact->address}}
                                </td>
                                <td>
                                    {{$contact->contact}}
                                </td>
                                
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->facebook}}</td>
                                <td>{{$contact->instagram}}</td>
                                <td>{{$contact->linkedin}}</td>
                                <td>{{$contact->github}}</td>
                                <td>{{$contact->youtube}}</td>

                               
                                <td>
                                
                                <!-- edit start -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $contact->id }}">
                                    edit
                                </button>
                                <div class="modal fade" id="edit{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">contact</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('contactUpdate', $contact->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                               
                                                <div class="row">
                                             
                                                <div class="col-md-12">
                                            <div class="form-group">
                                                <label>address</label>
                                               
                                                <input type="text" class="form-control-file" name="address" value="{{$contact->address}}" >                                 
                                            </div>                                      
                                        </div>    

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>contact</label>
                                                <input type="text" class="form-control-file" name="contact" value="{{$contact->contact}}" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>email</label>
                                                <input type="text" class="form-control-file" name="email" value="{{$contact->email}}" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>facebook</label>
                                                <input type="text" class="form-control-file" name="facebook" value="{{$contact->facebook}}" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>instagram</label>
                                                <input type="text" class="form-control-file" name="instagram" value="{{$contact->instagram}}" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>linkedin</label>
                                                <input type="text" class="form-control-file" name="linkedin" value="{{$contact->linkedin}}" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>github</label>
                                                <input type="text" class="form-control-file" name="github" value="{{$contact->github}}" >                                 
                                            </div>                                      
                                        </div>  

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>youtube</label>
                                                <input type="text" class="form-control-file" name="youtube" value="{{$contact->youtube}}">                                 
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
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $contact->id }}">
                                    delete
                                </button>
                                <div class="modal fade" id="delete{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">contact delete</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('contactDelete', $contact->id) }}" method="post">
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