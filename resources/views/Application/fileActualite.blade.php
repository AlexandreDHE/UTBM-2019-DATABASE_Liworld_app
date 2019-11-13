@extends('admin.adminLayout')

@section('typePoste')

  @if($res[0] == 0)
      Pas encore d'entreprise
  @else
      <table class="table">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Type de contrat</th>
                  <th scope="col">Entreprise</th>
                  <th scope="col">Nom du poste</th>
                  <th scope="col">Date début</th>
                  <th scope="col">Date de fin</th>
                  <th scope="col">Description</th>
                  <th scope="col">Numéro de voie</th>
                  <th scope="col">Rue</th>
                  <th scope="col">Ville</th>
                  <th scope="col">Code postale</th>

              </tr>
          </thead>

          <tbody>
              @for ($i = 0; $i < count($res)-1; $i++)
                  <tr>
                      <td scope="col">{{$res[$i+1][0]}}</td>
                      <td scope="col">{{$res[$i+1][1]}}</td>
                      <td scope="col">{{$res[$i+1][2]}}</td>
                      <td scope="col">{{$res[$i+1][3]}}</td>
                      <td scope="col">{{$res[$i+1][4]}}</td>
                      <td scope="col">{{$res[$i+1][5]}}</td>
                      <td scope="col">{{$res[$i+1][6]}}</td>
                      <td scope="col">{{$res[$i+1][7]}}</td>
                      <td scope="col">{{$res[$i+1][8]}}</td>
                      <td scope="col">{{$res[$i+1][9]}}</td>
                  </tr>
              @endfor
          </tbody>
      </table>
  @endif




</div>
@endsection