
@extends('admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Махаллалар  рўйхати</h1></div>
                    <div class="col-md-1">
                        <a class="btn btn-primary" href="{{route('admin.village.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Махалла кўшиш
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body overflow-auto">
                    <table width="100%" class="table-bordered table-striped" id="mytable">
                        <thead>
                        <tr rowspan="2">
                            <th rowspan="2" class="text-center" >Туман номи</th>
                            <th  colspan="4" class="text-center">Пилла топшириши</th>
                            <th rowspan="2" class="text-center">Амаллар</th>

                        </tr>
                        <tr>
                            <th class="text-center" >режа</th>
                            <th class="text-center" >ҳақиқатда топширди</th>
                            <th class="text-center" >фоиз%</th>
                            <th class="text-center" >фарқи (+/-)</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($villages as $village)
                            <tr>

                                <td>
                                    <a href="{{route('admin.village.show',$village->id)}}">{{$village->name}}</a>
                                </td>

                                    <?php
                                    $soni=0;
                                    $olgan=0;
                                    $topshirish_rejasi=0;
                                    $topshirgani=0;
                                   $x=0;
                                   $farqi=0;
                                        foreach ($staffes as $staff) {
                                            if ($staff->village_id==$village->id){
                                                $soni=$soni+1;
                                                $olgan=$olgan+($staff->olgan_gr);
                                                $topshirish_rejasi=$topshirish_rejasi+($staff->topshirish_rejasi);
                                                $topshirgani=$topshirgani+($staff->topshirgani);
                                                $x=($topshirgani *100)/$topshirish_rejasi;
                                                $farqi=$topshirgani-$topshirish_rejasi;
                                            };
                                        };
                                    ?>


                               <td>
                                   {{ $topshirish_rejasi }}
                               </td>
                               <td>
                                    {{ $topshirgani }}
                               </td>
                                <td>
                                    {{ round($x,1) }}
                                </td>
                                <td>
                                    {{$farqi}}
                                </td>

                                    <td>
                                        <form action="{{ route('admin.village.destroy',$village ->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group">
                                            <a class="btn btn-warning btn-sm" href="{{ route('admin.village.edit',$village->id) }}">
                                    <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                    </span>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                            </div>
                                        </form>
                                    </td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>

                        <th>жами:</th>
                        <th></th>
                        <th></th>
                        <th>-</th>
                        <th></th>
                        <th>-</th>
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

            "aLengthMenu": [200],


            "language": {

                "lengthMenu": "_MENU_",
                "zeroRecords": "Махалла қўшинг",
                "info": "_PAGE_  /  _PAGES_",
                "infoEmpty": " ",
                "search":"Кидириш:",
                "paginate": {
                    // "previous": '<i class="fa fa-angle-left" style="color: #27c2a5"></i>',
                    // "next": '<i class="fa fa-angle-right" style="color: #27c2a5"></i>',
                    "first": "биринчи",
                    "previous": "Олдинги   ",
                    "next": "      Кейинки",
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
            }
        } );
    } );
</script>
@endsection

