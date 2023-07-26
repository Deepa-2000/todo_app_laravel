@extends('items.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container-fluid pull-left">
                <h3> Show Product</h3>
            </div>
            <div class="container-fluid mt-2 pull-right">
                <a class="btn btn-primary" href="{{ route('items.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="container-fluid mt-3 row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $item->item_name }}
            </div>
        </div>
    </div>
@endsection