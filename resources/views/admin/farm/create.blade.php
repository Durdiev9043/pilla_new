@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">фермер қошиш</h1></div>
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


                    <form action="{{route('admin.farm.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                        <div class="form-group">
                            <label for="number">туман</label>
                            <select class="custom-select" id="price_id"  onchange="village(region_id)"  name="region_id">

                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number">махалла</label>
                            <select class="custom-select" id="village_id" name="village_id">
                                <option value=""></option>
{{--                                @foreach($villages as $village)--}}
{{--                                    <option value="{{$village->id}}">{{$village->name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        @else
                            <div class="form-group">
                            <input type="hidden" name="region_id" value="{{\Illuminate\Support\Facades\Auth::user()->role}}">
                            <select name="village_id" class="custom-select" id="">
                            @foreach($villages as $village)
                                @if($village->region_id==\Illuminate\Support\Facades\Auth::user()->role)
                                    <option value="{{$village->id}}">{{$village->name}}</option>
                                @endif
                            @endforeach
                            </select>
                            </div>


                        @endif
                        <div class="form-group">
                            <label for="header_ru">номи</label>
                            <input type="text" name="name" class="form-control" id="header_ru" placeholder="номи">
                        </div>


                        <div class="form-group">
                            <label for="header_ru">кути</label>
                            <input type="text" name="algan_qutisi" placeholder="кути" class="form-control" id="header_ru">
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





                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function village(region){
            region_id=region.value;
            $.ajax(
                "{{route('admin.bus')}}",
                {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {
                        region_id:region_id
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

    </script>

@endsection
