<!DOCTYPE html>
<html>
<head>
    <title>yamaha megavia capstone</title>
    <style>
    	.button {
  background-color: #3C99DC;
  border: none;
  color: white;
  padding: 12px 50px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 15px 8px;
  cursor: pointer;
}

div.just{
  text-align: justify-all;
  } 

  .box {
  background-color: white;
  width: 800px;
  border: 2px solid lightgray;
  padding: 50px;
  margin: 20px;
}

html {
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.background {
  padding: 0 10px 10px;
  position: relative;
  width: 100%;
}

.background::after {
  content: '';
  background: #60a9ff;
  background: -moz-linear-gradient(top, #60a9ff 0%, #4394f4 100%);
  background: -webkit-linear-gradient(top, #60a9ff 0%,#4394f4 100%);
  background: linear-gradient(to bottom, #60a9ff 0%,#4394f4 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#60a9ff', endColorstr='#4394f4',GradientType=0 );
  height: 50px;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: 1;
}

@media (min-width: 900px) {
  .background {
    padding: 0 0 10px;
  }
}

.container {
  margin: 0 auto;
  padding: 25px 0 0;
  max-width: 960px;
  width: 100%;
}

.panel {
  background-color: #fff;
  border-radius: 10px;
  padding: 15px 25px;
  position: relative;
  width: 100%;
  z-index: 10;
}

.pricing-table {
  box-shadow: 0px 10px 13px -6px rgba(0, 0, 0, 0.08), 0px 20px 31px 3px rgba(0, 0, 0, 0.09), 0px 8px 20px 7px rgba(0, 0, 0, 0.02);
  display: flex;
  flex-direction: column;
}

@media (min-width: 900px) {
  .pricing-table {
    flex-direction: row;
  }
}

.pricing-table * {
  text-align: center;
  text-transform: uppercase;
}

.pricing-plan {
  border-bottom: 1px solid #e1f1ff;
  padding: 25px;
}

.pricing-plan:last-child {
  border-bottom: none;
}

@media (min-width: 900px) {
  .pricing-plan {
    border-bottom: none;
    border-right: 1px solid #e1f1ff;
    flex-basis: 100%;
    padding: 5px 10px;
  }

  .pricing-plan:last-child {
    border-right: none;
  }
}

.pricing-img {
  margin-bottom: 25px;
  max-width: 100%;
}

.pricing-header {
  color: #888;
  font-weight: 600;
  letter-spacing: 1px;
}

.pricing-features {
  color: #016FF9;
  font-weight: 600;
  letter-spacing: 1px;
  margin: 50px 0 25px;
}

.pricing-features-item {
  border-top: 1px solid #e1f1ff;
  font-size: 12px;
  line-height: 1.5;
  padding: 15px 0;
}

.pricing-features-item:last-child {
  border-bottom: 1px solid #e1f1ff;
}

.pricing-price {
  color: #016FF9;
  display: block;
  font-size: 32px;
  font-weight: 700;
}

.pricing-button {
  border: 1px solid #9dd1ff;
  border-radius: 10px;
  color: #348EFE;
  display: inline-block;
  margin: 25px 0;
  padding: 15px 35px;
  text-decoration: none;
  transition: all 150ms ease-in-out;
}

.pricing-button:hover,
.pricing-button:focus {
  background-color: #e1f1ff;
}

.pricing-button.is-featured {
  background-color: #48aaff;
  color: #fff;
}

.pricing-button.is-featured:hover,
.pricing-button.is-featured:active {
  background-color: #269aff;
}
    </style>
</head>
<body>
    <div style = "border: 1px solid gray: padding: 5px: border-radius: 5px">
    	<div class="box">
            <center>
                <h1 style ="color:blue; text-transform: capitalize">yamaha megavia capstone</h1>
            </center>
            <h3>{{$userInfo}}</h3>
            <div class="just">
                <div>
                    <p>Thank you for your inquiry regarding our product or service. </p> 
                    <p>To answer your question, here are the following information about our products: </p>
                
                    <div class="background">
                        <div class="container">
                            <div class="panel pricing-table">
                                <div class="pricing-plan">
                                    <h4 class="pricing-header">{{$productInfo['product']->title}}</h4>
                                    <ul class="pricing-features">
                                        <li class="pricing-features-item">{{$productInfo['product']->title}}</li>
                                    </ul>
                                </div>
                                <div class="pricing-plan">
                                    <h4 class="pricing-header">Description</h4>
                                    <ul class="pricing-features">
                                        <li class="pricing-features-item">{{$productInfo['product']->description}}</li>
                                    </ul>
                                </div>
                                <div class="pricing-plan">
                                    <h4 class="pricing-header">Price</h4>
                                    <ul class="pricing-features">
                                    <li class="pricing-features-item">P {{$productInfo['product']->price}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background">
            <div class="container">
                <div class="panel pricing-table">
                    <div class="pricing-plan">
                        <h4 class="pricing-header">Specification Type</h4>
                        <ul class="pricing-features">
                            <li class="pricing-features-item">Motorcycle</li>
                        </ul>
                    </div>
                    <div class="pricing-plan">
                        <h4 class="pricing-header">Specification Description</h4>
                        <ul class="pricing-features">
                            <li class="pricing-features-item">Motorcycle</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
                </div> 
                    <center>
                    <a href="#" class="button">Register</a>
                    <center>
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