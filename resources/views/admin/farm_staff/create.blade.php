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


                    <form action="{{route('admin.farm_s.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                            <div class="form-group">
                                <label for="region_id">туман</label>
                                <select class="custom-select" id="region_id" onchange="hudud(region_id)" name="region_id">

                                    @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="number">Ҳудуд</label>
                                <select class="custom-select" id="hudud_id"  onchange="village(hudud_id)" name="hudud_id">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="number">махалла</label>
                                <select class="custom-select" id="village_id" onchange="farm(village_id)"   name="village_id">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="number">farm</label>
                                <select class="custom-select" id="farm_id"   name="farm_id">
{{--                                    <option value="48">dilfuza aziza</option>--}}
                                    <option value=""></option>
                                </select>
                            </div>
                        @else
                            <div class="form-group">
                            <input type="hidden" name="region_id" value="{{\Illuminate\Support\Facades\Auth::user()->role}}">
                            <select name="village_id" class="custom-select" id="village_id">
                            @foreach($villages as $village)
                                @if($village->region_id==\Illuminate\Support\Facades\Auth::user()->role)
                                    <option value="{{$village->id}}" >{{$village->name}}</option>
                                @endif
                            @endforeach
                            </select>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="header_ru">имя</label>
                            <input type="text" name="fullname" class="form-control" id="header_ru" placeholder="имя">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">Пас.сер.</label>
                            <input type="text" name="passport" class="form-control" id="header_ru" placeholder="Пас.сер.">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">ИНН</label>
                            <input type="text" name="inn" class="form-control" id="header_ru" placeholder="ИНН">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">кути</label>
                            <input type="text" name="algan_qutisi" placeholder="кути" class="form-control" id="header_ru">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">ШЖБПТ</label>
                            <input type="text" name="jshir" placeholder="ШЖБПТ" class="form-control" id="header_ru">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">гр</label>
                            <input type="text" placeholder="гр" name="olgan_gr" class="form-control" id="header_ru">
                        </div>

                        <div class="form-group">
                            <label for="header_ru">Шарт</label>
                            <input type="text" name="topshirish_rejasi" class="form-control" id="header_ru" placeholder="Шарт">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">ҳақиқатда топширди</label>
                            <input type="text" name="topshirgani" class="form-control" id="header_ru" placeholder="ҳақиқатда топширди">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">якка тутзор қатори</label>
                            <input type="text" name="yakka_tut" class="form-control" id="header_ru" >
                        </div>
                        <div class="form-group">
                            <label for="header_ru">контур</label>
                            <input type="text" name="kontur" class="form-control" id="header_ru" placeholder="га">
                        </div>



                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hudud(region){
            region_id=region.value;
            $.ajax(
                "{{route('admin.rr')}}",
                {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {
                        region_id:region_id
                    },
                    success: function (data){
                        $('#hudud_id').empty()
                        for (let d in data){
                            let option = '<option value=' + data[d].id + '>' + data[d].name + '</option>';
                            $('#hudud_id').append(option)
                        }

                    }

                }


            )
        }
        function village(hudud){
            hudud_id=hudud.value;
            $.ajax(
                "{{route('admin.bus')}}",
                {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {
                        hudud_id:hudud_id
                    },
                    success: function (data){
                        $('#village_id').empty()
                        for (let d in data){
                            let option = '<option value=' + data[d].id + '>' + data[d].name + '</option>';
                            $('#village_id').append(option)
                        }
                    }
                }


            )
        }

        function farm(village){
            village_id=village.value;

            $.ajax(
                "{{route('admin.farm')}}",
                {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {
                        village_id:village_id
                    },
                    success: function (data){
                        $('#farm_id').empty()
                        for (let d in data){
                            let option = '<option value=' + data[d].id + '>' + data[d].name + '</option>';
                            $('#farm_id').append(option)
                        }
                    }
                }


            )
        }


    </script>

@endsection
