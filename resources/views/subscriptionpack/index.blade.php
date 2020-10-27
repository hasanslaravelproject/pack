
@extends('helper.file')
@section('content')
    <div class="row ">
        <div class="col-md-10 offset-1 ">
            <div class="card mb-3">
                <div class="card-header bg-primary">

                    <div class="text-right">
                        <a href="{{URL::to('logout')}}" button class="btn btn-danger" >logout</button>></a>

                        <button type="button" class="btn btn-secondary" id="addmodal">Add New</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table bordered dtable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Package Name</th>
                            <th>Image</th>
                            <th>Package ID</th>
                            <th>Validity</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($s =1)
                        @foreach ($abcs as $st)
                            <tr>

                                <td>{{$s++ }}</td>
                                <td>{{ $st->packagename }}</td>
                                <td><img src="{{asset('backend/image/im1/'.$st->s_image)}}" alt="" width="50"></td>
                                <td>{{ $st->packageid }}</td>
                                <td>{{ $st->validity }}</td>
                                <td>{{ $st->price }}</td>
                                <td>{{ $st->type }}</td>
                                <td>
                                <?php
                                    if ($st->status ==0){
                                        echo '<button class="btn btn-danger st" value="'.$st->id .'">Disabled</button>';
                                    }else{
                                        echo '<button class="btn btn-success st" value="'.$st->id .'">Enabled</button>';
                                    }

                                    ?>
                                </td>

                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>

                                <td>
                                    <button class="btn btn-warning edit" value="{{ $st->id }}">Edit</button>
                                    <button class="btn btn-danger del" value="{{ $st->id }}">Delete</button>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span id="modal-title"></span> Subscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="form4submit">

                        <div class="form-group">
                            <label for="">packagename</label>
                            <input type="text" name="packagename" id="packagename" placeholder ="packagename" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="s_image" id="s_image" placeholder ="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">packageid</label>
                            <input type="text" name="packageid" id="packageid" placeholder ="packageid" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">validity</label>
                            <input type="text" name="validity" id="validity" placeholder ="validity" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">price</label>
                            <input type="text" name="price" id="price" placeholder ="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">type</label>
                            <input type="text" name="type" id="type" placeholder ="type" class="form-control">
                        </div>

                        <input type="text" name="inid" id="inid" value="" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="state" value="save">Save</button>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection

