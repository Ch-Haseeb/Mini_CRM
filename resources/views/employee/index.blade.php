
@extends('layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                  
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Employee Data </h2>
                    
                </div>
              

               
            </div>
            <div >
                  @include('layouts.notification')
                </div>
        <div class="row">
        <div class="card mb-4">
        <table id="example" class="table table-striped">
                  <thead>
                 
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                   
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th >Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($employee as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->first_name}} </td>
                    <td>{{$item->last_name}} </td>

                    <td>{{$item->email}}</td>
                    <td> {{$item->phone}}</td>
                    <td>{{$item->Company->name}}</td>
                    <td>  <a href="{{route('employee.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn  btn-outline-warning" data-placment="bottom" style="float:left; margin-left: 10px;"><i class="icon material-icons md-edit"></i></a>
                    <form style="float:left;margin-left: 10px;" action="{{route('employee.destroy',$item->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn  btn-outline-danger" data-placment="bottom"><i class="icon material-icons md-delete"></i></a>
                      </form>
                    </td>

                  </tr>
                  @endforeach
                  
                 
                 
                  </tbody>
                
                </table>
                </div>
         </div>
     </div>
   </div>   
</div>
</section>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(document).ready( function () {
    $('#example').DataTable();
} )
</script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.dltBtn').click(function(e) {
    var form = $(this).closest('form');
    var dataid = $(this).data('id');
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });


  })
</script>

@endsection






