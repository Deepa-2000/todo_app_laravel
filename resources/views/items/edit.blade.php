@extends('items.layout')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-info">
        {{ $message }}
    </div>
@endif

    <div class="container">
        <h3 class="mt-3 text-center">Update Items</h3>
        <form action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-4 mt-3" style="margin-left: 380px;">

                <input type="text" class="form-control" name="item_name" placeholder="Title" value="{{ $item->item_name }}">

                @if($errors->has('item_name'))

                    <span class="text-danger">{{ $errors->first('item_name') }}</span>

                @endif

                <input type="file" name="item_image" class="form-control">
                <img id="original" src="{{ url('assets/Image/'.$item->item_image) }}" height="70px" width="70px">

                @if($errors->has('item_image'))

                    <span class="text-danger">{{ $errors->first('item_image') }}</span>

                @endif

                <input type="submit" class="form-control btn btn-primary mt-2" name="submit" value="Update">

            </div>

        </form>
    </div>
@endsection