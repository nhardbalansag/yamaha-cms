
<!DOCTYPE html>
<html>
  <head>
    <title>yamaha megavia capstone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      div.just{
        text-align: justify-all;
        } 

        .box {
        background-color: white;
        width: 450px;
        border: 2px solid lightgray;
        padding: 50px;
        margin: 20px;
      }

      .pricing-features-item{
        color:blue;
      }
    </style>
  </head>
  <body>
    <div style = "border: 1px solid gray: padding: 5px: border-radius: 5px">
      <div class="box">
        <center>
          <h2 style ="color:blue; text-transform: capitalize">yamaha megavia capstone</h2>
        </center>
        </br>
        <h4>Hi {{$userInfo}}</h4>
          <div class="just">
            <p>Thank you for your inquiry regarding our product or service.To answer your question, here are the following information about our products: </p>
              <div class="card">
                <div class="card-header">
                  <h4>Product Information</h4>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Product Name</h5>
                  <li class="pricing-features-item text-uppercase">{{$productInfo['product']->title}}</li>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Description</h5>
                  <li class="pricing-features-item">
                    <span class="ml-2 text-uppercase">{{$productInfo['product']->title}},</span> 
                    {{$productInfo['product']->description}}
                  </li>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Price</h5>
                  <li class="pricing-features-item">P {{$productInfo['product']->price}}</li>
                </div>
              </div>

              <div>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Specification title</th>
                      <th scope="col">Description</th>
                    </tr>
                  </thead>
                  <tbody>
                  @for($i = 0; $i < $dataCount; $i++)
                    <tr>
                      <td>{{$productInfo['specification'][$i]->title}}</th>
                      <td>{{$productInfo['specification'][$i]->description}}</td>
                    </tr>
                  @endfor
                  </tbody>
                </table>
              </div>

              <div class="card-body"><a href="{{env('APP_URL') . '/customer/register'}}">Register</a>
                <center><button type="button" class="btn btn-primary"></button></center>
              </div>
          </div>
        </div>
          <p>Thank you!</p>
          <center>
            <p>'Copyright 2020 | All Rights Reserved | Powered by capstone project'</p>
          </center>
        </div>
      </div>
    </div>
  </body> 
</html>


