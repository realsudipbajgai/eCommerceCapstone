@extends('layouts.base')
@section('content')
<div id="profilePage" class="container-fluid">
     <div class="info-form container">
          <div class="row">
               <div class="col-md-5">
                    <div class="row">
                         <div class="col container-fluid">
                              <img class ="user-profile-image"src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="User Image">
                         </div>

                    </div>
                    <div class="row p-3">
                         <a class="edit-button col mr-3" href="/user/edit">Edit Profile</a>
                         <a class="edit-button col" href="/user/security">Edit Password</a>
                    </div>
               </div>
               <div class="col-md-7 p-3">
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>First Name</span> <span>{{$user->first_name}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>Last Name</span> <span>{{$user->last_name}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>Country</span> <span>{{$user->country}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>Street</span> <span>{{$user->street}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>City</span> <span>{{$user->city}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>Province</span> <span>{{$user->province->name}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>Postal Code</span> <span>{{$user->postal_code}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 mb-3">
                         <span>Phone</span> <span>{{$user->phone}}</span>
                    </div>
                    <div class="d-flex justify-content-between col-md-8 ">
                         <span>Email</span> <span>{{$user->email}}</span>
                    </div>
               </div>
          </div>
     </div>

</div>
@endsection