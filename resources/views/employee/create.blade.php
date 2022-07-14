
@extends('layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Add Employee</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                             <ul>
                                 @foreach($errors->all() as $error)
                                 <li>{{$error}}</li>
                                 @endforeach
                             </ul>
                             </div>
                             @endif
                            <form action="{{route('employee.store')}}" method="POST">
                                @csrf 
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">First Name</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="first_name" id="first_name" value="{{old('first_name')}}">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Last Name</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="last_name" id="last_name" value="{{old('last_name')}}">
                                </div>
                                <div class="mb-4">
                            <label class="form-label">Select Company</label>
                            <select class="form-select" name="company_id" aria-label="Default select example">
                                <option selected>Please Select Company</option>
                                @foreach(\App\Models\Company::get() as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                                    <label for="product_name" class="form-label">Email</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="email" id="email" value="{{old('email')}}">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Phone</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="phone" id="phone" value="{{old('phone')}}">
                                </div>
                               
                                

                                <div >
                            <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Cancel</button>
                            <button type="submit" class="btn btn-md rounded font-sm hover-up">Submit</button>
                        </div>
                              
                               
                                
                            </form>
                        </div>
                    </div>
 </div>
</section>    
@endsection
@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script> $('#lfm').filemanager('image');</script>


@endsection