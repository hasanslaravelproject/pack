blade
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
                    <div class="row">
@foreach ($pack as $item)
  <div class="col-md-3">
    <div class="card border-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header">{{ $item->packagename }}</div>

        <div class="card-body text-secondary">
          <h5 class="card-title">{{ $item->validity }}</h5>
          <p class="card-text">{{ $item->price }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ URL::to('stripe/'.$item->id) }}"><button class="btn btn-primary">Subscribe</button></a>
        </div>
      </div>
      </div>
@endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

