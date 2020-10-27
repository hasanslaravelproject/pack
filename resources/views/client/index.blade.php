
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
                            <th>Client Name</th>
                            <th>Iamge</th>
                            <th>PackageId</th>
                            <th>Email</th>
                            <th>clientid</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                        @php($s =1)
                        @foreach ($abcs as $st)
                            <tr>
                                <td>{{$s++ }}</td>
                                <td><img src="{{asset('backend/image/im1/'.$st->s_image)}}" alt="" width="50"></td>

                                <td>{{ $st->clientname }}</td>
                                <td>{{ $st->clientid }}</td>
                                <td>{{ $st->email }}</td>
                                <td>{{ $st->packageid }}</td>
                                <td>{{ $st->expirydate }}</td>
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
                                    <a href="{{ URL::to('subscribe/'.$st->id) }}"><button class="btn btn-warning edit" >subcription</button></a>
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
                    <h5 class="modal-title" id="exampleModalLongTitle"><span id="modal-title"></span> Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="form4submit">

                        <div class="form-group">
                            <label for="">clientname</label>
                            <input type="text" name="clientname" id="clientname" placeholder ="clientname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="s_image" id="s_image" placeholder ="image" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="">email</label>
                            <input type="email" name="email" id="email" placeholder ="email" class="form-control">
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

