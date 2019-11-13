<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::asset('experienceProFORM/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{URL::asset('experienceProFORM/vendor/nouislider/nouislider.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('experienceProFORM/colorlib-regform-16/css/style.css') }}">



</head>

<body>

    <div class="main">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>

    @endif

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{URL::asset('experienceProFORM/colorlib-regform-16/images/form-img.jpg') }}" alt="">
                    <div class="signup-img-content">
                        <h2>Expérience professionnelle  </h2>
                        <p>Raconte-nous tout !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" action="{{ route('experienceProFORM') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">

                                <div class="form-input">
                                    <h1 for="nomPoste" class="required">{{ __('Intitulé du poste') }}</h1>
                                    <input id="nomPoste" type="text" class="form-control{{ $errors->has('nomPoste') ? ' is-invalid' : '' }}" name="nomPoste" value="{{ old('nomPoste') }}" >

                                    @if ($errors->has('nomPoste'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nomPoste') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-input">
                                    <label for="typeContrat" class="required">{{ __("Type d'emploi:") }}</label>

                                    <select id="typeContrat" name="typeContrat" class="custom-select" id="typeContrat">
                                        @for ($i = 0; $i < count($types_Contrats)-1; $i++)
                                            <option value={{$types_Contrats[$i+1][1]}}>{{$types_Contrats[$i+1][0]}}</option>
                                        @endfor
                                    </select>

                                    @if ($errors->has('typeContrat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('typeContrat') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-input">
                                    <label for="id_entreprise" class="required">{{ __("Nom de l'entreprise") }}</label>
                                    
                                    <select id="id_entreprise" name="id_entreprise" class="custom-select" id="id_entreprise">
                                        @for ($i = 0; $i < count($entreprises)-1; $i++)
                                            <option value={{$entreprises[$i+1][5]}}>{{$entreprises[$i+1][0]}}</option>
                                        @endfor
                                    </select>

                                    @if ($errors->has('id_entreprise'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_entreprise') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-input">
                                    <label for="numéro" class="required">{{ __("Numéro") }}</label>
                                    <input id="numéro" type="text" class="form-control{{ $errors->has('numéro') ? ' is-invalid' : '' }}" name="numéro" value="{{ old('numéro') }}" >

                                    @if ($errors->has('numéro'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('numéro') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-input">
                                    <label for="rue" class="required">{{ __("Rue") }}</label>
                                    <input id="rue" type="text" class="form-control{{ $errors->has('rue') ? ' is-invalid' : '' }}" name="rue" value="{{ old('rue') }}" >

                                    @if ($errors->has('rue'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rue') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-input">
                                    <label for="cp" class="required">{{ __("Code postale") }}</label>
                                    <input id="cp" type="text" class="form-control{{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" value="{{ old('cp') }}" >

                                    @if ($errors->has('cp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-input">
                                    <label for="ville" class="required">{{ __("Ville") }}</label>
                                    <input id="ville" type="text" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" name="ville" value="{{ old('ville') }}" >

                                    @if ($errors->has('ville'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ville') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>



                            <div class="form-group">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <h1 for="meal_preference">Période</h1>
                                    </div>
                                    <div class="select-list">
                                    <label for="ville" class="required">{{ __("Date de début") }}</label>
                                        <input id="debut" type="date" class="form-control{{ $errors->has('debut') ? ' is-invalid' : '' }}" name="debut" value="{{ old('debut') }}" >
                                    </div>

                                    <div class="select-list">
                                    <label for="fin" class="required">{{ __("Date de fin") }}</label>
                                        <input id="fin" type="date" class="form-control{{ $errors->has('fin') ? ' is-invalid' : '' }}" name="fin" value="{{ old('fin') }}" >
                                    </div>
                                </div>

                               


                                <div class="form-input">
                                    <h1 for="description" class="required">{{ __("Description") }}</h1>
                                    <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" rows="6" cols="60">

                                    </textarea>
                            

                                    @if ($errors->has('ville'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ville') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              
                                

                            </div>
        
                        </div>
         
                         <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{URL::asset('experienceProFORM/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{URL::asset('experienceProFORM/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{URL::asset('experienceProFORM/vendor/wnumb/wNumb.js') }}"></script>
    <script src="{{URL::asset('experienceProFORM/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{URL::asset('experienceProFORM/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{URL::asset('experienceProFORM/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>