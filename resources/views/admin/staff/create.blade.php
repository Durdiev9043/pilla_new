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

@if(\Illuminate\Support\Facades\Auth::user()->ruxsat>0)
                    <form action="{{route('admin.staff.store')}}" method="POST" accept-charset="UTF-8"
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
                            <label for="number">махалла</label>
                            <select class="custom-select" id="hudud_id"  onchange="village(hudud_id)" name="hudud_id">
                                <option value=""></option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="number">махалла</label>
                                <select class="custom-select" id="village_id"   name="village_id">
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
                            <label for="header_ru">га</label>
                            <input type="text" name="maydon" class="form-control" id="header_ru" placeholder="га">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">контур</label>
                            <input type="text" name="kontur" class="form-control" id="header_ru" placeholder="га">
                        </div>



                        <div class="form-group">
                            <label for="header_ru">toladi</label>
                            <input type="text" name="toladi" class="form-control" id="header_ru" placeholder="га">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">resurs</label>
                            <input type="text" name="resurs" class="form-control" id="header_ru" placeholder="га">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">avans</label>
                            <input type="text" name="avans" class="form-control" id="header_ru" placeholder="га">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">subsedya</label>
                            <input type="text" name="subsedya" class="form-control" id="header_ru" placeholder="га">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">yil_boshiga</label>
                            <input type="text" name="yil_boshiga" class="form-control" id="header_ru" placeholder="га">
                        </div>



                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                        @else
                    <h1>siz bu funksiyadan faydalanish imkoningiz yoq</h1>
                        @endif
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
                        }  console.log(data)
                    }
                }


            )
        }


    </script>

@endsection
