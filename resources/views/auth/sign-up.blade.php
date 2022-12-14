@extends('layouts.app')
@section('title' , 'Sign Up')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('assets/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
            <h3>Sign Up</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
          </div>
          <form action="{{ route('sign_up') }}" method="post">
            @csrf
            <div class="form-group first">
              <label for="fullname">Full name</label>
              <input name="name" type="text" value="{{ old('name') }}" class="form-control" id="fullname">

            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" value="{{ old('email') }}" class="form-control" id="email">

            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password"  class="form-control" id="password">
              
            </div>
            <div class="form-group last mb-4">
              <label for="re-password">Re-type Password</label>
              <input name="password_confirmation" type="password" class="form-control" id="re-password">
              
            </div>
            
            <div class="d-flex mb-5 align-items-center">
              <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                <input type="checkbox" checked="checked"/>
                <div class="control__indicator"></div>
              </label>
            </div>

            <input type="submit" value="Register" class="btn btn-block btn-primary">

            <span class="d-block text-left my-4 text-muted">&mdash; or register with &mdash;</span>
            
            <div class="social-login">
              <a href="#" class="facebook">
                <span class="icon-facebook mr-3"></span> 
              </a>
              <a href="#" class="twitter">
                <span class="icon-twitter mr-3"></span> 
              </a>
              <a href="#" class="google">
                <span class="icon-google mr-3"></span> 
              </a>
            </div>
          </form>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
    
@endsection