@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                            <div class="row">
                                @if($user->can('menu-usuario'))
                                    <div class="col-md-4 col-xl-4">                                    
                                        <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Usuarios</h5>                                               
                                                
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $users->count() }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                @endif
                                
                                @if($user->can('menu-rol'))
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{ $roles->count() }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>         
                                @endif                                                       
                                
                                @if($user->can('menu-blog'))
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Blogs</h5>                                               
                                                
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{ $blogs->count() }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
