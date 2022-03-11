@extends('admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-7"><h1 class="card-title">Фермерлар рўйхат</h1></div>
                    <div class="col-md-1 mr-5">
                        <a class="btn btn-primary" href="{{route('admin.village.show',$id)}}">
                            <span class="btn-label">

                            </span>
                            Касанчилар рўйхат
                        </a>
                    </div>
                    <div class="col-md-1 ml-4">
                        <a class="btn btn-primary" href="{{route('admin.farm.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Фермер кўшиш
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body table-responsive">
                    <table class="table-bordered w-auto table-striped" id="mytable">
                        <thead>
                        <tr>

                            <th class="text-center" rowspan="2" scope="col">номи</th>

                            <th class="text-center" rowspan="2" scope="col">Тел рақами</th>

                            <th class="text-center" rowspan="2" scope="col">ИНН</th>

                            <th class="text-center" rowspan="2" scope="col">МФО</th>

                            <th class="text-center"  colspan="2" scope="col">ҳисоб рақами</th>

                            <th class="text-center" rowspan="2" scope="col">Экин майдони,<br>га</th>

                            <th class="text-center" rowspan="2" scope="col">Якка қатор тутзор, мингдона</th>

                            <th class="text-center" rowspan="2" scope="col">Шартнома қути</th>

                            <th class="text-center" colspan="4" scope="col">Пилла топшириши, кг</th>

                            <th class="text-center" rowspan="2" scop="col">Етиширган маҳсулот қиймати, (минг сўм)</th>

                            <th class="text-center" colspan="2" scop="col">Йил бошига қолдиқ, минг сўм</th>

                            <th class="text-center" rowspan="2" scope="col">Аванс,<br>(минг сўм)</th>

                            <th class="text-center" rowspan="2" scope="col">Моддий техник ресурс,<br>(минг сўм)</th>

                            <th class="text-center" rowspan="2" scope="col">Жойида ҳисоб китоб <br>(минг сўм)</th>

                            <th class="text-center" rowspan="2" scope="col">Субъсидия<br>(минг сўм)</th>

                            <th class="text-center" colspan="2" scope="col">Якуний ҳисоб-китоб<br>(минг сўм)</th>

                            <th class="text-center" rowspan="2" scope="col">Изоҳ</th>

                            <th class="text-center" rowspan="2" scope="col">Действие</th>
                        </tr>
                        <tr>
                            <th  class="text-center" scope="col">2020...</th>

                            <th  class="text-center" scope="col">23202....</th>


                            <th class="text-center" scope="col">режа</th>

                            <th class="text-center" scope="col">ҳақиқатда топширди</th>

                            <th class="text-center" scope="col">фарқи <br>(+/-)</th>

                            <th class="text-center" scope="col">фоиз,<br>%</th>

                            <th class="text-center" scope="col">дебет</th>

                            <th class="text-center" scope="col">кредит</th>

                            <th class="text-center" scope="col">дебет</th>

                            <th class="text-center" scope="col">кредит</th>


                        </tr>
                        </thead>
                        <tbody>
                            @foreach($farmes as $farm)
                                <tr>

                                    <td >{{$farm->name}}</td>

                                    <td >{{$farm->phone}}</td>

                                    <td >{{$farm->inn}}</td>

                                    <td >{{$farm->village->name}}</td>

                                    <td>{{$farm->h2020}}</td>

                                    <td>{{$farm->h23202}}</td>

                                    <td>{{$farm->maydon}}</td>

                                    <td>{{$farm->yakka_tut}}</td>

                                    <td>{{$farm->algan_qutisi}}</td>

                                    <td>{{$farm->topshirish_rejasi}}</td>

                                    <td>{{$farm->topshirgani}}</td>
                                    <td>
                                        <?php
                                        $farqi=$farm->topshirgani-$farm->topshirish_rejasi;
                                        $foiz=$farm->topshirgani*100/$farm->topshirish_rejasi
                                        ?>
                                        {{$farqi}}
                                    </td>
                                    <td>
                                        {{round($foiz,1)}}
                                    </td>
                                    <td>
                                        {{$farm->toladi}}
                                    </td>
                                    <td>
                                        debet
                                    </td>
                                    <td>
                                        kredit
                                    </td>
                                    <td>
                                        avans
                                    </td>
                                    <td>
                                        {{$farm->resurs}}
                                    </td>
                                    <td>
                                        {{$farm->toladi}}
                                    </td>
                                    <td>
                                        subsedya
                                    </td>
                                    <td>
                                        debet
                                    </td>
                                    <td>
                                        kredit
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <form action="{{ route('admin.farm.destroy',$farm ->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-warning m-1 btn-sm" href="{{ route('admin.farm.edit',$farm->id) }}">
                                    <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                    </span>

                                            </a>

                                            <button type="submit" class="btn m-1 btn-danger btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>жами:</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable( {
                dom: 'Bfrtip',
                "buttons": [
                    {
                        "extend": 'excel', "text":'<i class="fas fa-download px-2"> </i>  Малумотларни excel форматда юклаб олиш',"className": 'btn btn-primary btn-xm'
                    }
                ],
                // "scrollX": true,
                "aLengthMenu": [200],
                "language": {

                    "lengthMenu": "_MENU_",
                    "zeroRecords": "махалла қошинг",
                    "info": "_PAGE_ / _PAGES_",
                    "infoEmpty": " ",
                    "search":"қидириш:",
                    "paginate": {
                        "first": "биринчи",
                        "previous": "олдинги",
                        "next": "кейинки",
                        "last": "охирги"
                    },
                },
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 4, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 4 ).footer() ).html(
                        pageTotal
                    );




                    total = api
                        .column( 1 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 1, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 1, ).footer() ).html(
                        pageTotal

                    );
                    total = api
                        .column( 2 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 2, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 2, ).footer() ).html(
                        pageTotal

                    );

                    total = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 3, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 3, ).footer() ).html(
                        pageTotal

                    );
                }
            } );
        } );
    </script>
@endsection

