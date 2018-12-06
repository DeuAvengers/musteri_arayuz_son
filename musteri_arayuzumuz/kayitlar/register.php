@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Kayıt') }}</div>

                    <div class="card-body">
                            @foreach ($errors->all() as $error)
                        <div class="alert alert-warning">
                            <strong>Hata!</strong> {{$error}}
                        </div>
                         @endforeach
         
                        <ul class="nav nav-tab row ">
                            <li class="abcc btn btn-light active"><a class="abc" data-toggle="tab" href="#mk">Müşteri Kaydı</a></li>
                            <li class="abcc btn btn-light" id="kk_button"><a class="abc" data-toggle="tab" href="#kk">Kuaför Kaydı</a></li>
                        </ul>

                    <div class="tab-content">

                      <div id="mk" class="tab-pane fade active show">
                        <h3 >Müşteri Kaydı</h3>
                        <div id="mk_body" class="tab_icerik"> </div>
                      </div>

                      <div id="kk" class="tab-pane fade">
                        <h3>Kuaför Kaydı</h3>
                        <div id="kk_body" class="tab_icerik"> </div>
                      </div>
                     
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>

    <script>
    
    var form = '<form class="form-horizontal" method="POST" action="{{ route('register') }}">{{ csrf_field() }}<div id="form_main"><div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"><label for="name" class="cols-sm-2 control-label">İsim Soyisim</label><div class="cols-sm-10"><div class="input-group"><span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span><input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>@if ($errors->has('name'))<span class="help-block">    <strong>{{ $errors->first('name') }}</strong></span>@endif</div></div></div><div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"><label for="email" class="cols-sm-2 control-label">Mail Adresiniz</label><div class="cols-sm-10"><div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>@if ($errors->has('email'))<span class="help-block"><strong>Hata: {{ $errors->first('email') }}</strong></span>@endif</div></div></div><div class="form-group{{ $errors->has('gsm') ? ' has-error' : '' }}"><label for="gsm" class="cols-sm-2 control-label">Cep Telefonu</label><div class="cols-sm-10"><div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><input id="gsm" type="text" class="form-control" name="gsm" value="{{ old('gsm') }}" required>@if ($errors->has('gsm'))<span class="help-block"><strong>Hata: {{ $errors->first('gsm') }}</strong></span>@endif</div></div></div><div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"><label for="password" class="cols-sm-2 control-label">Parola</label><div class="cols-sm-10"><div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span><input id="password" type="password" class="form-control" name="password" required>@if ($errors->has('password'))<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>@endif</div></div></div><div class="form-group"><label for="confirm" class="cols-sm-2 control-label">Parolayı Tekrar Giriniz</label><div class="cols-sm-10"><div class="input-group"><span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required></div></div></div>                       </div><div class="form-group "><button type="submit" class="btn btn-primary btn-lg btn-block login-button">Kaydol</button></div>  </form>';

    var forma_ekle = '<div class="form-group"><label for="confirm" class="cols-sm-2 control-label">Kayıt Anahtarı</label><div class="cols-sm-10"><div class="input-group"><span class="input-group-addon"><i class="fa fa-key fa-lg"></i></span><input id="registerKey" type="text" class="form-control" name="registerKey" value="{{ old('registerKey') }}" required></div></div></div>';
$(document).ready(function(){

        

         $('#mk_body').append(form);

         $( '.abc' ).on('click',function() {
           // alert("dsa");
          var tıklanan = $(this).attr('href'); //href değişkeni value  alındı(tıklanan a dan)

          $('.tab_icerik').empty(); //acılan divlerin önce içini boşalttık
         //alert("dsd");

          

          $(tıklanan+'_body').append(form); //ilgili divin içi dolduruldu

          if(tıklanan == "#kk"){
            

            $('#form_main').append(forma_ekle);
          }

      });
    $(".abcc").on('click', function(){
      $(this).siblings().removeClass('active')
      $(this).addClass('active');
    })

     });

    </script>

    @if ($errors->has('registerKey'))
    <script type="text/javascript">
      $(document).ready(function(){
       $('.tab_icerik').empty();
       $('#kk_body').append(form);
       $('#form_main').append(forma_ekle);
       $('.abcc').removeClass('active');
       $('#kk_button').addClass('active');
       $('#mk').removeClass('active show');
       $('#kk').addClass('active show');
     });

    </script>
    @endif

@endsection

@section('footer_scripts')
    @if(config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
@endsection
