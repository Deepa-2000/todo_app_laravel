@extends('items.layout')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-info">
        {{ $message }}
    </div>
@endif
    <div class="container mt-5 table-responsive" >
        <table class="table table-bordered" id="dataTable" width="700%" cellspacing="0">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Items_name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($item) > 0)

                @foreach($item as $row )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->item_name }}</td>
                    <td><img src="{{ url('assets/Image/'.$row->item_image) }}" style="height: 70px; width: 70px;"></td>
                    <td>
                        <form action="{{ route('items.destroy',$row->id) }}" method="POST">
   
                            <a class="btn btn-info" href="{{ route('items.show',$row->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('items.edit',$row->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                           <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <!-- <a href="{{ route('items.edit',$row->id) }}"><i class="bi bi-pencil-square"></i></a>|<a href="{{ route('items.destroy',$row->id) }}"><i class="bi bi-trash"></i></a></td> -->
                </tr>
                @endforeach

                @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            </tbody>
            @endif
        </table>
    </div>
@endsection
