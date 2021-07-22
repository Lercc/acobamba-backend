<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div style="font-family:Arial;font-size:16px">
    <u></u>
    <table style="margin:0 auto;width:350px">
      <tbody>
        <!-- img -->
        <tr>
          <td>
            <table style="margin-bottom:20px;text-align:center;width:100%">
              <tbody>
                <tr>
                  <td><img src="{{asset('img/GESTRAM.png')}}" style="display:block;margin:0 auto" width="auto" height="120px" class="CToWUd">
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- content -->
        <tr>
          <td style="border:1px solid #004aad;padding:20px 40px ">
            <div style="background:url({{asset('img/GESTRAM-LOGO.png')}}) no-repeat center;padding:20px 0;width:100%">
            
              <table style="margin-bottom:20px;text-align:center;width:100%">
                <tbody>
                  <tr>
                    <td>
                      <h1 style="color:#004aad;font-size:1.125em">
                        Petición de 
                        <br>
                        recuperación de contraseña
                      </h1>
                    </td>
                  </tr>

                  <tr style="font-size:0.813em;color:#4d4d4d">
                    <td style="width:100%;text-align:center">
                      <span>
                        <span style="color:#9eb4d0">
                          <span>{{ $emailData->created_at }} | COD-EPR{{ $emailData->id }}</span>
                        </span>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>



              <table style="margin-bottom:15px;color:#4d4d4d;font-size:0.913em;width:100%">
                <tbody>
                  <tr>
                    <td style="color:#3e4265;padding-bottom:5px;text-align:justify;vertical-align:top;width:49.5%">
                      <span>Estimado <strong style="text-transform:uppercase;">{{$emailData->user->name}}</strong>, usted a realizado la petición de actualización de contraseña de la plataforma de trámite documentario de la Municipalidad de Acobamba, por tal motivo para hacer efectivo su proceso deberá registrar una nueva contraseña dándole clik en el siguiente botón:</span>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table style="margin-bottom:20px;text-align:center;width:100%">
                <tbody>
                  <tr>
                    <td style="width:100%;text-align:center;display:block;margin:auto">
                      <a href="{{config('app.frontend')}}/password-recovery/{{$emailData->id}}" 
                          target="_blank"
                          style="
                            display:block;
                            margin:auto;
                            min-height:40px;
                            width:200px;
                            padding-top:10px;
                            padding-bottom:10px;
                            border-radius:10px;
                            background-color: #fdcc08;
                            text-decoration:none;
                            color:#004aad;
                            font-size:18px;
                            "
                      >
                        <strong style="margin:0;padding:0">Generar nueva contraseña</strong>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <br>
    <hr>
</body>
</html>