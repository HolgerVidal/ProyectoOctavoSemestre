@extends('layouts.ederApp')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h2><CENTER>MI PERFIL</CENTER></h2></div>

        <div class="card-body">
          <form action="" id="pf_formulario_reistro_datos">
            <br>
            <div class="row">
              <div class="col-md-12">
                <h4>Datos Personales</h4>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-9">
                <div id="pf_error_perfil"></div>
              </div>
              <div class="col-md-9">
                <div id="datos_persona" class="row">
                  <div class="col-md-6">
                      <label for="nombres" class="r_titulo">Nombres</label>
                      <input id="pf_nombres" type="text" placeholder="Ingrese sus nombres" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ $persona->nombres }}" required >
                  </div>

                  <div class="col-md-6">
                      <label for="name" class="r_titulo">Apellidos</label>
                      <input id="pf_apellidos" type="text" placeholder="Ingrese sus apellidos" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }} " name="apellidos" value="{{ $persona->apellidos}}" required >
                  </div>

                  <div class="col-md-6">
                      <label for="name" class="r_titulo">Cedula</label> <strong style="color: red; font-size:18px">*</strong>
                      <input id="pf_cedula" type="text" placeholder="Ingrese su cedula" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }} " name="cedula" value="{{ $persona->cedula}}">
                  </div>

                  <div class="col-md-6">
                      <label for="sexo" class="r_titulo">Sexo</label>
                      <select id="pf_sexo" type="text" selected="F" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo"  style="height: auto;"  required>
                          <option value="M" class="r_txt">Masculino</option>
                          <option value="F" class="r_txt">Femenino</option>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label for="pais" class="r_titulo">Pais</label>
                      <select class="form-control" id="pf_pais" name="pais" style="height: auto;">
                          <option value="AF">Afganistán</option>
                          <option value="AL">Albania</option>
                          <option value="DE">Alemania</option>
                          <option value="AD">Andorra</option>
                          <option value="AO">Angola</option>
                          <option value="AI">Anguilla</option>
                          <option value="AQ">Antártida</option>
                          <option value="AG">Antigua y Barbuda</option>
                          <option value="AN">Antillas Holandesas</option>
                          <option value="SA">Arabia Saudí</option>
                          <option value="DZ">Argelia</option>
                          <option value="AR">Argentina</option>
                          <option value="AM">Armenia</option>
                          <option value="AW">Aruba</option>
                          <option value="AU">Australia</option>
                          <option value="AT">Austria</option>
                          <option value="AZ">Azerbaiyán</option>
                          <option value="BS">Bahamas</option>
                          <option value="BH">Bahrein</option>
                          <option value="BD">Bangladesh</option>
                          <option value="BB">Barbados</option>
                          <option value="BE">Bélgica</option>
                          <option value="BZ">Belice</option>
                          <option value="BJ">Benin</option>
                          <option value="BM">Bermudas</option>
                          <option value="BY">Bielorrusia</option>
                          <option value="MM">Birmania</option>
                          <option value="BO">Bolivia</option>
                          <option value="BA">Bosnia y Herzegovina</option>
                          <option value="BW">Botswana</option>
                          <option value="BR">Brasil</option>
                          <option value="BN">Brunei</option>
                          <option value="BG">Bulgaria</option>
                          <option value="BF">Burkina Faso</option>
                          <option value="BI">Burundi</option>
                          <option value="BT">Bután</option>
                          <option value="CV">Cabo Verde</option>
                          <option value="KH">Camboya</option>
                          <option value="CM">Camerún</option>
                          <option value="CA">Canadá</option>
                          <option value="TD">Chad</option>
                          <option value="CL">Chile</option>
                          <option value="CN">China</option>
                          <option value="CY">Chipre</option>
                          <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                          <option value="CO">Colombia</option>
                          <option value="KM">Comores</option>
                          <option value="CG">Congo</option>
                          <option value="CD">Congo, República Democrática del</option>
                          <option value="KR">Corea</option>
                          <option value="KP">Corea del Norte</option>
                          <option value="CI">Costa de Marfíl</option>
                          <option value="CR">Costa Rica</option>
                          <option value="HR">Croacia (Hrvatska)</option>
                          <option value="CU">Cuba</option>
                          <option value="DK">Dinamarca</option>
                          <option value="DJ">Djibouti</option>
                          <option value="DM">Dominica</option>
                          <option value="EC">Ecuador</option>
                          <option value="EG">Egipto</option>
                          <option value="SV">El Salvador</option>
                          <option value="AE">Emiratos Árabes Unidos</option>
                          <option value="ER">Eritrea</option>
                          <option value="SI">Eslovenia</option>
                          <option value="ES" selected>España</option>
                          <option value="US">Estados Unidos</option>
                          <option value="EE">Estonia</option>
                          <option value="ET">Etiopía</option>
                          <option value="FJ">Fiji</option>
                          <option value="PH">Filipinas</option>
                          <option value="FI">Finlandia</option>
                          <option value="FR">Francia</option>
                          <option value="GA">Gabón</option>
                          <option value="GM">Gambia</option>
                          <option value="GE">Georgia</option>
                          <option value="GH">Ghana</option>
                          <option value="GI">Gibraltar</option>
                          <option value="GD">Granada</option>
                          <option value="GR">Grecia</option>
                          <option value="GL">Groenlandia</option>
                          <option value="GP">Guadalupe</option>
                          <option value="GU">Guam</option>
                          <option value="GT">Guatemala</option>
                          <option value="GY">Guayana</option>
                          <option value="GF">Guayana Francesa</option>
                          <option value="GN">Guinea</option>
                          <option value="GQ">Guinea Ecuatorial</option>
                          <option value="GW">Guinea-Bissau</option>
                          <option value="HT">Haití</option>
                          <option value="HN">Honduras</option>
                          <option value="HU">Hungría</option>
                          <option value="IN">India</option>
                          <option value="ID">Indonesia</option>
                          <option value="IQ">Irak</option>
                          <option value="IR">Irán</option>
                          <option value="IE">Irlanda</option>
                          <option value="BV">Isla Bouvet</option>
                          <option value="CX">Isla de Christmas</option>
                          <option value="IS">Islandia</option>
                          <option value="KY">Islas Caimán</option>
                          <option value="CK">Islas Cook</option>
                          <option value="CC">Islas de Cocos o Keeling</option>
                          <option value="FO">Islas Faroe</option>
                          <option value="HM">Islas Heard y McDonald</option>
                          <option value="FK">Islas Malvinas</option>
                          <option value="MP">Islas Marianas del Norte</option>
                          <option value="MH">Islas Marshall</option>
                          <option value="UM">Islas menores de Estados Unidos</option>
                          <option value="PW">Islas Palau</option>
                          <option value="SB">Islas Salomón</option>
                          <option value="SJ">Islas Svalbard y Jan Mayen</option>
                          <option value="TK">Islas Tokelau</option>
                          <option value="TC">Islas Turks y Caicos</option>
                          <option value="VI">Islas Vírgenes (EEUU)</option>
                          <option value="VG">Islas Vírgenes (Reino Unido)</option>
                          <option value="WF">Islas Wallis y Futuna</option>
                          <option value="IL">Israel</option>
                          <option value="IT">Italia</option>
                          <option value="JM">Jamaica</option>
                          <option value="JP">Japón</option>
                          <option value="JO">Jordania</option>
                          <option value="KZ">Kazajistán</option>
                          <option value="KE">Kenia</option>
                          <option value="KG">Kirguizistán</option>
                          <option value="KI">Kiribati</option>
                          <option value="KW">Kuwait</option>
                          <option value="LA">Laos</option>
                          <option value="LS">Lesotho</option>
                          <option value="LV">Letonia</option>
                          <option value="LB">Líbano</option>
                          <option value="LR">Liberia</option>
                          <option value="LY">Libia</option>
                          <option value="LI">Liechtenstein</option>
                          <option value="LT">Lituania</option>
                          <option value="LU">Luxemburgo</option>
                          <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                          <option value="MG">Madagascar</option>
                          <option value="MY">Malasia</option>
                          <option value="MW">Malawi</option>
                          <option value="MV">Maldivas</option>
                          <option value="ML">Malí</option>
                          <option value="MT">Malta</option>
                          <option value="MA">Marruecos</option>
                          <option value="MQ">Martinica</option>
                          <option value="MU">Mauricio</option>
                          <option value="MR">Mauritania</option>
                          <option value="YT">Mayotte</option>
                          <option value="MX">México</option>
                          <option value="FM">Micronesia</option>
                          <option value="MD">Moldavia</option>
                          <option value="MC">Mónaco</option>
                          <option value="MN">Mongolia</option>
                          <option value="MS">Montserrat</option>
                          <option value="MZ">Mozambique</option>
                          <option value="NA">Namibia</option>
                          <option value="NR">Nauru</option>
                          <option value="NP">Nepal</option>
                          <option value="NI">Nicaragua</option>
                          <option value="NE">Níger</option>
                          <option value="NG">Nigeria</option>
                          <option value="NU">Niue</option>
                          <option value="NF">Norfolk</option>
                          <option value="NO">Noruega</option>
                          <option value="NC">Nueva Caledonia</option>
                          <option value="NZ">Nueva Zelanda</option>
                          <option value="OM">Omán</option>
                          <option value="NL">Países Bajos</option>
                          <option value="PA">Panamá</option>
                          <option value="PG">Papúa Nueva Guinea</option>
                          <option value="PK">Paquistán</option>
                          <option value="PY">Paraguay</option>
                          <option value="PE">Perú</option>
                          <option value="PN">Pitcairn</option>
                          <option value="PF">Polinesia Francesa</option>
                          <option value="PL">Polonia</option>
                          <option value="PT">Portugal</option>
                          <option value="PR">Puerto Rico</option>
                          <option value="QA">Qatar</option>
                          <option value="UK">Reino Unido</option>
                          <option value="CF">República Centroafricana</option>
                          <option value="CZ">República Checa</option>
                          <option value="ZA">República de Sudáfrica</option>
                          <option value="DO">República Dominicana</option>
                          <option value="SK">República Eslovaca</option>
                          <option value="RE">Reunión</option>
                          <option value="RW">Ruanda</option>
                          <option value="RO">Rumania</option>
                          <option value="RU">Rusia</option>
                          <option value="EH">Sahara Occidental</option>
                          <option value="KN">Saint Kitts y Nevis</option>
                          <option value="WS">Samoa</option>
                          <option value="AS">Samoa Americana</option>
                          <option value="SM">San Marino</option>
                          <option value="VC">San Vicente y Granadinas</option>
                          <option value="SH">Santa Helena</option>
                          <option value="LC">Santa Lucía</option>
                          <option value="ST">Santo Tomé y Príncipe</option>
                          <option value="SN">Senegal</option>
                          <option value="SC">Seychelles</option>
                          <option value="SL">Sierra Leona</option>
                          <option value="SG">Singapur</option>
                          <option value="SY">Siria</option>
                          <option value="SO">Somalia</option>
                          <option value="LK">Sri Lanka</option>
                          <option value="PM">St Pierre y Miquelon</option>
                          <option value="SZ">Suazilandia</option>
                          <option value="SD">Sudán</option>
                          <option value="SE">Suecia</option>
                          <option value="CH">Suiza</option>
                          <option value="SR">Surinam</option>
                          <option value="TH">Tailandia</option>
                          <option value="TW">Taiwán</option>
                          <option value="TZ">Tanzania</option>
                          <option value="TJ">Tayikistán</option>
                          <option value="TF">Territorios franceses del Sur</option>
                          <option value="TP">Timor Oriental</option>
                          <option value="TG">Togo</option>
                          <option value="TO">Tonga</option>
                          <option value="TT">Trinidad y Tobago</option>
                          <option value="TN">Túnez</option>
                          <option value="TM">Turkmenistán</option>
                          <option value="TR">Turquía</option>
                          <option value="TV">Tuvalu</option>
                          <option value="UA">Ucrania</option>
                          <option value="UG">Uganda</option>
                          <option value="UY">Uruguay</option>
                          <option value="UZ">Uzbekistán</option>
                          <option value="VU">Vanuatu</option>
                          <option value="VE">Venezuela</option>
                          <option value="VN">Vietnam</option>
                          <option value="YE">Yemen</option>
                          <option value="YU">Yugoslavia</option>
                          <option value="ZM">Zambia</option>
                          <option value="ZW">Zimbabue</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                      <label for="fecha_nacimiento" class="r_titulo">Fecha Nacimiento</label>
                      <input id="pf_fecha_nacimiento" type="date" style="height: 35px;" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required >
                  </div>

                  <div class="col-md-12">
                      <label for="institucion" class="r_titulo">Institución</label> <strong style="color: red; font-size:18px">*</strong>
                      <input id="pf_institucion" type="text" placeholder="Ingrese su Institución " class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" name="institucion" value="{{ $persona->institucion}}">
                  </div>  
                </div>
              </div>
                            <div class="col-md-3">
                <!-- CONTENEDOR APRA LA SELECCION DE LA IMAGEN -->
                <center>
                <div class="card" style="width: 18rem;">
                  <div class="card-header">
                    <center><h4 class="card-title">Perfil</h4></center>
                  </div>
                  <img class="card-img-top" id="pf_imagen_perfil" src="{{Auth::user()->img}}" alt="Card image cap">
                  <div class="card-body">  
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                      Cambiar
                    </button>
                  </div>
                </div>
                </center>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <button id="pf_guardarDatos" class="btn btn-success">Guardar Datos</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <br><br><br>
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleccone un perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
          <div class="row">
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/1.png" alt="Card image cap">
              </button>
            </div>
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/2.png" alt="Card image cap">
              </button>
            </div>
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/3.png" alt="Card image cap">
              </button>
            </div>
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/4.png" alt="Card image cap">
              </button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/5.png" alt="Card image cap">
              </button>
            </div>
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/6.png" alt="Card image cap">
              </button>
            </div>
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/7.png" alt="Card image cap">
              </button>
            </div>
            <div class="col-md-3" >
              <button class="btn btn-primary selec_avatar" data-dismiss="modal">
                <img style="width:100%" class="img-thumbnail" src="avatar/8.png" alt="Card image cap">
              </button>
            </div>
          </div>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" id="" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <!-- <button type="button" class="btn btn-primary">Seleccionar</button> -->
        </div>
      </div>
    </div>
</div>