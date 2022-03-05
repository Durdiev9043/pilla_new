@extends('admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Кластер</h1></div>
                    <div class="col-md-1">
                        <a class="btn btn-primary" href="{{route('admin.staff.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Кластер кошиш
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table width="100%" id="data" class="table-striped table-bordered">
                        <thead>
                        <tr class="table-light border-bottom border-secondary">
                            <th  rowspan="2" class="text-center" scope="col">Номи</th>
                            <th rowspan="2" class="text-center" scope="col">Туманлар</th>
                            <th class="border-bottom text-center" colspan="4" scope="col">касаначилари</th>
                            <th class="border-bottom text-center" colspan="3" scope="col">Фермерлар</th>
                            <th class="border-bottom text-center" colspan="3" scope="col">жами</th>
                            <th rowspan="2" class="text-center" scope="col">Действие</th>
                        </tr>
                        <tr class="table-light">
                            <th class="text-center"  scope="col">режа</th>
                            <th class="text-center" scope="col">амалда</th>
                            <th class="text-center" scope="col">фарқи<br>(+,-)</th>
                            <th class="text-center"  scope="col">фоиз<br>%</th>

                            <th  scope="col">режа</th>
                            <th scope="col">амалда</th>
                            <th scope="col">фоиз<br> %</th>

                            <th  scope="col">режа</th>
                            <th scope="col">амалда</th>
                            <th scope="col">фоиз<br> %</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($klasteres as $klaster)
                            <tr>

                                <td >{{$klaster->name}}</td>
                                <td>
                                    <?php
                                    $soni=0;
                                    $olgan=0;
                                    $topshirish_rejasi=0;
                                    $topshirgani=0;
                                    $x=0;
                                    $farqi=0;
                                    $jarima=0;
                                    $toladi=0;
                                    $qoldi=0;

                                    $F_olgan=0;
                                    $F_topshirish_rejasi=0;
                                    $F_topshirgani=0;
                                    $y=0;
                                    foreach ($regions as $region){
                                        if ($region->klaster_id==$klaster->id){

                                            echo $region->name." ";

                                            foreach ($staffs as $staff){
                                                if ($staff->region_id==$region->id){
                                                    $soni=$soni+1;
                                                    $olgan=$olgan+($staff->olgan_gr);
                                                    $topshirish_rejasi=$topshirish_rejasi+($staff->topshirish_rejasi);
                                                    $topshirgani=$topshirgani+($staff->topshirgani);
                                                    $x=($topshirgani *100)/$topshirish_rejasi;
                                                    $farqi=$topshirgani-$topshirish_rejasi;
                                                    $jarima=$farqi*22;
                                                    $toladi=$toladi+($staff->toladi);
                                                    $qoldi=$toladi-$jarima;
                                                };
                                            };
                                                foreach ($farmes as $farm){
                                                if ($farm->region_id==$region->id){
                                                    $F_olgan=$F_olgan+($farm->olgan_gr);
                                                    $F_topshirish_rejasi=$F_topshirish_rejasi+($farm->topshirish_rejasi);
                                                    $F_topshirgani=$F_topshirgani+($farm->topshirgani);
                                                    $y=($F_topshirgani *100)/$F_topshirish_rejasi;
                                                    $farqi=$topshirgani-$topshirish_rejasi;
                                                    $jarima=$farqi*22;
                                                    $toladi=$toladi+($farm->toladi);
                                                    $qoldi=$toladi-$jarima;
                                                };
                                            };
                                        };
                                    };
                                    $reja=$topshirish_rejasi+$F_topshirish_rejasi;
                                    $amalda=$topshirgani+$F_topshirgani;
                                    if ($reja>0){
                                    $z=$amalda*100/$reja;
                                    }else{
                                        $z=0;
                                    }
                                    ?>
                                </td>
                                <td id="k_reja">{{$topshirish_rejasi}}</td>
                                <td id="k_top">{{$topshirgani}}</td>
                                <td>{{$farqi}}</td>
                                <td id="k_x">{{round($x,1)}}</td>


                                <td id="f_reja">{{$F_topshirish_rejasi}}</td>
                                <td id="f_top">{{$F_topshirgani}}</td>
                                <td id="f_y">{{round($y,1)}}</td>

                                <td id="reja">{{$reja}}</td>
                                <td id="top">{{$amalda}}</td>
                                <td id="foiz">{{round($z,1)}}</td>

                                <td>
                                    <form action="{{ route('admin.klaster.destroy',$klaster ->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.klaster.edit',$klaster->id) }}">
                                    <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                    </span>

                                        </a>

                                        <button type="submit" class="btn btn-danger btn-sm"><span class="btn-label">
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



                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>

        $(document).ready(function() {
            $('#data').DataTable( {
                dom: 'Bfrtip',
                "buttons": [
                    { "extend": 'excel', "text":'<i class="fas fa-download px-2"></i>  Малумотларни excel форматда юклаб олиш',"className": 'btn btn-primary btn-xm' }
                ],

                "aLengthMenu": [15],
                "language": {

                    "lengthMenu": "_MENU_",
                    "zeroRecords": "Туман қошинг",
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
                    $( api.column( 4, ).footer() ).html(
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
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 6, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 6, ).footer() ).html(
                        pageTotal
                    );

                    total = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 7, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 7, ).footer() ).html(
                        pageTotal
                    );


                    total = api
                        .column( 9 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 9, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 9, ).footer() ).html(
                        pageTotal
                    );

                    total = api
                        .column( 10 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 10, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 10, ).footer() ).html(
                        pageTotal
                    );


                }
            } );
        } );

    </script>
@endsection

