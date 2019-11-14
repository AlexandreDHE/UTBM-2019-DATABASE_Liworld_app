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
                        <h2>FORMATION </h2>
                        <p>Raconte-nous tout !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" action="{{ route('formationFORM') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">

                                <div class="form-input">
                                    <h1 for="ecole" class="required">{{ __('Lieu de formation') }}</h1>
                                    <input id="ecole" type="text" class="form-control{{ $errors->has('ecole') ? ' is-invalid' : '' }}" name="ecole" value="{{ old('ecole') }}" >

                                    @if ($errors->has('ecole'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ecole') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-input">
                                    <label for="typeContrat" class="required">{{ __("Domaines:") }}</label>

                                    <select id="domaines" name="domaines[]" class="custom-select" id="domaines" multiple>
                                        @for ($i = 0; $i < count($domaines)-1; $i++)
                                        <option value={{$domaines[$i+1][1]}}>{{$domaines[$i+1][0]}}</option>
                                        @endfor
                                    </select>
                                        
                                    </select>

                                    @if ($errors->has('typeContrat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('typeContrat') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-input">
                                    <label for="diplome" class="required">{{ __("Diplome") }}</label>
                                    <input id="diplome" type="text" class="form-control{{ $errors->has('diplome') ? ' is-invalid' : '' }}" name="diplome" value="{{ old('diplome') }}" >


                                    @if ($errors->has('diplome'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('diplome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-input">
                                    <label for="resultat" class="resultat">{{ __("Résultat ") }}</label>
                                    <input id="resultat" type="text" class="form-control{{ $errors->has('resultat') ? ' is-invalid' : '' }}" name="resultat" value="{{ old('resultat') }}" >

                                    @if ($errors->has('resultat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('resultat') }}</strong>
                                        </span>
                                    @endif
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