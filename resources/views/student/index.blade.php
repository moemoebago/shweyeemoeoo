@extends('layout.master')

<style>
  .box{
    margin-top: 20px;
  }
  .box-body{
    margin-top: 20px;
  }
</style>
@section('content')
      <div class="box">
           <div class="box-header with-border">
                 

                 <select name="" id="class-filter">
                   <option value="">Choose Class</option>
                   @foreach($class_names as $key => $value)
                     <option value="{{ $key }}">{{ $value }}</option>
                   @endforeach
                 </select>

                 <select name="" id="grade-filter">
                   <option value="">Choose Grade</option>
                   @foreach($grade_names as $key => $value)
                     <option value="{{ $key }}">{{ $value }}</option>
                   @endforeach
                 </select>
                 
                     <a class="btn btn-success btn-sm" href="{{ url('students/create') }}">create new student</a>
                 

             </div>
             
           
           
           <div class="box-body table-responsive mt-5">     
               <table class="table table-bordered" id="students-table">
                 <thead>
                   <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Father Name</th>
                     <th>Address</th>
                     <th>Phone Number</th>
                     <th>Grade</th>
                     <th>Class</th>
                     
                     
                     <th></th>
                     <th></th>
                   </tr>
               </thead>
             </table>  
           </div>
           <!-- /.box-body -->
           <div class="box-footer" id="box-footer">
           </div>
           <!-- /.box-footer-->
         </div>
         <!-- /.box -->
   @stop
@push('scripts')
<script>
$(function() {
    $('#students-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('students.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'father_name', name: 'father_name'},
            { data: 'address', name: 'address' },
            { data: 'phone_no', name: 'phone_no' },
            { data: 'grade', name: 'grade' },
            { data: 'class', name: 'class' },

            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
            
        ]
    });
});
</script>

<script>
  $(document).ready(function (){

    $('#grade-filter').on('change',function(){
      var grade_name=$(this).val();
      if(grade_name){
        $.ajax({
          url: '/gradename/'+grade_name,
          type: "GET",
          dataType: "json",
          success: function(result){
            $('#students-table').empty();
            $('#students-table').append('<tr><th>Name</th><th>Father Name</th><th>Address</th><th>Phone No.</th></tr>');
              $.each(result,function(key,value){
                  $('#students-table').append("<tr><td>"+value.name+"</td><td>"+value.father_name+"</td><td>"+value.address+"</td><td>"+value.phone_no+"</td></tr>");
              });
          },
        });
      }
    });

  });
</script>


<script>
  $(document).ready(function (){

    $('#class-filter').on('change',function(){
      var class_name=$(this).val();
      if(class_name){
        $.ajax({
          url: '/classname/'+class_name,
          type: "GET",
          dataType: "json",
          success: function(result){
            $('#students-table').empty();
            $('#students-table').append('<tr><th>Name</th><th>Father Name</th><th>Address</th><th>Phone No.</th></tr>');
              $.each(result,function(key,value){
                  $('#students-table').append("<tr><td>"+value.name+"</td><td>"+value.father_name+"</td><td>"+value.address+"</td><td>"+value.phone_no+"</td></tr>");
              });
          },
        });
      }
    });

  });
</script>
@endpush