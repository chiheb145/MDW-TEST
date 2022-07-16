@extends('layouts.app')

@section('content')


<div id="main-wrapper">


  <div class="page-wrapper pt-4">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="header-title">
                <div class="d-flex justify-content-between align-items-center">
                  <h4 class="m-0">Liste des primes de parrainage</h4>
                  <a class="btn btn-secondary" data-toggle="modal" data-target="#" href="">Ajouter</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive table-sm">
                <table style="width: 100%" id="bonus_table" class="table table-striped table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>#</th>
                      <th>Parrain</th>
                      <th>Fils</th>
                      <th>Prime Animation</th>
                    </tr>
                  </thead>
                  <tbody class="text-center"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="row justify-content-center pt-2">
      <div class=" col-3 bg-success">
        <h4 class=" center-block" style="text-align: center">Liste des primes de parrainage</h4>
      </div>
    </div>

    <div class="row">
      <div id="msg_success" class="alert alert-success" style="display: none">
      </div>
    </div>
    @if(session()->has('success'))
    <div class="container-fluid">
      <div class="row pt-2">

        <div class="col-12 alert alert-success">
          {{ session()->get('success') }}
        </div>
      </div>
    </div>

    @endif
    @if(session()->has('error'))
    <div class="container-fluid">
      <div class="row pt-2">

        <div class="col-12 alert alert-error">
          {{ session()->get('error') }}
        </div>
      </div>
    </div>

    @endif
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12 m-1">


        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card ">
            <div class="card-body">

              <table id="zero_configg" class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Parrain</th>
                    <th> Fils</th>
                    <th>Prime Animation</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach(json_decode(json_encode($advisors),true) as $advisor)
                  @if($advisor['bonuse_team'] !=0)
                  <tr>
                    <td>{{$advisor['id']}}</td>
                    <td>{{$advisor['login_parent']}}</td>
                    <td>{{$advisor['login_fils']}}</td>
                    <td>{{$advisor['bonuse_team']}}</td>

                  </tr>
                  @endif
                  @endforeach
                </tbody>

              </table>

            </div>
          </div>
        </div>
      </div>
    </div> --}}

  </div>
</div>

<script>
  $(document).ready(function(){
    let bonusTable = $("#bonus_table").DataTable({
      responsive: true,
      searching:true,
      lengthChange:true,
      ordering:true,
      autoWidth:true,
      paging:true,
      info:true,
      processing: true,
      serverSide: true,
      ajax:{
          url:"{{ route('team_bonuses') }}",
          method:'get',
          cache:false,
          data:function(d){

          },
          complete:function(res){
              console.log(res)
          }
      },
      language: {
          url:"https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json"
      },
      columns:[
          {name:'id',data:'id'},
          {name:'sponsor',data:'login_parent'},
          {name:'children',data:'login_fils'},
          {name:'team',data:'bonuse_team'},
      ]
    })
  })
</script>

@endsection