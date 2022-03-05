@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">махалла</h1></div>
                </div>
                <hr>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{route('admin.village.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                            <div class="form-group">
                                <label for="number">махалла</label>
                                <select class="custom-select" id="price_id" name="region_id">

                                    @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                        <input type="hidden" name="region_id" value="{{\Illuminate\Support\Facades\Auth::user()->role}}">
                        @endif
                        <div class="form-group">
                            <label for="header_ru">номи</label>
                            <input type="text" name="name" class="form-control" id="header_ru" placeholder="номи">
                        </div>






                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
