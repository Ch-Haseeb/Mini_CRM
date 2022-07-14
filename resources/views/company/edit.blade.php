
@extends('layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Edit Company</h4>
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
                            <form action="{{route('company.update',$company->id)}}"" method="POST" enctype="multipart/form-data">
                                @csrf 
                                @method('patch')
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Name</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="name" id="name"  value="{{$company->name}}">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Email</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="email" id="email" value="{{$company->email}}">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Logo</label>
                                    <input type="file"class="form-control"name="logo" id="logo" value="{{$company->logo}}">
                                    <img src="{{ $company->logo }}" width="300px">
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Website Url</label>
                                    <input type="text" placeholder="Type here" class="form-control"name="website" id="website" value="{{$company->website}}">
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



@endsection