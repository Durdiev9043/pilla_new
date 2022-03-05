@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Касанчилар</h1></div>
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


                    <form action="{{route('admin.farm.update',$farm->id)}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                        <div class="form-group">
                            <label for="number">туман</label>
                            <select class="custom-select" id="price_id" name="region_id">
                                    <option value="{{$farm->region->id}}">{{$farm->region->name}}</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number">махалла</label>
                            <select class="custom-select" id="price_id" name="village_id">

                                    <option value="{{$farm->village->id}}">{{$farm->village->name}}</option>

                            </select>
                        </div>
                        @else
                            <input type="hidden" name="village_id" value="{{$farm->village->id}}">
                            <input type="hidden" name="region_id" value="{{$farm->region->id}}">
                        @endif
                        <div class="form-group">
                            <label for="header_ru">имя</label>
                            <input type="text" name="name" value="{{$farm->name}}" class="form-control" id="header_ru" placeholder="имя">
                        </div>

                        <div class="form-group">
                            <label for="header_ru">кути</label>
                            <input type="text" name="algan_qutisi" value="{{$farm->algan_qutisi}}" class="form-control" id="header_ru">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">гр</label>
                            <input type="text" name="olgan_gr" value="{{$farm->olgan_gr}}" class="form-control" id="header_ru">
                        </div>

                        <div class="form-group">
                            <label for="header_ru">Шарт</label>
                            <input type="text" name="topshirish_rejasi" value="{{$farm->topshirish_rejasi}}" class="form-control" id="header_ru" placeholder="Шарт">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">ҳақиқатда топширди</label>
                            <input type="text" name="topshirgani" value="{{$farm->topshirgani}}" class="form-control" id="header_ru" placeholder="ҳақиқатда топширди">
                        </div>




                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
