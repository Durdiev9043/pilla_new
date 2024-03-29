{{--@extends('admin.master')--}}
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


                    <form action="{{route('admin.staff.update',$staff->id)}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(\Illuminate\Support\Facades\Auth::user()->ruxsat>0)
                        @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                        <div class="form-group">
                            <label for="number">туман</label>
                            <select class="custom-select" id="price_id" name="region_id">
                                    <option value="{{$staff->region->id}}">{{$staff->region->name}}</option>

                            </select>
                        </div>
                                <div class="form-group">
                                    <label for="number">Худуд</label>
                                    <select class="custom-select" id="price_id" name="hudud_id">
                                        <option value="{{$staff->hudud->id}}">{{$staff->hudud->name}}</option>
                                    </select>
                                </div>

                        @else
                            <input type="hidden" name="village_id" value="{{$staff->village->id}}">
                            <input type="hidden" name="hudud_id" value="{{$staff->hudud->id}}">
                            <input type="hidden" name="region_id" value="{{$staff->region->id}}">
                        @endif
                        <div class="form-group">
                            <label for="header_ru">имя</label>
                            <input type="text" name="fullname" value="{{$staff->fullname}}" class="form-control" id="header_ru" placeholder="имя">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">Пас.сер.</label>
                            <input type="text" name="passport" value="{{$staff->passport}}" class="form-control" id="header_ru" placeholder="Пас.сер.">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">ИНН</label>
                            <input type="text" name="inn" value="{{$staff->inn}}" class="form-control" id="header_ru" placeholder="ИНН">
                        </div><div class="form-group">
                            <label for="header_ru">ШЖБПТ</label>
                            <input type="text" name="jshir" value="{{$staff->jshir}}" class="form-control" id="header_ru" placeholder="работа">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">гр</label>--}}
{{--                            <input type="text" name="olgan_gr" value="{{$staff->olgan_gr}}" class="form-control" id="header_ru">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">Шарт</label>--}}
{{--                            <input type="text" name="topshirish_rejasi" value="{{$staff->topshirish_rejasi}}" class="form-control" id="header_ru" placeholder="Шарт">--}}
{{--                        </div>--}}
                        @endif
{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">ҳақиқатда топширди</label>--}}
{{--                            <input type="text" name="topshirgani" value="{{$staff->topshirgani}}" class="form-control" id="header_ru" placeholder="ҳақиқатда топширди">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">га</label>--}}
{{--                            <input type="text" name="maydon" value="{{$staff->maydon}}" class="form-control" id="header_ru" placeholder="га">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">контур</label>--}}
{{--                            <input type="text" name="kontur" value="{{$staff->kontur}}" class="form-control" id="header_ru" placeholder="контур">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">toladi</label>--}}
{{--                            <input type="text" name="toladi" value="{{$staff->toladi}}" class="form-control" id="header_ru" placeholder="га">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">resurs</label>--}}
{{--                            <input type="text" name="resurs" class="form-control" value="{{$staff->resurs}}" id="header_ru" placeholder="га">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">avans</label>--}}
{{--                            <input type="text" name="avans" class="form-control" value="{{$staff->avans}}" id="header_ru" placeholder="га">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">subsedya</label>--}}
{{--                            <input type="text" name="subsedya" class="form-control" value="{{$staff->subsedya}}" id="header_ru" placeholder="га">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="header_ru">yil_boshiga</label>--}}
{{--                            <input type="text" name="yil_boshiga" class="form-control" value="{{$staff->yil_boshiga}}" id="header_ru" placeholder="га">--}}
{{--                        </div>--}}



                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
