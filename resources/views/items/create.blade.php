@extends('items.layout')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-info">
        {{ $message }}
    </div>
@endif

    <div class="container">
        <h3 class="mt-3 text-center">Add Items</h3>
        <form action="{{route('items.index')}}" method="post">
            @csrf
            <div class="col-4 mt-3" style="margin-left: 380px;">

                <input type="text" class="form-control" name="item_name" placeholder="Title">

                @if($errors->has('item_name'))

                    <span class="text-danger">{{ $errors->first('item_name') }}</span>

                @endif

                <input type="submit" class="form-control btn btn-primary mt-2" name="submit" value="Add">

            </div>

        </form>
    </div>
@endsection