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
                  <h4 class="m-0">Liste des conseillers</h4>
                  <a class="btn btn-secondary" data-toggle="modal" data-target="#" href="">Ajouter</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive table-sm">
                <table style="width: 100%" id="zero_config" class="table table-striped table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>#</th>
                      <th>nom</th>
                      <th>rang </th>
                      <th>Parrain </th>
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

  </div>
</div>


<script>
  $(document).ready(function(){
    $('#zero_config').DataTable({
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
            url:"{{ route('home') }}",
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
            {name:'login',data:'login'},
            {name:'rang',data:'rang'},
            {name:'parent',data:'Parent'},
        ]
    });
  })
</script>
@endsection