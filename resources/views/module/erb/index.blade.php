@extends('adminlte::page')
@section('title', 'Hotspot-Erb')
@section('content_header')
   <!-- <h1>Menu Admin</h1>-->
@stop

@section('content')
 @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>
@endif

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tabla Erb</h3>
              <a class="btn btn-success btn-xs pull-right"  href="{{ route('erb.create') }}" ><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <!-- /.box-header -->
            <!-- 'id', 'user_id', 'num_serie', 'nick_name', 'password', 'api_token', -->
            <div class="box-body">
              <table id="erbTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>User Id</th>
                  <th>NumSerie</th>
                  <th>Alias</th>
                  <th>Password</th>
                  <th>ApiToken</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($erbs as $erb)
                <tr>
                    <td>{{ $erb->id }}</td>
                    <td>{{ $erb->user_id }}</td>
                    <td>{{ $erb->num_serie }}</td>
                    <td>{{ $erb->nick_name }}</td>
                    <td>{{ $erb->password }}</td>
                    <td>{{ $erb->api_token }}</td>
                    <td>{{ $erb->created_at }}</td>
                    <td>{{ $erb->updated_at }}</td>
                    <td>
                      <form role="form" action="{{ route('erb.destroy',$erb->id) }}" method="POST">
                      <a class="btn btn-info btn-xs" href="{{ route('erb.show',$erb->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a> 
                      <a class="btn btn-warning btn-xs"  href="{{ route('erb.edit',$erb->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <!--<tfoot>
                 <tr>
                  <th>Id</th>
                  <th>Nombre Maquina</th>
                  <th>Alias</th>
                  <th>Password</th>
                  <th>Api Token</th>
                  <th>FechaCreacion</th>
                  <th>FechaMoficiacion</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->   
@stop

@section('css')
    
@stop

@section('js')
<script>
  $(function () {
     $('#erbTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX'     : true,
      'scrollY'     : false,
      'scrollCollapse': false,
      'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'}
    })
  })
</script>
@stop